<?php

namespace App\Livewire\Admin\Homepage;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Homepage extends Component
{
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public $user_id;

    public $homepage_filter = [];
    public $homepage_data = [];
    public $homepage = [
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

        $table = self::get_table_info('homepages');

        $homepage_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();
        $this->homepage_filter = [];
        foreach ($homepage_filter as $key => $value) {
            array_push($this->homepage_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $this->homepage_data = DB::table('homepages')
            ->where('user_id','=',$this->user_id)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    }
    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->where('user_id','=',$this->user_id)
        ->first());
    }

    public function update_homepage_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->homepage_filter as $key => $value) {
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
        return view('livewire.admin.homepage.homepage')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }

    public function move_up_homepage(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('homepages')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_homepage(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('homepages')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();
            DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('homepages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }

    public function toggle_activate(Request $request,$id){
        $data = $request->session()->all();
        $current = DB::table('homepages')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$id)
        ->first();

        DB::table('homepages')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$current->id)
        ->update([
            'table_isactive' => !$current->table_isactive
        ]);

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

    public function update_max_display(Request $request,$id,$key){
        $data = $request->session()->all(); 

        dd($id);
        // DB::table('homepages')
        // ->where('user_id','=',$data['user_id'])
        // ->where('id','=',$id)
        // ->update([
        //     'table_max_display' => table_max_display
        // ]);

        self::update_data();
    }
}
