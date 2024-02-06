<?php

namespace App\Livewire\Components\Footer\PageFooter;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PageFooter extends Component
{
    public $mode;
    public $user_id;
    public $request;

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

    public function update_data(){
        $table = self::get_table_info('links');
        $this->links_active = $table->table_isactive;
        $this->links_max_display = $table->table_max_display;

        $links_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->links_filter = [];
        foreach ($links_filter as $key => $value) {
            array_push($this->links_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $this->links_data = DB::table('links')
        ->where('user_id','=',$this->user_id )
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
        if ( !$request->is('/') && $request->is('blogdetails/*')) {
            $this->user_id = 1;
        }else{
            if ( !$request->is('/') && $request->is('*/*')) {
                $this->request = (substr($request->path(),0,strpos($request->path(),'/')+1));
            }
    
            if ($request->is('*/*')) {
                $value = substr($request->path(),strpos($request->path(),'/')+1);
               if( $value){
                    $this->user_id = intval($value);
                    if(DB::table('users as u')
                        ->where('user_id','=',$this->user_id)
                        ->first()){
    
                    }else{
                        return redirect('/');
                    }
                }else{
                    $this->user_id = 1;
                }
            }else{
                $this->user_id = DB::table('users as u')
                    ->where('user_name','=','Drusha01')
                    ->first()->user_id;
            }
        }

        self::update_data();
    }

    public function render()
    {
        return view('livewire.components.footer.page-footer.page-footer');
    }
}
