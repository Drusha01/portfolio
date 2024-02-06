<?php

namespace App\Livewire\Page\Blog;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;
    public $title = 'Blog';
    public $mode;

    public $blog_active;
    public $blog_max_display;
    public $blog_filter = [];
    // public $blog_data = [];
    public $blog = [
        'id' => NULL,
        'user_id'=> NULL,
        'image' => NULL,
        'title' => NULL,
        'content' => NULL,
        'link' => NULL,
        'button' => NULL,
    ];
    public $about_params = [
        'table'=>'blogs as b',  
        'columns'=>null,
        'paginate_by'=>'id',
        'inbetween'=>3,
        'offset'=>5,
        'cursor'=>1 ,
        'page'=>1,
        'order_by'=>'asc'
    ];


    public $tag_details;
    public $tag_data = [];
    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        if ($request->is('blogs/*')) {
            $value = substr($request->path(),strlen('blogs/'));
           if( $value){
                $this->user_id = intval($value);

                if(DB::table('users as u')
                    ->where('user_id','=',$this->user_id)
                    ->first()){

                }else{
                    $this->user_id = 1;
                    return redirect('/blogs');
                }
            }
        }else{
            $this->user_id = DB::table('users as u')
                ->where('user_name','=','Drusha01')
                ->first()->user_id;
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
        $this->blogs_columns = [];
        foreach ($blog_filter as $key => $value) {
            array_push($this->blogs_columns,$value->column_name);
            array_push($this->blog_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        // $this->blog_data = self::paginate( $this->about_params['table'],  $this->blogs_columns,$this->about_params['paginate_by'],$this->about_params['inbetween'],$this->about_params['offset'], $this->about_params['cursor'] , $this->about_params['page']  );
        // $this->blog_data = DB::table('blogs as b')
        //     ->select(
        //         'b.user_id',
        //         'b.id',
        //         'b.image',
        //         'b.title',
        //         'b.content',
        //         'link',
        //         'button',
        //         'b.date_created',
        //         'u.user_firstname',
        //         'u.user_middlename',
        //         'u.user_lastname',
        //         )
        //     ->where('b.user_id','=',$this->user_id)
        //     ->join('users as u','u.user_id','b.user_id')
        //     ->orderBy('date_created','asc')
        //     ->get()
        //     ->toArray();
        $this->tag_data = DB::table('blog_tags as bt')
            ->select(
                DB::raw('count(bt.id) as count'),'bt.tag_id','tag_details'
            )
            ->where('bt.user_id','=',$this->user_id)
            ->join('tags as t','t.id','bt.tag_id')
            ->groupBy('tag_id')
            ->get()
            ->toArray();
    }

    public function update_blog_params($inbetween = 3,$offset=20,$current_cursor,$page){
        $this->about_params['inbetween'] = $inbetween;
        $this->about_params['offset'] = $this->about_params['offset'];
        $this->about_params['cursor'] = $current_cursor;
        $this->about_params['page'] = $page;
           
        self::update_data();
    }

    public function paginate($table, $columns,$paginate_by,$inbetween = 3,$offset=20,$current_cursor,$page){
        $total_count = DB::table($table)
            ->select(
                DB::raw('count(*) as total_count')
            )
            ->where($paginate_by,'>',0)
            ->where('user_id','=',$this->user_id)
            ->first()->total_count;
        if($start = DB::table($table)
            ->where($paginate_by,'>=',0)
            ->where('user_id','=',$this->user_id)
            ->orderBy($paginate_by,'asc')
            ->limit(1)
            ->first()){
                $start = $start->{$paginate_by};
            }
        if($end = DB::table($table)
        ->where($paginate_by,'<=',($total_count - ($total_count % $offset)+1))
        ->where('user_id','=',$this->user_id)
        ->orderBy($paginate_by,'desc')
        ->limit(1)
        ->first()){
            $end = $end->{$paginate_by};
        }
        $prev_inbetween = $inbetween;
        $next_inbetween = $inbetween;
        $next_links = [];
        $prev_links = [];
        $current_links = [];
        $next_cursor = $prev_cursor = $current_cursor;
        $prev_page = $next_page = $page;
        $prev_offset = $next_offset = 0;
        if(!$current_cursor){
            $prev_page = $next_page = $page = 0;
            $current_cursor = 0;
            $next_cursor = $prev_cursor = $current_cursor; 
        }elseif($current_cursor && $current_cursor ==  $end ){
            $prev_page = $next_page = $page = ceil($total_count/$offset);
            $current_cursor = $total_count;
            $next_cursor = $prev_cursor = $end;
        }

        array_push( $current_links, [
            'cursor' =>  $next_cursor,
            'active' => true,
            'page'=>  $next_page
        ]);
        for ($i=0; $i < $inbetween; $i++) { 
            if($cursor = DB::table($table)
            ->select($paginate_by)
            ->where($paginate_by,'>=', $next_cursor)
            ->where('user_id','=',$this->user_id)
            ->orderBy($paginate_by,'asc')
            ->limit(1)
            ->offset($offset)
            ->first()){
                $next_page++;
                $next_cursor = $cursor->{$paginate_by};
                $next_inbetween--;
                array_push( $next_links, [
                    'cursor' =>  $next_cursor,
                    'active' => false,
                    'page'=>  $next_page
                ]);
            }
        }
        for ($i=0; $i < $inbetween; $i++) { 
            if($cursor = DB::table($table)
            ->select($paginate_by)
            ->where($paginate_by,'<=',$prev_cursor)
            ->where('user_id','=',$this->user_id)
            ->orderBy($paginate_by,'desc')
            ->limit(1)
            ->offset($offset)
            ->first()){
                $prev_page--;
                $prev_cursor = $cursor->{$paginate_by};
                $prev_inbetween--;
                array_push( $prev_links, [
                    'cursor' =>  $prev_cursor,
                    'active' => false,
                    'page'=>  $prev_page
                ]);
            }
        }
        if( $next_inbetween > 0){
            for ($i=0; $i < $next_inbetween; $i++) { 
                if($cursor = DB::table($table)
                ->select($paginate_by)
                ->where($paginate_by,'<=',$prev_cursor)
                ->where('user_id','=',$this->user_id)
                ->orderBy($paginate_by,'desc')
                ->limit(1)
                ->offset($offset)
                ->first()){
                    $prev_page--;
                    $prev_cursor = $cursor->{$paginate_by};
                    array_push( $prev_links, [
                        'cursor' =>  $prev_cursor,
                        'active' => false,
                        'page'=>  $prev_page
                    ]);
                }
            }
        }
      
        if($prev_inbetween >0){
            for ($i=0; $i < $prev_inbetween; $i++) { 
                if($cursor = DB::table($table)
                ->select($paginate_by)
                ->where($paginate_by,'>=',$next_cursor)
                ->where('user_id','=',$this->user_id)
                ->orderBy($paginate_by,'asc')
                ->limit(1)
                ->offset($offset)
                ->first()){
                    $next_page++;
                    $next_cursor = $cursor->{$paginate_by};
                    array_push( $next_links, [
                        'cursor' =>  $next_cursor,
                        'active' => false,
                        'page'=>  $next_page
                    ]);
                    
                }
            }
        }
        
        $links = [];
        array_push( $links, [
            'cursor' =>  $start,
            'active' => $current_links[0]['page'] == 1,
            'page'=>  1,
            'page_content'=> 'start'
        ]);
        $prev_links =array_reverse($prev_links);
        foreach ($prev_links as $key => $value) {
            array_push( $links, [
                'cursor' =>   $value['cursor'],
                'active' => $value['active'],
                'page'=>  intval($value['page']),
                'page_content'=>  intval($value['page']),
            ]);
        }
        foreach ($current_links as $key => $value) {
            array_push( $links, [
                'cursor' =>   $value['cursor'],
                'active' => $value['active'],
                'page'=>  intval($value['page']),
                'page_content'=>  intval($value['page']),
            ]);
        }
        foreach ($next_links as $key => $value) {
            array_push( $links, [
                'cursor' =>   $value['cursor'],
                'active' => $value['active'],
                'page'=> intval($value['page']),
                'page_content'=>  intval($value['page']),
            ]);
        }
        array_push( $links, [
            'cursor' =>  $end,
            'active' => $current_links[0]['page'] == intval(ceil($total_count/$offset)),
            'page'=>  intval(ceil($total_count/$offset)),
            'page_content'=> 'end'
        ]);

        $page_content = DB::table($table)
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
            ->join('users as u','u.user_id','b.user_id')
            ->where('b.'.$paginate_by,'>=',$current_links[0]['cursor'] )
            ->where('b.user_id','=',$this->user_id)
            ->orderBy('b.'.$paginate_by,'asc')
            ->limit($offset)
            ->get()
            ->toArray();

        $page = [
            'content' => $page_content,
            'page_links' => $links,
            'pagination_params' =>[
                'total_pages' => intval(ceil($total_count/$offset)),
                'page_between' =>$inbetween,
                'offset' =>$offset,
                'current_page' => $page,
                'ordery_by' => $page,
            ]
        ];
        return $page;
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
        self::update_data();
        
        return view('livewire.page.blog.blog',[
            'blog_data'=> DB::table('blogs as b')
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
                ->where('b.user_id','=',$this->user_id)
                ->join('users as u','u.user_id','b.user_id')
                ->orderBy('id','desc')
                ->cursorPaginate(5)
        ])
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
