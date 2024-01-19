<?php

namespace App\Livewire\Admin\Faq;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Faq extends Component
{
    
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';

    public $user_id;

    
    public $faq_active;
    public $faq_max_display;
    public $faq_filter = [];
    public $faq_data = [];
    public $faq = [
        'id' => NULL,
        'user_id'=> NULL,
        'question' => NULL,
        'answer' => NULL,
        'link' => NULL,
        'number_order' => NULL,
    ];


    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];

        if(!isset($data['user_id'])){
            header("Location: /login");
            die();
        }else{
            $user_status = DB::table('users as u')
            ->select('u.user_status_id','us.user_status_details')
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->where('user_id','=', $data['user_id'])
            ->first();
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'deleted' ){
            header("Location: /deleted");
            die();
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'inactive' ){
            header("Location: /deleted");
            die();
        }
    }
    public function update_data(){
        $table = self::get_table_info('faq');
        $this->faq_active = $table->table_isactive;
        $this->faq_max_display = $table->table_max_display;

        $faq_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->faq_filter = [];
        foreach ($faq_filter as $key => $value) {
            array_push($this->faq_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $this->faq_data = DB::table('faq')
            ->where('user_id','=',$this->user_id)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    }
    public function update_faq_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->faq_filter as $key => $value) {
            DB::table('table_columns')
                ->where('id','=', $value['id'])
                ->where('user_id','=',$data['user_id'])
                ->update([
                    'active' => boolval($value['active']),
            ]);
        }
        $this->dispatch('swal:redirect',
            position         									: 'center',
            icon              									: 'success',
            title             									: 'Successfully updated!',
            showConfirmButton 									: 'true',
            timer             									: '1000',
            link              									: '#'
        );
        self::update_data();
    }

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id =  $data['user_id']; 

        self::update_data();
    }
    public function render()
    {
        return view('livewire.admin.faq.faq')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }

    public function update_active_table($table_name,$isactive){
        if(DB::table('tables')
            ->where('table_name','=',$table_name)
            ->update(['table_isactive' => $isactive])){
            return self::get_table_info($table_name)->table_isactive;
        }
    }
    public function update_max_display($table_name,$max_display){
        if(DB::table('tables')
            ->where('table_name','=',$table_name)
            ->update(['table_max_display' => $max_display])){
            return self::get_table_info($table_name)->table_max_display;
        }
    }
    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->first());
    }
    public function max_display($table_name){
        if($table_name == 'faq'){
            if($this->faq_max_display >= 0 && $this->faq_max_display <= 100){
                $this->faq_max_display = self::update_max_display($table_name, $this->faq_max_display );
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'success',
                    title             									: 'Successfully updated!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
            }else{
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'warning',
                    title             									: 'Invalid Input!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
                $table = self::get_table_info($table_name);
                $this->faq_max_display = $table->table_max_display;
            }
        }
    }
    public function toggle_active($table_name){
        if($table_name == 'faq'){
            $this->faq_active = self::update_active_table($table_name, !$this->faq_active);
        }

        $this->dispatch('swal:redirect',
            position         									: 'center',
            icon              									: 'success',
            title             									: 'Successfully updated!',
            showConfirmButton 									: 'true',
            timer             									: '1000',
            link              									: '#'
        );
    }

    public function add_row($modal_id){

        $this->faq = [
            'id' => NULL,
            'user_id'=> NULL,
            'question' => NULL,
            'answer' => NULL,
            'link' => NULL,
            'number_order' => NULL,
        ];

        $this->dispatch('openModal',$modal_id);
    }

    public function add_faq(Request $request,$modal_id){
        $data = $request->session()->all();
        if(!strlen($this->faq['question'])>0){
            return;
        }
        if(!strlen($this->faq['answer'])>0){
            return;
        }

        $this->faq['number_order'] = DB::table('faq')
        ->select(
            DB::raw('count(*) as number_order')
        )
        ->get()
        ->first()->number_order+1;

        if(DB::table('faq')
            ->insert([
                'id' => NULL,
                'user_id'=> $data['user_id'],
                'question' => $this->faq['question'],
                'answer' => $this->faq['answer'],
                'link' => $this->faq['link'],
                'number_order' => $this->faq['number_order'],
            ])){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully added!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
            $this->dispatch('openModal',$modal_id);
            self::update_data();
        }
    }

    public function edit_faq(Request $request,$modal_id,$id){
        $data = $request->session()->all();

        $faq = DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->faq = [
            'id' => $faq->id,
            'user_id'=> $faq->user_id,
            'question' => $faq->question,
            'answer' => $faq->answer,
            'link' => $faq->link,
            'number_order' => $faq->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_edit_faq(Request $request,$modal_id){
        $data = $request->session()->all();

        if(!strlen($this->faq['question'])>0){
            return;
        }
        if(!strlen($this->faq['answer'])>0){
            return;
        }

        if(DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->faq['id'])
            ->update([
                'question' => $this->faq['question'],
                'answer' => $this->faq['answer'],
                'link' => $this->faq['link'],
            ])){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully updated!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
            $this->dispatch('openModal',$modal_id);
            self::update_data();
        }
    }

    public function delete_faq(Request $request,$modal_id,$id){
        $data = $request->session()->all();

        $faq = DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->faq = [
            'id' => $faq->id,
            'user_id'=> $faq->user_id,
            'question' => $faq->question,
            'answer' => $faq->answer,
            'link' => $faq->link,
            'number_order' => $faq->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_delete_faq(Request $request,$modal_id,){
        $data = $request->session()->all();
        if(DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->faq['id'])
            ->delete()){

            $faq_data = DB::table('faq')
                ->where('user_id','=',$this->user_id)
                ->orderBy('number_order','asc')
                ->get()
                ->toArray();
            foreach ($faq_data as $key => $value) {
                DB::table('faq')
                    ->where('user_id','=',$value->user_id)
                    ->where('id','=',$value->id)
                    ->update([
                        'number_order' => $key+1,
                    ]);
            }
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
            $this->dispatch('openModal',$modal_id);
            self::update_data();
        }
    }

    public function move_up_faq(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('faq')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_faq(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('faq')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
            $current = DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('faq')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
}
