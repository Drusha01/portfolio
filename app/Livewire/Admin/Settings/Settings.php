<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public $user_id;
    public $page_links = [];


    public $user_active;
    public $user_max_display;
    public $user_filter = [];
    public $user_data = [];
    public $user = [
        'id' => NULL,
        'user_id'=> NULL,
        'question' => NULL,
        'answer' => NULL,
        'link' => NULL,
        'number_order' => NULL,
    ];

    public $user_params = [
        'table'=>'users',  
        'columns'=>null,
        'paginate_by'=>'user_id',
        'inbetween'=>3,
        'offset'=>10,
        'cursor'=>1 ,
        'page'=>1
    ];

    public function update_data(){
        $table = self::get_table_info('users');
        $this->user_active = $table->table_isactive;
        $this->user_max_display = $table->table_max_display;

        $user_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $columns = [];
        $this->user_filter = [];
        foreach ($user_filter as $key => $value) {
            array_push($columns,$value->column_name);
            array_push($this->user_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }
        $this->user_data = self::paginate( $this->user_params['table'],  $columns,$this->user_params['paginate_by'],$this->user_params['inbetween'],$this->user_params['offset'], $this->user_params['cursor'] , $this->user_params['page']  );
    }


    public function update_user_params($inbetween = 3,$offset=20,$current_cursor,$page){
        $this->user_params['inbetween'] = $inbetween;
        $this->user_params['offset'] = $this->user_params['offset'];
        $this->user_params['cursor'] = $current_cursor;
        $this->user_params['page'] = $page;
           
        self::update_data();
    }

    public function paginate($table, $columns,$paginate_by,$inbetween = 3,$offset=20,$current_cursor,$page){
        $total_count = DB::table($table)
            ->select(
                DB::raw('count(*) as total_count')
            )
            ->where($paginate_by,'>',0)
            ->first()->total_count;
        if($start = DB::table($table)
            ->where($paginate_by,'>=',0)
            ->orderBy($paginate_by,'asc')
            ->limit(1)
            ->first()){
                $start = $start->{$paginate_by};
            }
        if($end = DB::table($table)
        ->where($paginate_by,'<=',($total_count - ($total_count % $offset)+1))
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
            ->select( $columns)
            ->where($paginate_by,'>=',$current_links[0]['cursor'] )
            ->orderBy($paginate_by,'asc')
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
        $this->user_id =  $data['user_id']; 

        self::update_data();
    }

    public function render()
    {
        return view('livewire.admin.settings.settings')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
}
