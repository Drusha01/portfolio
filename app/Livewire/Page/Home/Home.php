<?php

namespace App\Livewire\Page\Home;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Home extends Component
{
    public $title = 'Home';
    public $mode;
    public $color_toggle = false;
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
    
   
    public $about_page_data = [];
    public $about_content_data = [];
    public $links_data = [];
    public $skill_data = [];
    public $blogs_data = [];
    public $projects_data = [];
    public $experience_data = [];
    public $education_data = [];

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
            ->where('table_isactive','=',1)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

        
    }
   

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

    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->where('user_id','=',$this->user_id)
        ->first());
    }
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];

        self::update_data();
    }
    public function render()
    {
        return view('livewire.page.home.home')
        ->layout('components.layouts.homepage',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
