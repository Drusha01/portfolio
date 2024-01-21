<?php

namespace App\Livewire\Admin\Contact;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Contact extends Component
{
    public $title = 'About';
    public $user_id;

    public $mode;
    public $background = "282828";
    public $color = 'fff';


    public $contact_active;
    public $contact_max_display;
    public $contact_filter = [];
    public $contact_data = [];
    public $contact = [
        'id' => NULL,
        'user_id' => NULL,
        'longitude' => NULL,
        'latitude' => NULL,
        'zoom' => NULL,
    ];

    public $contact_info_active;
    public $contact_info_max_display;
    public $contact_info_filter = [];
    public $contact_info_data = [];
    public $contact_info = [
        'id' => NULL,
        'user_id' => NULL,
        'contact_title' => NULL,
        'contact_details' => NULL,
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

        $table = self::get_table_info('contacts');
        $this->contact_active = $table->table_isactive;
        $this->contact_max_display = $table->table_max_display;

        $contact_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();
        $this->contact_filter = [];
        foreach ($contact_filter as $key => $value) {
            array_push($this->contact_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }


            $table = self::get_table_info('contact_infos');
            $this->contact_info_active = $table->table_isactive;
            $this->contact_info_max_display = $table->table_max_display;
    
            $contact_info_filter = DB::table('table_columns')
                ->where('user_id','=', $this->user_id )
                ->where('table_id','=',$table->id)
                ->orderBy('column_order','asc')
                ->get()
                ->toArray();
            $this->contact_info_filter = [];
            foreach ($contact_info_filter as $key => $value) {
                array_push($this->contact_info_filter,[
                    'id' => intval($value->id),
                    'active'=> boolval($value->active),
                    'name' => $value->name,
                    'column_name' => $value->column_name,
                    'class' => $value->class,
                    'style'=> $value->style
                ]);
            }

            
        $this->contact_data = DB::table('contacts')
            ->where('user_id','=',$this->user_id)
            ->orderBy('date_created','asc')
            ->get()
            ->toArray();
        
        $this->contact_info_data = DB::table('contact_infos')
            ->where('user_id','=',$this->user_id)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    }

    public function update_contact_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->contact_filter as $key => $value) {
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

    public function update_contact_info_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->contact_info_filter as $key => $value) {
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

   public function update_active_table($table_name,$isactive){
        if(DB::table('tables')
            ->where('table_name','=',$table_name)
            ->where('user_id','=',$this->user_id)
            ->update(['table_isactive' => $isactive])){
            return self::get_table_info($table_name)->table_isactive;
        }
    }
    public function update_max_display($table_name,$max_display){
        if(DB::table('tables')
            ->where('table_name','=',$table_name)
            ->where('user_id','=',$this->user_id)
            ->update(['table_max_display' => $max_display])){
            return self::get_table_info($table_name)->table_max_display;
        }
    }
    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->where('user_id','=',$this->user_id)
        ->first());
    }
    public function max_display($table_name){
        if($table_name == 'contacts'){
            if($this->contact_max_display >= 0 && $this->contact_max_display <= 100){
                $this->contact_max_display = self::update_max_display($table_name, $this->contact_max_display );
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
                $this->contact_max_display = $table->table_max_display;
            }
        }elseif($table_name == 'contact_infos'){
            if($this->contact_info_max_display >= 0 && $this->contact_info_max_display <= 100){
                $this->contact_info_max_display = self::update_max_display($table_name, $this->contact_info_max_display );
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
                $this->contact_info_max_display = $table->table_max_display;
            }
        }
    }
    public function toggle_active($table_name){
        if($table_name == 'contacts'){
            $this->contact_active = self::update_active_table($table_name, !$this->contact_active);
        }elseif($table_name == 'contact_infos'){
            $this->contact_info_active = self::update_active_table($table_name, !$this->contact_info_active);
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

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id = $data['user_id'];

        self::update_data();
    }
    public function render()
    {
        return view('livewire.admin.contact.contact')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
    public function add_row($modal_id){
        $this->contact = [
            'id' => NULL,
            'user_id' => NULL,
            'longitude' => NULL,
            'latitude' => NULL,
            'zoom' => NULL,
        ];
        $this->contact_info = [
            'id' => NULL,
            'user_id' => NULL,
            'contact_title' => NULL,
            'contact_details' => NULL,
            'number_order' => NULL,
        ];
        $this->dispatch('openModal',$modal_id);
    }
    public function save_add_contact(Request $request,$modal_id){
        $data = $request->session()->all();
    
        if(!(floatval($this->contact['longitude'])<= 180 && floatval($this->contact['longitude'])>= -180) ){
            return;
        }
        if(!(floatval($this->contact['latitude'])<= 180 && floatval($this->contact['latitude'])>= -180) ){
            return;
        }
        if(!(floatval($this->contact['zoom'])>= 1 && floatval($this->contact['zoom'])<= 100) ){
            return;
        }
      
        if(DB::table('contacts')
            ->insert([
                'id' => NULL,
                'user_id' => $data['user_id'],
                'longitude' => floatval($this->contact['longitude']),
                'latitude' => floatval($this->contact['latitude']),
                'zoom' => $this->contact['zoom'],
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

    public function edit_contact(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        if($contact = DB::table('contacts')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first()){

            $this->contact = [
                'id' => $contact->id,
                'user_id' => $contact->user_id,
                'longitude' => $contact->longitude,
                'latitude' => $contact->latitude,
                'zoom' => $contact->zoom,
            ];
            $this->dispatch('openModal',$modal_id);
        }
    }

    public function save_edit_contact(Request $request,$modal_id){
        $data = $request->session()->all();
        if(!(floatval($this->contact['longitude'])<= 180 && floatval($this->contact['longitude'])>= -180) ){
            return;
        }
        if(!(floatval($this->contact['latitude'])<= 180 && floatval($this->contact['latitude'])>= -180) ){
            return;
        }
        if(!(floatval($this->contact['zoom'])>= 1 && floatval($this->contact['zoom'])<= 100) ){
            return;
        }
        if(DB::table('contacts')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->contact['id'])
            ->update([
                'longitude' => $this->contact['longitude'],
                'latitude' => $this->contact['latitude'],
                'zoom' => $this->contact['zoom'],
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

    public function delete_contact(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        if($contact = DB::table('contacts')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first()
            ){

            $this->contact = [
                'id' => $contact->id,
                'user_id' => $contact->user_id,
                'longitude' => $contact->longitude,
                'latitude' => $contact->latitude,
                'zoom' => $contact->zoom,
            ];
            $this->dispatch('openModal',$modal_id);
        }
    }

    public function save_delete_contact(Request $request,$modal_id){
        $data = $request->session()->all();
        
        if(DB::table('contacts')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->contact['id'])
            ->delete()){
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

    public function save_add_contact_info(Request $request,$modal_id){
        $data = $request->session()->all();

        if(!strlen($this->contact_info['contact_title'])>0){
            return;
        }
        if(!strlen($this->contact_info['contact_details'])>0){
            return;
        }

        $this->contact_info['number_order'] = DB::table('contact_infos')
        ->select(
            DB::raw('count(*) as number_of_rows')
        )
        ->where('user_id','=',$data['user_id'])
        ->first()->number_of_rows+1;

        if(DB::table('contact_infos')
            ->insert([
                'id' => NULL,
                'user_id' => $data['user_id'],
                'contact_title' => $this->contact_info['contact_title'],
                'contact_details' => $this->contact_info['contact_details'],
                'number_order' => $this->contact_info['number_order'],
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
    public function edit_contact_info(Request $request,$modal_id,$id){
        $data = $request->session()->all();

        if($contact_info = DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])  
            ->where('id','=',$id)
            ->first()  
        ){

            $this->contact_info = [
                'id' => $contact_info->id,
                'user_id' => $contact_info->user_id,
                'contact_title' => $contact_info->contact_title,
                'contact_details' => $contact_info->contact_details,
                'number_order' => $contact_info->number_order,
            ];
            $this->dispatch('openModal',$modal_id);
        }
    }

    public function save_edit_contact_info(Request $request,$modal_id){
        $data = $request->session()->all();

        if(!strlen($this->contact_info['contact_title'])>0){
            return;
        }
        if(!strlen($this->contact_info['contact_details'])>0){
            return;
        }

        if(DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])  
            ->where('id','=',$this->contact_info['id'])
            ->update([
                'contact_title' => $this->contact_info['contact_title'],
                'contact_details' => $this->contact_info['contact_details'],
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
    public function delete_contact_info(Request $request,$modal_id,$id){
        $data = $request->session()->all();

        if($contact_info = DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])  
            ->where('id','=',$id)
            ->first()  
        ){

            $this->contact_info = [
                'id' => $contact_info->id,
                'user_id' => $contact_info->user_id,
                'contact_title' => $contact_info->contact_title,
                'contact_details' => $contact_info->contact_details,
                'number_order' => $contact_info->number_order,
            ];
            $this->dispatch('openModal',$modal_id);
        }
    }

    public function save_delete_contact_info(Request $request,$modal_id){
        $data = $request->session()->all();

       
        if(DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])  
            ->where('id','=',$this->contact_info['id'])
            ->delete()){
                
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );

            $contact_info_data = DB::table('contact_infos')
            ->where('user_id','=',$this->user_id)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

            foreach ($contact_info_data as $key => $value) {
                DB::table('contact_infos')
                    ->where('user_id','=',$data['user_id'])  
                    ->where('id','=',$value->id)
                    ->update([
                    'number_order'=>$key+1
                ]);
            }


            $this->dispatch('openModal',$modal_id);
            self::update_data();
            
        }
    }

    public function move_up_contact_infos(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('contact_infos')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_contact_infos(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('contact_infos')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('contact_infos')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
}
