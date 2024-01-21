<?php

namespace App\Livewire\Admin\About;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class About extends Component
{
    use WithFileUploads;
    public $title = 'About';
    
    public $user_id;

    public $mode;
    public $background = "282828";
    public $color = 'fff';

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

    public function update_about_page_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->about_page_filter as $key => $value) {
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

    public function update_about_content_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->about_content_filter as $key => $value) {
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
    public function update_links_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->links_filter as $key => $value) {
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
    public function update_skill_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->skill_filter as $key => $value) {
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
    public function update_experience_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->experience_filter as $key => $value) {
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
    public function update_education_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->education_filter as $key => $value) {
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
        // dd($this->education_filter);



    }
    public function render(){
        return view('livewire.admin.about.about')   
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
        if($table_name == 'about-page'){

             
        }else if($table_name == 'about-content'){

        }else if($table_name == 'links'){
            if($this->links_max_display >= 0 && $this->links_max_display <= 100){
                $this->links_max_display = self::update_max_display($table_name, $this->links_max_display );
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
                $this->links_max_display = $table->table_max_display;
            }
        }else if($table_name == 'skills'){
            if($this->skill_max_display >= 0 && $this->skill_max_display <= 100){
                $this->skill_max_display = self::update_max_display($table_name, $this->skill_max_display );
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
                $this->skill_max_display = $table->table_max_display;
            }
        }else if($table_name == 'achievements'){
           
        }
        else if($table_name == 'experience'){
            if($this->experience_max_display >= 0 && $this->experience_max_display <= 100){
                $this->experience_max_display = self::update_max_display($table_name, $this->experience_max_display );
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
                $this->experience_max_display = $table->table_max_display;
            }
        }
        else if($table_name == 'education'){
            if($this->education_max_display >= 0 && $this->education_max_display <= 100){
                $this->education_max_display = self::update_max_display($table_name, $this->education_max_display );
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
                $this->education_max_display = $table->table_max_display;
            }
        }
    }
    public function toggle_active($table_name){
        if($table_name == 'about_pages'){
            $this->about_page_active = self::update_active_table($table_name, !$this->about_page_active);
        }else if($table_name == 'about_content'){
            $this->about_content_active = self::update_active_table($table_name, !$this->about_content_active);
        }else if($table_name == 'links'){
            $this->links_active = self::update_active_table($table_name, !$this->links_active);
        }else if($table_name == 'achievements'){
            $this->achievements_active = self::update_active_table($table_name, !$this->achievements_active);
        }
        else if($table_name == 'skills'){
            $this->skill_active = self::update_active_table($table_name, !$this->skill_active);
        }
        else if($table_name == 'experience'){
            $this->experience_active = self::update_active_table($table_name, !$this->experience_active);
        }
        else if($table_name == 'education'){
            $this->education_active = self::update_active_table($table_name, !$this->education_active);
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

        $this->about_page = [
            'id' => NULL,
            'user_id' => NULL,
            'image' => NULL,
            'header'  => NULL,
            'content' => NULL,
            'button' => NULL,
            'link' => NULL,
        ];

        $this->about_content = [
            'id' => NULL,
            'user_id' => NULL,
            'image' => NULL,
            'header'  => NULL,
            'content' => NULL,
        ];

        $this->link = [
            'id' => NULL,
            'user_id' => NULL,
            'image' => NULL,
            'link'  => NULL,
            'number_order' => NULL,
        ];

        $this->skill = [
            'id' => NULL,
            'user_id' => NULL,
            'image' => NULL,
            'header'  => NULL,
        ];

        $this->experience = [
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
        $this->education = [
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
        $this->dispatch('openModal',$modal_id
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

    // about page CRUD
    public function add_about_page(Request $request,$modal_id){
        $data = $request->session()->all();
        if($this->about_page['image']){
            $about_page['image'] = self::save_image($this->about_page['image'],'about_pages','about_pages','image');
            if($about_page['image'] == 0){
                return;
            }
        }
        if(!strlen($this->about_page['header'])>0){
            return;
        }
        if(!strlen($this->about_page['content'])>0){
            return;
        }
        if(DB::table('about_pages')
            ->insert([
                'id' => NULL,
                'user_id' =>  $data['user_id'],
                'image' => $about_page['image'],
                'header'  => $this->about_page['header'],
                'content' => $this->about_page['content'],
                'button' => $this->about_page['button'],
                'link' => $this->about_page['link'],
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
        }
        self::update_data();
    }

    public function edit_about_page(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $about_page = DB::table('about_pages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->about_page = [
            'id' => $about_page->id,
            'user_id' => $about_page->user_id,
            'image' => NULL,
            'header'  => $about_page->header,
            'content' => $about_page->content,
            'button' => $about_page->button,
            'link' => $about_page->link,
        ];

        $this->dispatch('openModal',$modal_id);
    }

    public function save_edit_about_page(Request $request,$modal_id){
        $data = $request->session()->all();
        $about_page = DB::table('about_pages')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->about_page['id'])
        ->first();
        $about_page_image = $about_page->image;

        if($this->about_page['image']){
            $about_page_image = self::save_image($this->about_page['image'],'about_pages','about_pages','image');
            if($about_page_image !=0){
                if(file_exists(public_path('storage').'/content/about_pages/'.$about_page->image)){
                    unlink(public_path('storage').'/content/about_pages/'.$about_page->image);
                }
            }
        }
        if(!strlen($this->about_page['header'])>0){
            return;
        }
        if(!strlen($this->about_page['content'])>0){
            return;
        }
        if(DB::table('about_pages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->about_page['id'])
            ->update([
                'image' => $about_page_image,
                'header'  => $this->about_page['header'],
                'content' => $this->about_page['content'],
                'button' => $this->about_page['button'],
                'link' => $this->about_page['link'],
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
        }
        self::update_data();
    }

    public function delete_about_page(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $about_page = DB::table('about_pages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->about_page = [
            'id' => $about_page->id,
            'user_id' => $about_page->user_id,
            'image' => NULL,
            'header'  => $about_page->header,
            'content' => $about_page->content,
            'button' => $about_page->button,
            'link' => $about_page->link,
        ];
        $this->dispatch('openModal',$modal_id);
    }
    public function save_delete_about_page(Request $request,$modal_id){
        $data = $request->session()->all();
        $about_page = DB::table('about_pages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->about_page['id'])
            ->first();
        if(file_exists(public_path('storage').'/content/about_pages/'.$about_page->image)){
            unlink(public_path('storage').'/content/about_pages/'.$about_page->image);
        }

        if(DB::table('about_pages')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->about_page['id'])
            ->delete()){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
        $this->dispatch('openModal',$modal_id);
        self::update_data();
    }

    // about content page
    public function add_about_content(Request $request,$modal_id){
        $data = $request->session()->all();
        if($this->about_content['image']){
            $about_content['image'] = self::save_image($this->about_content['image'],'about_content','about_content','image');
            if($about_content['image'] == 0){
                return;
            }
        }
        if(!strlen($this->about_content['header'])>0){
            return;
        }
        if(!strlen($this->about_content['content'])>0){
            return;
        }
        if(DB::table('about_content')
            ->insert([
                'id' => NULL,
                'user_id' =>  $data['user_id'],
                'image' => $about_content['image'],
                'header'  => $this->about_content['header'],
                'content' => $this->about_content['content'],
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
        }
        self::update_data();
    } 

    public function edit_about_content(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $about_content = DB::table('about_content')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->about_content = [
            'id' => $about_content->id,
            'user_id' => $about_content->user_id,
            'image' => NULL,
            'header'  => $about_content->header,
            'content' => $about_content->content,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_edit_about_content(Request $request,$modal_id){
        $data = $request->session()->all();
        $about_content = DB::table('about_content')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->about_content['id'])
        ->first();
        $about_content_image = $about_content->image;

        if($this->about_content['image']){
            $about_content_image = self::save_image($this->about_content['image'],'about_content','about_content','image');
            if($about_content_image !=0){
                if(file_exists(public_path('storage').'/content/about_content/'.$about_content->image)){
                    unlink(public_path('storage').'/content/about_content/'.$about_content->image);
                }
            }
        }
        if(!strlen($this->about_content['header'])>0){
            return;
        }
        if(!strlen($this->about_content['content'])>0){
            return;
        }
        if(DB::table('about_content')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->about_content['id'])
            ->update([
                'image' => $about_content_image,
                'header'  => $this->about_content['header'],
                'content' => $this->about_content['content'],
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
        }
        self::update_data();
    }

    public function delete_about_content(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $about_content = DB::table('about_content')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->about_content = [
            'id' => $about_content->id,
            'user_id' => $about_content->user_id,
            'image' => NULL,
            'header'  => $about_content->header,
            'content' => $about_content->content,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_delete_about_content(Request $request,$modal_id){
        $data = $request->session()->all();
        $about_content = DB::table('about_content')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->about_content['id'])
            ->first();
        if(file_exists(public_path('storage').'/content/about_content/'.$about_content->image)){
            unlink(public_path('storage').'/content/about_content/'.$about_content->image);
        }

        if(DB::table('about_content')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->about_content['id'])
            ->delete()){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
        $this->dispatch('openModal',$modal_id);
        self::update_data();
    }

    // links CRUD
    public function add_link(Request $request,$modal_id){
        $data = $request->session()->all();
        if($this->link['image']){
            $link['image'] = self::save_image($this->link['image'],'links','links','image');
            if($link['image'] == 0){
                return;
            }
        }
        if(!strlen($this->link['link'])>0){
            return;
        }
        $this->link['number_order'] = DB::table('links')
        ->select(
            DB::raw('count(*) as number_order')
        )
        ->get()
        ->first()->number_order+1;

        if(DB::table('links')
            ->insert([
                'id' => NULL,
                'user_id' =>  $data['user_id'],
                'image' => $link['image'],
                'link' => $this->link['link'],
                'number_order' => $this->link['number_order'],
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
        }
        self::update_data();
    }

    public function edit_link(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $link = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        $this->link = [
            'id' =>  $link->id,
            'user_id' => $link->user_id,
            'image' => NULL,
            'link'  => $link->link,
            'number_order' => $link->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
    }
    public function save_edit_link(Request $request,$modal_id){
        $data = $request->session()->all();
        $link = DB::table('links')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->link['id'])
        ->first();
        $linkimage = $link->image;

        if($this->link['image']){
            $linkimage = self::save_image($this->link['image'],'links','links','image');
            if($linkimage !=0){
                if(file_exists(public_path('storage').'/content/links/'.$link->image)){
                    unlink(public_path('storage').'/content/links/'.$link->image);
                }
            }
        }
        if(!strlen($this->link['link'])>0){
            return;
        }
        

        if(DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->link['id'])
            ->update([
                'image' => $linkimage,
                'link' => $this->link['link'],
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
        }
        self::update_data();
    }

    public function delete_link(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $link = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        $this->link = [
            'id' =>  $link->id,
            'user_id' => $link->user_id,
            'image' => NULL,
            'link'  => $link->link,
            'number_order' => $link->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_delete_link(Request $request,$modal_id){
        $data = $request->session()->all();
        
        $this->user_id = $data['user_id'];
        $link = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->link['id'])
            ->first();

        if(file_exists(public_path('storage').'/content/links/'.$link->image)){
            unlink(public_path('storage').'/content/links/'.$link->image);
        }
            
        if(DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->link['id'])
            ->delete()){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );

            $links = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    
        
            foreach ($links as $key => $value) {
                DB::table('links')
                    ->where('user_id','=',$data['user_id'])
                    ->where('id','=', $value->id)
                    ->update([
                        'number_order'=> $key+1
                ]);
            }
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Unsuccessfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
        $this->dispatch('openModal',$modal_id);
        self::update_data();
    }
    public function move_up_links(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('links')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_links(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('links')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('links')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }

    // experiece CRUD 
    public function add_experience(Request $request,$modal_id){
        $data = $request->session()->all();
        if($this->experience['logo']){
            $experience['logo'] = self::save_image($this->experience['logo'],'experience','experiences','logo');
            if($experience['logo'] == 0){
                return;
            }
        }
        if(!strlen($this->experience['title'])>0){
            return;
        }
        if(!$this->experience['start_date']){
            return;
        }
        if(!strlen($this->experience['end_date'])>-1){
            return;
        }
        if(!strlen($this->experience['location'])>0){
            return;
        }
        if(!strlen($this->experience['type'])>0){
            return;
        }
        if(!strlen($this->experience['link'])>-1){
            return;
        }

        $this->experience['number_order'] = DB::table('experiences')
            ->select(
                DB::raw('count(*) as number_order')
            )
            ->get()
            ->first()->number_order+1;

        if(DB::table('experiences')
            ->insert([
                'id' => NULL,
                'user_id' =>  $data['user_id'],
                'logo' =>  $experience['logo'],
                'title' =>  $this->experience['title'],
                'start_date' =>  $this->experience['start_date'],
                'end_date' =>  $this->experience['end_date'],
                'location' =>  $this->experience['location'],
                'type' =>  $this->experience['type'],
                'link' =>  $this->experience['link'],
                'number_order' =>  $this->experience['number_order'],
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
        }

        self::update_data();
    }
    public function delete_experience($modal_id,$id){
        $this->experience = [
            'id' => $id,
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
        $this->dispatch('openModal',$modal_id);
    }
    public function save_delete_experience(Request $request,$modal_id){
        $data = $request->session()->all();
      
        $this->user_id = $data['user_id'];
        $experience = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->experience['id'])
            ->first();

        if(file_exists(public_path('storage').'/content/experience/'.$experience->logo)){
            unlink(public_path('storage').'/content/experience/'.$experience->logo);
        }
        
        if(DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->experience['id'])
            ->delete()){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );

            $experience_data = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    
        
            foreach ($experience_data as $key => $value) {
                DB::table('experiences')
                    ->where('user_id','=',$data['user_id'])
                    ->where('id','=', $value->id)
                    ->update([
                        'number_order'=> $key+1
                ]);
            }
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Unsuccessfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }

        $this->dispatch('openModal',$modal_id);
        self::update_data();
    }
    public function edit_experience(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $experience = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->experience = [
            'id' =>  $experience->id,
            'user_id' => $experience->user_id,
            'logo' => NULL,
            'title' => $experience->title,
            'start_date' => $experience->start_date,
            'end_date' => $experience->end_date,
            'location' => $experience->location,
            'type' => $experience->type,
            'link'=> $experience->link,
            'number_order' => $experience->id,
        ];
        $this->dispatch('openModal',$modal_id);
    }
    public function save_edit_experience(Request $request,$modal_id){
        $data = $request->session()->all();
        $experience = DB::table('experiences')
                ->where('user_id','=',$data['user_id'])
                ->where('id','=',$this->experience['id'])
                ->first();
        $experienceLogo  = $experience->logo;
        if($this->experience['logo']){
            $experienceLogo = self::save_image($this->experience['logo'],'experience','experiences','logo');
            if(file_exists(public_path('storage').'/content/experience/'.$experience->logo)){
                unlink(public_path('storage').'/content/experience/'.$experience->logo);
            }
        }
        if(!strlen($this->experience['title'])>0){
            return;
        }
        if(!$this->experience['start_date']){
            return;
        }
        if(!strlen($this->experience['end_date'])>-1){
            return;
        }else{
            if($this->experience['end_date']){
                DB::table('experiences')
                ->where('user_id','=',$data['user_id'])
                ->where('id','=',$this->experience['id'])
                ->update([
                    'end_date' =>  $this->experience['end_date'],
                ]);
            }else{
                DB::table('experiences')
                ->where('user_id','=',$data['user_id'])
                ->where('id','=',$this->experience['id'])
                ->update([
                    'end_date' =>  NULL,
                ]);
            }
        }
        if(!strlen($this->experience['location'])>0){
            return;
        }
        if(!strlen($this->experience['type'])>0){
            return;
        }
        if(!strlen($this->experience['link'])>-1){
            return;
        }

        if(DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->experience['id'])
            ->update([
                'user_id' =>  $data['user_id'],
                'logo' =>    $experienceLogo,
                'title' =>  $this->experience['title'],
                'start_date' =>  $this->experience['start_date'],
                'location' =>  $this->experience['location'],
                'type' =>  $this->experience['type'],
                'link' =>  $this->experience['link'],
        ])){
           
        }
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

    public function move_up_experience(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('experiences')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_experience(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('experiences')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
            $current = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('experiences')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    

    // education CRUD
    public function add_education(Request $request,$modal_id){
        $data = $request->session()->all();
        if($this->education['logo']){
            $education['logo'] = self::save_image($this->education['logo'],'education','education','logo');
            if($education['logo'] == 0){
                return;
            }
        }
        if(!strlen($this->education['title'])>0){
            return;
        }
        if(!$this->education['start_date']){
            return;
        }
        if(!strlen($this->education['end_date'])>-1){
            return;
        }
        if(!strlen($this->education['location'])>0){
            return;
        }
        if(!strlen($this->education['type'])>0){
            return;
        }
        if(!strlen($this->education['link'])>-1){
            return;
        }

        $this->education['number_order'] = DB::table('education')
            ->select(
                DB::raw('count(*) as number_order')
            )
            ->get()
            ->first()->number_order+1;

        // insert
        if(DB::table('education')
            ->insert([
                'id' => NULL,
                'user_id' =>  $data['user_id'],
                'logo' =>  $education['logo'],
                'title' =>  $this->education['title'],
                'start_date' =>  $this->education['start_date'],
                'end_date' =>  $this->education['end_date'],
                'location' =>  $this->education['location'],
                'type' =>  $this->education['type'],
                'link' =>  $this->education['link'],
                'number_order' =>  $this->education['number_order'],
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
        }
        self::update_data();
    }
    public function edit_education(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $education = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->education = [
            'id' =>  $education->id,
            'user_id' => $education->user_id,
            'logo' => NULL,
            'title' => $education->title,
            'start_date' => $education->start_date,
            'end_date' => $education->end_date,
            'location' => $education->location,
            'type' => $education->type,
            'link'=> $education->link,
            'number_order' => $education->id,
        ];
        $this->dispatch('openModal',$modal_id);
    }
    
    public function save_edit_education(Request $request,$modal_id){
        $data = $request->session()->all();
        $education = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->education['id'])
            ->first();
        $educationLogo = $education->logo;
        $data = $request->session()->all();
        if($this->education['logo']){
            $educationLogo = self::save_image($this->education['logo'],'education','education','logo');
            if(file_exists(public_path('storage').'/content/education/'.$education->logo)){
                unlink(public_path('storage').'/content/education/'.$education->logo);
            }
        }
        if(!strlen($this->education['title'])>0){
            return;
        }
        if(!$this->education['start_date']){
            return;
        }
        if(!strlen($this->education['end_date'])>-1){
            return;
        }
        if(!strlen($this->education['location'])>0){
            return;
        }
        if(!strlen($this->education['type'])>0){
            return;
        }
        if(!strlen($this->education['link'])>-1){
            return;
        }

        $this->education['number_order'] = DB::table('education')
            ->select(
                DB::raw('count(*) as number_order')
            )
            ->get()
            ->first()->number_order+1;

        // insert
        if(DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->education['id'])
            ->update([
                'logo' =>  $educationLogo,
                'title' =>  $this->education['title'],
                'start_date' =>  $this->education['start_date'],
                'end_date' =>  $this->education['end_date'],
                'location' =>  $this->education['location'],
                'type' =>  $this->education['type'],
                'link' =>  $this->education['link'],
                'number_order' =>  $this->education['number_order'],
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
        }
        self::update_data();
    }
    public function delete_education(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $education = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        $this->education = [
            'id' =>  $education->id,
            'user_id' => $education->user_id,
            'logo' => NULL,
            'title' => $education->title,
            'start_date' => $education->start_date,
            'end_date' => $education->end_date,
            'location' => $education->location,
            'type' => $education->type,
            'link'=> $education->link,
            'number_order' => $education->id,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_delete_education(Request $request,$modal_id){
        $data = $request->session()->all();
      
        $this->user_id = $data['user_id'];
        $education = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->education['id'])
            ->first();

        if(file_exists(public_path('storage').'/content/education/'.$education->logo)){
            unlink(public_path('storage').'/content/education/'.$education->logo);
        }
        
        if(DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->education['id'])
            ->delete()){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );

            $education_data = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    
        
            foreach ($education_data as $key => $value) {
                DB::table('education')
                    ->where('user_id','=',$data['user_id'])
                    ->where('id','=', $value->id)
                    ->update([
                        'number_order'=> $key+1
                ]);
            }
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Unsuccessfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }

        $this->dispatch('openModal',$modal_id);
        self::update_data();
    
    }
    public function move_up_education(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('education')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_education(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('education')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
            $current = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('education')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }


    // SKILL CRUD
    public function save_add_skill(Request $request,$modal_id){
        $data = $request->session()->all();
        if($this->skill['image']){
            $skill['image'] = self::save_image($this->skill['image'],'skills','skills','image');
            if($skill['image'] == 0){
                return;
            }
        }
        if(!strlen($this->skill['header'])>0){
            return;
        }
        $this->skill['number_order'] = DB::table('skills')
        ->select(
            DB::raw('count(*) as number_order')
        )
        ->get()
        ->first()->number_order+1;

        if(DB::table('skills')
            ->insert([
                'id' => NULL,
                'user_id' =>  $data['user_id'],
                'image' => $skill['image'],
                'header' => $this->skill['header'],
                'number_order' => $this->skill['number_order'],
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
        }
        self::update_data();
    }

    public function edit_skill(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $skill = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        $this->skill = [
            'id' =>  $skill->id,
            'user_id' => $skill->user_id,
            'image' => NULL,
            'header'  => $skill->header,
            'number_order' => $skill->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
    }
    public function save_edit_skill(Request $request,$modal_id){
        $data = $request->session()->all();
        $skill = DB::table('skills')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->skill['id'])
        ->first();
        $skillimage = $skill->image;

        if($this->skill['image']){
            $skillimage = self::save_image($this->skill['image'],'skills','skills','image');
            if($skillimage !=0){
                if(file_exists(public_path('storage').'/content/skills/'.$skill->image)){
                    unlink(public_path('storage').'/content/skills/'.$skill->image);
                }
            }
        }
        if(!strlen($this->skill['header'])>0){
            return;
        }
        

        if(DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->skill['id'])
            ->update([
                'image' => $skillimage,
                'header' => $this->skill['header'],
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
        }
        self::update_data();
    }

    public function delete_skill(Request $request,$modal_id,$id){
        $data = $request->session()->all();
        $skill = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        $this->skill = [
            'id' =>  $skill->id,
            'user_id' => $skill->user_id,
            'image' => NULL,
            'header'  => $skill->header,
            'number_order' => $skill->number_order,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_delete_skill(Request $request,$modal_id){
        $data = $request->session()->all();
        
        $this->user_id = $data['user_id'];
        $skill = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->skill['id'])
            ->first();

        if(file_exists(public_path('storage').'/content/skills/'.$skill->image)){
            unlink(public_path('storage').'/content/skills/'.$skill->image);
        }
            
        if(DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->skill['id'])
            ->delete()){
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );

            $skills = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    
        
            foreach ($skills as $key => $value) {
                DB::table('skills')
                    ->where('user_id','=',$data['user_id'])
                    ->where('id','=', $value->id)
                    ->update([
                        'number_order'=> $key+1
                ]);
            }
        }else{
            $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'warning',
                title             									: 'Unsuccessfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
        }
        $this->dispatch('openModal',$modal_id);
        self::update_data();
    }
    public function move_up_skills(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('skills')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != 1){
            $prev = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','<',$current->number_order)
            ->orderBy('number_order','desc')
            ->first();

            DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }
    public function move_down_skills(Request $request,$id){
        $data = $request->session()->all();
        $count = DB::table('skills')
            ->select(
                DB::raw('count(*) as number_of_rows')
            )
            ->where('user_id','=',$data['user_id'])
            ->first()->number_of_rows;
        $current = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();
        if( $count > 1 && $current->number_order != $count){
            $prev = DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('number_order','>',$current->number_order)
            ->orderBy('number_order','asc')
            ->first();

            DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$prev->id)
            ->update([
                'number_order' => $current->number_order
            ]);
            DB::table('skills')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$current->id)
            ->update([
                'number_order' => $prev->number_order
            ]);
            self::update_data();
        }
    }


}
