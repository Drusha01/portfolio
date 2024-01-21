<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Blog extends Component
{
    use WithFileUploads;
    public $title = 'Blog';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public $user_id;

    public $blog_active;
    public $blog_max_display;
    public $blog_filter = [];
    public $blog_data = [];
    public $blog = [
        'id' => NULL,
        'user_id'=> NULL,
        'image' => NULL,
        'title' => NULL,
        'content' => NULL,
        'link' => NULL,
        'button' => NULL,
    ];


    public $tag_details;
    public $tag_data = [];
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
        $table = self::get_table_info('blogs');
        $this->blog_active = $table->table_isactive;
        $this->blog_max_display = $table->table_max_display;

        $blog_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();
        $this->blog_filter = [];
        foreach ($blog_filter as $key => $value) {
            array_push($this->blog_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $this->blog_data = DB::table('blogs')
            ->where('user_id','=',$this->user_id)
            ->orderBy('date_created','asc')
            ->get()
            ->toArray();
    }

    public function update_blog_filter(Request $request){
        $data = $request->session()->all();
        foreach ($this->blog_filter as $key => $value) {
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
        if($table_name == 'blogs'){
            if($this->blog_max_display >= 0 && $this->blog_max_display <= 100){
                $this->blog_max_display = self::update_max_display($table_name, $this->blog_max_display );
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
                $this->blog_max_display = $table->table_max_display;
            }
        }
    }
    public function toggle_active($table_name){
        if($table_name == 'blogs'){
            $this->blog_active = self::update_active_table($table_name, !$this->blog_active);
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
        $this->blog = [
            'id' => NULL,
            'user_id'=> NULL,
            'image' => NULL,
            'title' => NULL,
            'content' => NULL,
            'link' => NULL,
            'button' => NULL,
        ];
        $this->dispatch('openModal',$modal_id);
    }

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id = $data['user_id'];

        self::update_data();
    }
    public function render()
    {
        return view('livewire.admin.blog.blog')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
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
    public function save_add_blog(Request $request,$modal_id){
        $data = $request->session()->all();

        if($this->blog['image']){
            $blog['image'] = self::save_image($this->blog['image'],'blogs','blogs','image');
            if($blog['image'] == 0){
                return;
            }
        }
        if(!strlen($this->blog['title'])>0){
            return;
        }
        if(!strlen($this->blog['content'])>0){
            return;
        }

        if(DB::table('blogs')
            ->insert([
            'id' => NULL,
            'user_id'=> $data['user_id'],
            'image' => $blog['image'],
            'title' => $this->blog['title'],
            'content' => $this->blog['content'],
            'link' => $this->blog['link'],
            'button' => $this->blog['button'],
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
    public function edit_blog(Request $request,$modal_id,$id){
        $data = $request->session()->all();

        $blog = DB::table('blogs')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        $this->blog = [
                'id' => $blog->id,
                'user_id'=>  $blog->id,
                'image' => NULL,
                'title' =>  $blog->title,
                'content' =>  $blog->content,
                'link' =>  $blog->link,
                'button' =>  $blog->button,
            ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_edit_blog(Request $request,$modal_id){
        $data = $request->session()->all();

        $blog = DB::table('blogs')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->blog['id'])
        ->first();
        $blogImage = $blog->image;

        if($this->blog['image']){
            $blogImage = self::save_image($this->blog['image'],'blogs','blogs','image');
            if(file_exists(public_path('storage').'/content/blogs/'.$blog->image)){
                unlink(public_path('storage').'/content/blogs/'.$blog->image);
            }
        }
        if(!strlen($this->blog['title'])>0){
            return;
        }
        if(!strlen($this->blog['content'])>0){
            return;
        }

        if(DB::table('blogs')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->blog['id'])
            ->update([
            'image' => $blogImage,
            'title' => $this->blog['title'],
            'content' => $this->blog['content'],
            'link' => $this->blog['link'],
            'button' => $this->blog['button'],
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

    public function delete_blog(Request $request,$modal_id,$id){
        $data = $request->session()->all();

        $blog = DB::table('blogs')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        $this->blog = [
                'id' => $blog->id,
                'user_id'=>  $blog->id,
                'image' => NULL,
                'title' =>  $blog->title,
                'content' =>  $blog->content,
                'link' =>  $blog->link,
                'button' =>  $blog->button,
            ];
        $this->dispatch('openModal',$modal_id);
    }

    public function save_delete_blog(Request $request,$modal_id){
        $data = $request->session()->all();

        $blog = DB::table('blogs')
        ->where('user_id','=',$data['user_id'])
        ->where('id','=',$this->blog['id'])
        ->first();
        if(file_exists(public_path('storage').'/content/blogs/'.$blog->image)){
            unlink(public_path('storage').'/content/blogs/'.$blog->image);
        }

        if(DB::table('blogs')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$this->blog['id'])
            ->delete()){
            $this->dispatch('openModal',$modal_id);
            self::update_data();
        }
    }
    public function view_tags(Request $request,$modal_id,$id){
        $data = $request->session()->all();

        $blog = DB::table('blogs')
            ->where('user_id','=',$data['user_id'])
            ->where('id','=',$id)
            ->first();

        $this->blog = [
            'id' => $blog->id,
            'user_id'=>  $blog->id,
            'image' => NULL,
            'title' =>  $blog->title,
            'content' =>  $blog->content,
            'link' =>  $blog->link,
            'button' =>  $blog->button,
        ];
        $this->tag_data = DB::table('blog_tags as bt')
            ->select(
                'bt.id',
                'tag_details',
                'bt.tag_id'
            )
            ->join('tags as t','t.id','bt.tag_id')
            ->where('user_id','=',$data['user_id'])
            ->where('blog_id','=',$id)
            ->get()
            ->toArray();
        $this->tag_details = NULL;
        $this->dispatch('openModal',$modal_id);
    }

    public function add_tag(Request $request,$id){
        $data = $request->session()->all();
        if(!strlen($this->tag_details)>0){
            return;
        }
        $tag = DB::table('tags')
            ->where('tag_details','=',$this->tag_details)
            ->first();
        if(!$tag){
            DB::table('tags')
            ->insert([
                'tag_details'=>$this->tag_details
            ]);
            $tag = DB::table('tags')
            ->where('tag_details','=',$this->tag_details)
            ->first();
        }
        if(DB::table('blog_tags')
            ->insert([
                'id' =>NULL,
                'user_id' => $data['user_id'],
                'blog_id' =>$id,
                'tag_id' =>$tag->id,
            ])){
                $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully added!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
            $this->tag_data = DB::table('blog_tags as bt')
            ->select(
                'bt.id',
                'tag_details',
                'bt.tag_id'
            )
            ->join('tags as t','t.id','bt.tag_id')
            ->where('user_id','=',$data['user_id'])
            ->where('blog_id','=',$id)
            ->get()
            ->toArray();
            $this->tag_details = NULL;
        }
    }

    public function delete_tag(Request $request,$blog_id,$id){
        $data = $request->session()->all();
        if(DB::table('blog_tags')
            ->where('user_id','=',$data['user_id'])
            ->where('blog_id','=',$blog_id)
            ->where('id','=',$id)
            ->delete()){
                $this->dispatch('swal:redirect',
                position         									: 'center',
                icon              									: 'success',
                title             									: 'Successfully deleted!',
                showConfirmButton 									: 'true',
                timer             									: '1000',
                link              									: '#'
            );
            $this->tag_data = DB::table('blog_tags as bt')
            ->select(
                'bt.id',
                'tag_details',
                'bt.tag_id'
            )
            ->join('tags as t','t.id','bt.tag_id')
            ->where('user_id','=',$data['user_id'])
            ->where('blog_id','=',$blog_id)
            ->get()
            ->toArray();
            $this->tag_details = NULL;
        }
    }
}
