<?php

namespace App\Livewire\Page\Contact;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Contact extends Component
{
    public $title = 'Contact';
    public $lng;
    public $lat;  
    public $zoom;

    public $mode;

    public $contact_data;
    public $contact_info_data;


    public $links_active;
    public $links_max_display;
    public $links_filter = [];
    public $links_data = [];
    public $link = [
        'id' => NULL,
        'user_id' => NULL,
        'image' => NULL,
        'link'  => NULL,
        'number_order' => NULL,
    ];
    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        if ($request->is('contact/*')) {
            $value = substr($request->path(),strlen('contact/'));
           if( $value){
                $this->user_id = intval($value);

                if(DB::table('users as u')
                    ->where('user_id','=',$this->user_id)
                    ->first()){

                }else{
                    $this->user_id = 1;
                    return redirect('/contact');
                }
            }
        }else{
            $this->user_id = DB::table('users as u')
                ->where('user_name','=','Drusha01')
                ->first()->user_id;
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

        $table = self::get_table_info('links');
        $this->links_active = $table->table_isactive;
        $this->links_max_display = $table->table_max_display;

        $this->links_data = DB::table('links')
        ->where('user_id','=',$this->user_id )
        ->orderBy('number_order','asc')
        ->get()
        ->toArray();

            
        $this->contact_data = DB::table('contacts')
            ->where('user_id','=',$this->user_id)
            ->orderBy('date_created','asc')
            ->get()
            ->toArray();
            
        if($this->contact_data){
            $this->lng = $this->contact_data[0]->longitude;
            $this->lat =  $this->contact_data[0]->latitude;
            $this->zoom = $this->contact_data[0]->zoom;
        }

        
        $this->contact_info_data = DB::table('contact_infos')
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
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->lng = 122.0761312;
        $this->lat = 6.9038855;
        $this->zoom = 16;

        self::update_data();
    }
    public function render()
    {
        return view('livewire.page.contact.contact')
        ->layout('components.layouts.contact',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
