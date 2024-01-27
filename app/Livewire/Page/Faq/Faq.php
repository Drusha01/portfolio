<?php

namespace App\Livewire\Page\Faq;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Faq extends Component
{
    public $title = 'Faq';
    public $mode;
    public $user_id;

    public $faq_active;
    public $faq_max_display;
    public $faq_filter = [];
    public $faq_data = [];
    public $faq = [
        'id' => NULL,
        'user_id'=> NULL,
        'question' => NULL,
        'answer' => NULL,
        'link' => NULL,
        'number_order' => NULL,
    ];

    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        if ($request->is('faq/*')) {
            $value = substr($request->path(),strlen('faq/'));
           if( $value){
                $this->user_id = intval($value);

                if(DB::table('users as u')
                    ->where('user_id','=',$this->user_id)
                    ->first()){

                }else{
                    $this->user_id = 1;
                    return redirect('/faq');
                }
            }
        }else{
            $this->user_id = DB::table('users as u')
                ->where('user_name','=','Drusha01')
                ->first()->user_id;
        }
    }
    public function update_data(){
        $table = self::get_table_info('faq');
        $this->faq_active = $table->table_isactive;
        $this->faq_max_display = $table->table_max_display;

        $faq_filter = DB::table('table_columns')
            ->where('user_id','=', $this->user_id )
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        $this->faq_filter = [];
        foreach ($faq_filter as $key => $value) {
            array_push($this->faq_filter,[
                'id' => intval($value->id),
                'active'=> boolval($value->active),
                'name' => $value->name,
                'column_name' => $value->column_name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }

        $this->faq_data = DB::table('faq')
            ->where('user_id','=',$this->user_id)
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
        return view('livewire.page.faq.faq')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
