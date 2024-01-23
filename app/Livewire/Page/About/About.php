<?php

namespace App\Livewire\Page\About;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class About extends Component
{
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public $color_toggle = false;

    public $about_page_active;
    public $about_page_max_display;
    public $about_page_filter = [];
    public $about_page_data = [];
    public $about_page = [
        'id' => NULL,
        'user_id' => NULL,
        'image' => NULL,
        'header'  => NULL,
        'content' => NULL,
        'button' => NULL,
        'link' => NULL,
    ];

    public $about_content_active;
    public $about_content_max_display;
    public $about_content_filter = [];
    public $about_content_data = [];
    public $about_content = [
        'id' => NULL,
        'user_id' => NULL,
        'image' => NULL,
        'header'  => NULL,
        'content' => NULL,
    ];

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

    public $skill_active;
    public $skill_max_display;
    public $skill_filter = [];
    public $skill_data = [];
    public $skill = [
        'id' => NULL,
        'user_id' => NULL,
        'image' => NULL,
        'header'  => NULL,
    ];

    public $achievements_active;
    public $achievements_max_display;
    public $achievements_filter = [];

    public $experience_active;
    public $experience_max_display;
    public $experience_filter = [];
    public $experience_data = [];
    public $experience = [
        'id' => NULL,
        'user_id' => NULL,
        'logo' => NULL,
        'title' => NULL,
        'start_date' => NULL,
        'end_date' => NULL,
        'location' => NULL,
        'type' => NULL,
        'link'=> NULL,
        'number_order' => NULL,
    ];

    public $education_active;
    public $education_max_display;
    public $education_filter = [];
    public $education_data = [];
    public $education = [
        'id' => NULL,
        'user_id' => NULL,
        'logo' => NULL,
        'title' => NULL,
        'start_date' => NULL,
        'end_date' => NULL,
        'location' => NULL,
        'type' => NULL,
        'link'=> NULL,
        'number_order' => NULL,
    ];

   
    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        if ($request->is('about/*')) {
            $value = substr($request->path(),strlen('about/'));
           if( $value){
                $this->user_id = intval($value);

                if(DB::table('users as u')
                    ->where('user_id','=',$this->user_id)
                    ->first()){

                }else{
                    $this->user_id = 1;
                    return redirect('/about');
                }
            }
        }else{
            $this->user_id = DB::table('users as u')
                ->where('user_name','=','Drusha01')
                ->first()->user_id;
        }


       
    }
    public function update_data(){

        $table = self::get_table_info('experience');
        $this->experience_active = $table->table_isactive;
        $this->experience_max_display = $table->table_max_display;

        $experience_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->experience_filter = [];
        foreach ($experience_filter as $key => $value) {
            array_push($this->experience_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $table = self::get_table_info('education');
        $this->education_active = $table->table_isactive;
        $this->education_max_display = $table->table_max_display;

        $education_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();
        $this->education_filter= [];
        foreach ($education_filter as $key => $value) {
            array_push($this->education_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style,
            ]);
        }

        $table = self::get_table_info('about_pages');
        $this->about_page_active = $table->table_isactive;
        $this->about_page_max_display = $table->table_max_display;

        $about_page_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();
        $this->about_page_filter = [];
        foreach ($about_page_filter as $key => $value) {
            array_push($this->about_page_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $table = self::get_table_info('about_content');
        $this->about_content_active = $table->table_isactive;
        $this->about_content_max_display = $table->table_max_display;

        $about_content_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();
        $this->about_content_filter = [];
        foreach ($about_content_filter as $key => $value) {
            array_push($this->about_content_filter,[
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

        $table = self::get_table_info('skills');
        $this->skill_active = $table->table_isactive;
        $this->skill_max_display = $table->table_max_display;

        $skill_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();
        $this->skill_filter = [];
        foreach ($skill_filter as $key => $value) {
            array_push($this->skill_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $this->experience_data = DB::table('experiences')
            ->where('user_id','=',$this->user_id )
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

        $this->education_data = DB::table('education')
            ->where('user_id','=',$this->user_id )
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

        $this->about_page_data = DB::table('about_pages')
            ->where('user_id','=',$this->user_id )
            ->get()
            ->toArray();

        $this->about_content_data = DB::table('about_content')
            ->where('user_id','=',$this->user_id )
            ->get()
            ->toArray();

        $this->links_data = DB::table('links')
            ->where('user_id','=',$this->user_id )
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

        $this->skill_data = DB::table('skills')
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

        self::update_data();
    }
    
    public function render()
    {
        return view('livewire.page.about.about')
            ->layout('components.layouts.page',[
                'title'=>$this->title,
                'mode'=>$this->mode]);
    }
}
