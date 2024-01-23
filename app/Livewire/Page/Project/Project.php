<?php

namespace App\Livewire\Page\Project;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Project extends Component
{
    public $title = 'Project';
    public $mode;
    public $user_id;

    public $project_active;
    public $project_max_display;
    public $project_filter = [];
    public $project_data = [];
    public $project = [
        'id' => NULL,
        'user_id'=> NULL,
        'question' => NULL,
        'answer' => NULL,
        'link' => NULL,
        'number_order' => NULL,
    ];

    public $image_content_project_id = 0;
    public $project_image_content_active;
    public $project_image_content_max_display;
    public $project_image_content_filter = [];
    public $project_image_content_data = [];
    public $project_image_content = [
        'id' => NULL,
        'user_id'=> NULL,
        'project_id' => NULL,
        'image' => NULL,
        'number_order' => NULL,
    ];

    public $project_developer_project_id = 0;
    public $project_developer_active;
    public $project_developer_max_display;
    public $project_developer_filter = [];
    public $project_developer_data = [];
    public $project_developer = [
        'id' => NULL,
        'user_id' => NULL,
        'project_id' => NULL,
        'developer_id' => NULL,
        'number_order' => NULL,
    ];

    public $developer_active;
    public $developer_max_display;
    public $developer_filter = [];
    public $developer_data = [];
    public $developer = [
        'id' => NULL,
        'user_id' => NULL,
        'full_name' => NULL,
        'image' => NULL,
        'linkedinlink' => NULL,
        'role' => NULL,
        'description' => NULL,
        'number_order' => NULL,
    ];

    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        if ($request->is('projects/*')) {
            $value = substr($request->path(),strlen('projects/'));
           if( $value){
                $this->user_id = intval($value);

                if(DB::table('users as u')
                    ->where('user_id','=',$this->user_id)
                    ->first()){

                }else{
                    $this->user_id = 1;
                    return redirect('/projects');
                }
            }
        }else{
            $this->user_id = DB::table('users as u')
                ->where('user_name','=','Drusha01')
                ->first()->user_id;
        }
    }

    

    public function update_data(){
        $table = self::get_table_info('projects');
        $this->project_active = $table->table_isactive;
        $this->project_max_display = $table->table_max_display;

        $this->project_data = DB::table('projects as p')
        ->select(
            "p.id",
            "p.user_id",
            "p.title",
            "p.content",
            "p.button",
            "p.link",
            "p.number_order",
            "p.date_created",
            "p.date_updated",
            "u.user_firstname",
            "u.user_middlename",
            "u.user_lastname",
            )
         ->join('users as u','u.user_id','p.user_id')
        ->where('p.user_id','=',$this->user_id)
        ->orderBy('number_order','asc')
        ->get()
        ->toArray();

        $project_data = [];
        if($this->project_data){
            foreach ($this->project_data as $key => $value) {
                $project_image_contents = DB::table('project_image_contents')
                    ->where('project_id','=',$value->id)
                    ->where('user_id','=',$this->user_id)
                    ->orderBy('number_order','asc')
                    ->get()
                    ->toArray();
                $project_image = []; 
                if($project_image_contents){
                    foreach ($project_image_contents as $pic_key => $pic_value) {
                        array_push($project_image,[
                            'image'=> $pic_value->image
                        ]);
                    }
                }

                $project_developer_data = DB::table('project_developers as pd')
                ->select(
                    'pd.id',
                    'pd.user_id',
                    'pd.developer_id',
                    'd.full_name',
                    'd.image',
                    'd.linkedinlink' ,
                    'pd.role',
                    'd.description' ,
                    'pd.number_order' ,
                    )
                ->join('developers as d','pd.developer_id','d.id')
                ->where('pd.user_id','=',$this->user_id)
                ->where('pd.project_id','=',$value->id)
                ->orderBy('pd.number_order','asc')
                ->get()
                ->toArray();

                $project_developer = []; 
                if($project_developer_data){
                    foreach ($project_developer_data as $pd_key => $pd_value) {
                        array_push($project_developer,[
                            'developer_id' => $pd_value->developer_id,
                            'full_name' => $pd_value->full_name,
                            'image' => $pd_value->image,
                            'linkedinlink' => $pd_value->linkedinlink,
                            'role' => $pd_value->role,
                            'description' => $pd_value->description,
                        ]);
                    }
                }
               
                array_push($project_data,[
                    "id"=> $value->id,
                    "user_id"=> $value->user_id,
                    "title"=> $value->title,
                    "content"=> $value->content,
                    "button"=> $value->button,
                    "link"=> $value->link,
                    "number_order"=> $value->number_order,
                    "project_image_contents" =>  $project_image, 
                    "project_developers" =>  $project_developer,
                    "date_created"=> $value->date_created,
                    "date_updated"=> $value->date_updated,
                    "user_firstname"=> $value->user_firstname,
                    "user_middlename"=> $value->user_middlename,
                    "user_lastname"=> $value->user_lastname,
                ]);
            }
        }
        $this->project_data = $project_data;
        // dd($this->project_data );

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
        return view('livewire.page.project.project')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
