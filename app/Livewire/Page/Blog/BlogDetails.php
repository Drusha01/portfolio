<?php

namespace App\Livewire\Page\Blog;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class BlogDetails extends Component
{
    public $title = 'Blog';
    public $mode;

    public $blog_active;
    public $blog_max_display;
    public $blog_filter = [];
    public $blog_data = [];

    public $tag_details;
    public $tag_data = [];
    public function update_data(){
        $table = self::get_table_info('blogs');
        $this->blog_active = $table->table_isactive;
        $this->blog_max_display = $table->table_max_display;

        $blog_filter = DB::table('table_columns')
            ->where('user_id','=', 1 )
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

        $this->blog_data = DB::table('blogs as b')
            ->select(
                'b.user_id',
                'b.id',
                'b.image',
                'b.title',
                'b.content',
                'link',
                'button',
                'b.date_created',
                'u.user_firstname',
                'u.user_middlename',
                'u.user_lastname',
                )
            ->where('b.user_id','=',1)
            ->join('users as u','u.user_id','b.user_id')
            ->orderBy('date_created','asc')
            ->get()
            ->toArray();
        $this->tag_data = DB::table('blog_tags as bt')
            ->select(
                DB::raw('count(bt.id) as count'),'bt.tag_id','tag_details'
            )
            ->where('bt.user_id','=',1)
            ->join('tags as t','t.id','bt.tag_id')
            ->groupBy('tag_id')
            ->get()
            ->toArray();
    }
    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->where('user_id','=',1)
        ->first());
    }
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        self::update_data();
    }
    public function render()
    {
        return view('livewire.page.blog.blog-details')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
