<?php

namespace App\Livewire\Admin\Project;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Project extends Component
{
    use WithFileUploads;
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
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
        $table = self::get_table_info('projects');
        $this->project_active = $table->table_isactive;
        $this->project_max_display = $table->table_max_display;

        $project_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->project_filter = [];
        foreach ($project_filter as $key => $value) {
            array_push($this->project_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $table = self::get_table_info('project_image_contents');
        $this->project_image_content_active = $table->table_isactive;
        $this->project_image_content_max_display = $table->table_max_display;

        $project_image_content_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->project_image_content_filter = [];
        foreach ($project_image_content_filter as $key => $value) {
            array_push($this->project_image_content_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $table = self::get_table_info('project_developers');
        $this->project_developers_active = $table->table_isactive;
        $this->project_developers_max_display = $table->table_max_display;

        $project_developer_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->project_developer_filter = [];
        foreach ($project_developer_filter as $key => $value) {
            array_push($this->project_developer_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $table = self::get_table_info('developers');
        $this->developers_active = $table->table_isactive;
        $this->developers_max_display = $table->table_max_display;

        $developer_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->developer_filter = [];
        foreach ($developer_filter as $key => $value) {
            array_push($this->developer_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }
        $this->project_data = DB::table('projects')
            ->where('user_id','=',$this->user_id)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

        $this->project_image_content_data = DB::table('project_image_contents')
            ->where('user_id','=',$this->user_id)
            ->where('project_id','=',$this->image_content_project_id)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

        $this->project_developer_data = DB::table('project_developers as pd')
            ->select(
                'pd.id',
                'pd.user_id',
                'pd.developer_id',
                'd.full_name',
                'd.image',
                'd.linkedinlink' ,
                'd.role',
                'd.description' ,
                'pd.number_order' ,
                
                )
            ->join('developers as d','pd.developer_id','d.id')
            ->where('pd.user_id','=',$this->user_id)
            ->where('pd.project_id','=',$this->project_developer_project_id)
            ->orderBy('pd.number_order','asc')
            ->get()
            ->toArray();
        $this->developer_data = DB::table('developers')
            ->where('user_id','=',$this->user_id)
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

            
    }
    public function update_image_content_data(){
       $this->image_content_project_id;

       self::update_data();
    }

    public function update_project_developer_data(){
        $this->project_developer_project_id;

        self::update_data();
    }
    public function update_project_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->project_filter as $key => $value) {
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

    public function update_project_image_content_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->project_image_content_filter as $key => $value) {
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

    public function update_project_developer_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->project_developer_filter as $key => $value) {
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

    public function update_developer_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->developer_filter as $key => $value) {
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
        return view('livewire.admin.project.project')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
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
        if($table_name == 'projects'){
            if($this->project_max_display >= 0 && $this->project_max_display <= 100){
                $this->project_max_display = self::update_max_display($table_name, $this->project_max_display );
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
                $this->project_max_display = $table->table_max_display;
            }
        }elseif( $table_name == 'project_image_contents'){
            dd($this->project_image_content_max_display );
            if($this->project_image_content_max_display >= 0 && $this->project_image_content_max_display <= 100){
                $this->project_image_content_max_display = self::update_max_display($table_name, $this->project_image_content_max_display );
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
                $this->project_image_content_max_display = $table->table_max_display;
            }
        }
    }
    public function toggle_active($table_name){
        if($table_name == 'projects'){
            $this->project_active = self::update_active_table($table_name, !$this->project_active);
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
    public function save_image($image_file,$folder_name,$table_name,$column_name){
        if($image_file && file_exists(storage_path().'/app/livewire-tmp/'.$image_file->getfilename())){
            $file_extension =$image_file->getClientOriginalExtension();
            $tmp_name = 'livewire-tmp/'.$image_file->getfilename();
            $size = Storage::size($tmp_name);
            $mime = Storage::mimeType($tmp_name);
            $max_image_size = 20 * 1024*1024; // 5 mb
            $file_extensions = array('image/jpeg','image/png','image/jpg');
            
            if($size<= $max_image_size){
                $valid_extension = false;
                foreach ($file_extensions as $value) {
                    if($value == $mime){
                        $valid_extension = true;
                        break;
                    }
                }
                if($valid_extension){
                    // move
                    $new_file_name = md5($tmp_name).'.'.$file_extension;
                    while(DB::table($table_name)
                    ->where([$column_name=> $new_file_name])
                    ->first()){
                        $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                    }
                    if(Storage::move($tmp_name, 'public/content/'.$folder_name.'/'.$new_file_name)){
                        return $new_file_name;
                    }
                }else{
                    $this->dispatch('swal:redirect',
                        position         									: 'center',
                        icon              									: 'warning',
                        title             									: 'Invalid image type!',
                        showConfirmButton 									: 'true',
                        timer             									: '1000',
                        link              									: '#'
                    );
                    return 0;
                }
            }else{
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'warning',
                    title             									: 'Image is too large!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
                return 0;
            } 
        }
        return 0;
    }

    public function add_row($modal_id){

        $this->project = [
            'id' => NULL,
            'user_id'=> NULL,
            'title' => NULL,
            'content' => NULL,
            'button' => NULL,
            'link' => NULL,
            'number_order' => NULL
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function add_project(Request $request,$modal_id){
        $data = $request->session()->all();
        if(!strlen($this->project['title'])>0){
            return;
        }
        if(!strlen($this->project['content'])>0){
            return;
        }

        $this->project['number_order'] = DB::table('projects')
            ->select(
                DB::raw('count(*) as number_order')
            )
            ->where('user_id','=',$this->user_id)
            ->get()
            ->first()->number_order+1;

        if(DB::table('projects')
            ->insert([
                'id' => NULL,
                'user_id'=> $data['user_id'],
                'title' => $this->project['title'],
                'content' => $this->project['content'],
                'button' => $this->project['button'],
                'link' => $this->project['link'],
                'number_order' => $this->project['number_order']
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

    public function edit_project(Request $request,$modal_id,$id){
        $data = $request->session()->all();
     
        $project = DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->project = [
            'id' =>  $project->id,
            'user_id'=> $project->user_id,
            'title' => $project->title,
            'content' => $project->content,
            'button' => $project->button,
            'link' => $project->link,
            'number_order' => $project->number_order
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_edit_project(Request $request,$modal_id){
        $data = $request->session()->all();
        if(!strlen($this->project['title'])>0){
            return;
        }
        if(!strlen($this->project['content'])>0){
            return;
        }
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project['id'])
            ->update([
                'title' => $this->project['title'],
                'content' => $this->project['content'],
                'button' => $this->project['button'],
                'link' => $this->project['link'],
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
    public function delete_project(Request $request,$modal_id,$id){
        $data = $request->session()->all();
     
        $project = DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->project = [
            'id' =>  $project->id,
            'user_id'=> $project->user_id,
            'title' => $project->title,
            'content' => $project->content,
            'button' => $project->button,
            'link' => $project->link,
            'number_order' => $project->number_order
        ];
        $this->dispatch('openModal',$modal_id);
    }
    public function save_delete_project(Request $request,$modal_id){
        $data = $request->session()->all();
     
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project['id'])
            ->delete()){

            DB::table('project_developers')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->project['id'])
            ->delete();
                
            $project_image_content_data =  DB::table('project_image_contents')
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->project['id'])
                ->get()
                ->toArray();
            foreach ($project_image_content_data as $key => $value) {
                if(file_exists(public_path('storage').'/content/project_image_contents/'.$value->image)){
                    unlink(public_path('storage').'/content/project_image_contents/'.$value->image);
                }
            }

            DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->project['id'])
            ->delete();

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
        $this->dispatch('openModal',$modal_id);
    }

    // project image content

    public function add_image_content(Request $request,$modal_id){
        $data = $request->session()->all();
     
        if(DB::table('projects')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->image_content_project_id)
        ->first()){
            $this->project_image_content = [
                'id' => NULL,
                'user_id'=> NULL,
                'project_id' => NULL,
                'image' => NULL,
                'number_order' => NULL,
            ];
            $this->dispatch('openModal',$modal_id);
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Please select project!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
    }

    public function add_project_image_content(Request $request,$modal_id){
        $data = $request->session()->all();
        if(DB::table('projects')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->image_content_project_id)
        ->first()){

            if($this->project_image_content['image']){
                $project_image_content['image'] = self::save_image($this->project_image_content['image'],'project_image_contents','project_image_contents','image');
                if($project_image_content['image'] == 0){
                    return;
                }
            }
            $this->project_image_content['number_order'] = DB::table('project_image_contents')
                ->select(
                    DB::raw('count(*) as number_order')
                )
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->image_content_project_id)
                ->get()
                ->first()->number_order+1;

            if(DB::table('project_image_contents')
                ->insert([
                    'id' => NULL,
                    'user_id'=>  $data['user_id'],
                    'project_id' =>  $this->image_content_project_id,
                    'image' =>  $project_image_content['image'],
                    'number_order' =>  $this->project_image_content['number_order'],
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
    }

    public function delete_project_image_content(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        if(DB::table('projects')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->image_content_project_id)
        ->first()){
            $project_image_content = DB::table('project_image_contents')
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->image_content_project_id)
                ->where('id','=',$id)
                ->first();
            $this->project_image_content = [
                'id' =>  $project_image_content->id,
                'user_id'=> $project_image_content->user_id,
                'project_id' => $project_image_content->project_id,
                'image' => $project_image_content->image,
                'number_order' => $project_image_content->number_order,
            ];
            $this->dispatch('openModal',$modal_id);
        }
    }

    public function save_delete_project_image_content(Request $request,$modal_id){
        $data = $request->session()->all();
        if(DB::table('projects')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->image_content_project_id)
        ->first()){
            $project_image_content = DB::table('project_image_contents')
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->image_content_project_id)
                ->where('id','=',$this->project_image_content['id'])
                ->first();
            if(file_exists(public_path('storage').'/content/project_image_contents/'.$project_image_content->image)){
                unlink(public_path('storage').'/content/project_image_contents/'.$project_image_content->image);
            }

            if(DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('id','=',$this->project_image_content['id'])
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
    }

    public function move_up_project_image_content(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('project_image_contents')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->first()->number_of_rows;
        $current = DB::table('project_image_contents')
        ->where('user_id','=',$data['user_id'])
        ->where('project_id','=',$this->image_content_project_id)
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_project_image_content(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('project_image_contents')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->first()->number_of_rows;
        $current = DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('id','=',$id)
            ->first();
            $current = DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('project_image_contents')
            ->where('user_id','=',$data['user_id'])
            ->where('project_id','=',$this->image_content_project_id)
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }

    // developer CRUD


    public function add_developer(Request $request,$modal_id){
        $data = $request->session()->all();
            $this->developer = [
            'id' => NULL,
            'user_id' => NULL,
            'full_name' => NULL,
            'image' => NULL,
            'linkedinlink' => NULL,
            'role' => NULL,
            'description' => NULL,
            'number_order' => NULL,
        ];
        $this->dispatch('openModal',$modal_id);
        
    }

    public function save_add_developer(Request $request,$modal_id){
        $data = $request->session()->all();
        if(!strlen($this->developer['full_name'])>0){
            return;
        }
        if(!strlen($this->developer['role'])>0){
            return;
        }

        $developer['image'] ="default.jpg";
        if($this->developer['image']){
            $developer['image'] = self::save_image($this->developer['image'],'developers','developers','image');
        
        }
        $this->developer['number_order'] = DB::table('developers')
            ->select(
                DB::raw('count(*) as number_order')
            )
            ->where('user_id','=',$data['user_id'])
            ->get()
            ->first()->number_order+1;

        if(DB::table('developers')
            ->insert([
                'id' => NULL,
                'user_id' => $data['user_id'],
                'full_name' => $this->developer['full_name'],
                'image' =>  $developer['image'],
                'linkedinlink' => $this->developer['linkedinlink'],
                'role' => $this->developer['role'],
                'description' => $this->developer['description'],
                'number_order' => $this->developer['number_order'],
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
    public function edit_developer(Request $request,$modal_id,$id){
        $data = $request->session()->all();
       
        $developer = DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
          
        $this->developer = [
            'id' => $developer->id,
            'user_id' => $developer->user_id,
            'full_name' => $developer->full_name,
            'image' => NULL,
            'linkedinlink' => $developer->linkedinlink,
            'role' => $developer->role,
            'description' => $developer->description,
            'number_order' => $developer->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
       
    }

    public function save_edit_developer(Request $request,$modal_id){
        $data = $request->session()->all();
        
        if(!strlen($this->developer['full_name'])>0){
            return;
        }
        if(!strlen($this->developer['role'])>0){
            return;
        }

        $developer = DB::table('developers')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->developer['id'])
        ->first();

        $developerImage =$developer->image; 
        if($this->developer['image']){
            $developerImage = self::save_image($this->developer['image'],'developers','developers','image');
            if( $developer->image != "default.jpg" &&  file_exists(public_path('storage').'/content/developers/'.$developer->image)){
                unlink(public_path('storage').'/content/developers/'.$developer->image);
            }
        }
        $this->developer['number_order'] = DB::table('developers')
            ->select(
                DB::raw('count(*) as number_order')
            )
            ->where('user_id','=',$data['user_id'])
            ->get()
            ->first()->number_order+1;

        if(DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->developer['id'])
            ->update([
                'full_name' => $this->developer['full_name'],
                'image' =>  $developerImage,
                'linkedinlink' => $this->developer['linkedinlink'],
                'role' => $this->developer['role'],
                'description' => $this->developer['description'],
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

    public function delete_developer(Request $request,$modal_id,$id){
        $data = $request->session()->all();
      
        $developer = DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        
        $this->developer = [
            'id' => $developer->id,
            'user_id' => $developer->user_id,
            'full_name' => $developer->full_name,
            'image' => NULL,
            'linkedinlink' => $developer->linkedinlink,
            'role' => $developer->role,
            'description' => $developer->description,
            'number_order' => $developer->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
       
    }

    public function save_delete_developer(Request $request,$modal_id){
        $data = $request->session()->all();

        $developer = DB::table('developers')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->developer['id'])
        ->first();

        if( $developer->image != "default.jpg" &&  file_exists(public_path('storage').'/content/developers/'.$developer->image)){
            unlink(public_path('storage').'/content/developers/'.$developer->image);
        }
        

        if(DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->developer['id'])
            ->delete()){

            DB::table('project_developers')
                ->where('user_id','=',$data['user_id'])
                ->where('developer_id','=',$this->developer['id'])
                ->delete();


            $developer_data = DB::table('developers')
                ->where('user_id','=',$this->user_id)
                ->orderBy('number_order','asc')
                ->get()
                ->toArray();

            foreach ( $developer_data as $key => $value) {
                DB::table('developers')
                ->where('user_id','=',$data['user_id'])
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

    public function move_up_developer(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('developers')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){

            $prev = DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();
            DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_developer(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('developers')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
            
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('developers')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }

    // project developer
    public function add_project_developer(Request $request,$modal_id){
        $data = $request->session()->all();
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project_developer_project_id)
            ->get()
            ->first()){
            $this->project_developer = [
                'id' => NULL,
                'user_id' => NULL,
                'project_id' => NULL,
                'developer_id' => NULL,
                'number_order' => NULL,
            ];
    
            $this->dispatch('openModal',$modal_id);
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Please select project!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
    }
    public function save_add_project_developer(Request $request,$modal_id){
        $data = $request->session()->all();
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project_developer_project_id)
            ->get()
            ->first()){

            if(DB::table('developers')
                ->where('id','=',$this->project_developer['developer_id'] )
                ->get()
                ->first()){

                $this->project_developer['number_order'] = DB::table('project_developers')
                    ->select(
                        DB::raw('count(*) as number_of_rows')
                    )
                    ->where('user_id','=',$data['user_id'])
                    ->where('id','=',$this->project_developer_project_id)
                    ->first()->number_of_rows+1;
                if(DB::table('project_developers')
                    ->insert([
                        'id' => NULL,
                        'user_id' => $data['user_id'],
                        'project_id' => $this->project_developer_project_id,
                        'developer_id' => $this->project_developer['developer_id'],
                        'number_order' => $this->project_developer['number_order'] ,
                ])){
                    $this->dispatch('swal:redirect',
                        position         									: 'center',
                        icon              									: 'warning',
                        title             									: 'Successfully added!',
                        showConfirmButton 									: 'true',
                        timer             									: '1000',
                        link              									: '#'
                    );

                    $this->dispatch('openModal',$modal_id);
                    self::update_data();
                }
            }
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Please select project!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
    }

    public function edit_project_developer(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project_developer_project_id)
            ->get()
            ->first()){
            $project_developer = DB::table('project_developers')
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->project_developer_project_id)
                ->where('id','=',$id)
                ->first();
            $this->project_developer = [
                'id' => $project_developer->id,
                'user_id' => $project_developer->user_id,
                'project_id' => $project_developer->project_id,
                'developer_id' => $project_developer->developer_id,
                'number_order' => $project_developer->number_order,
            ];
            $this->dispatch('openModal',$modal_id);
            
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Please select project!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
    }

    public function save_edit_project_developer(Request $request,$modal_id){
        $data = $request->session()->all();
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project_developer_project_id)
            ->get()
            ->first()){
          
            DB::table('project_developers')
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->project_developer_project_id)
                ->where('id','=',$this->project_developer['id'])
                ->update([
                    'developer_id'=>$this->project_developer['developer_id']
                ]);

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
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Please select project!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
    }

    public function delete_project_developer(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project_developer_project_id)
            ->get()
            ->first()){
            $project_developer = DB::table('project_developers')
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->project_developer_project_id)
                ->where('id','=',$id)
                ->first();
            $this->project_developer = [
                'id' => $project_developer->id,
                'user_id' => $project_developer->user_id,
                'project_id' => $project_developer->project_id,
                'developer_id' => $project_developer->developer_id,
                'number_order' => $project_developer->number_order,
            ];
            $this->dispatch('openModal',$modal_id);
            
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Please select project!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
    }

    public function save_delete_project_developer(Request $request,$modal_id){
        $data = $request->session()->all();
        if(DB::table('projects')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->project_developer_project_id)
            ->get()
            ->first()){
           
            DB::table('project_developers')
                ->where('user_id','=',$data['user_id'])
                ->where('project_id','=',$this->project_developer_project_id)
                ->where('id','=',$this->project_developer['id'])
                ->delete();

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
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Please select project!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
    }

}
