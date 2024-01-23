<?php

namespace App\Livewire\Page\TechStack;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class TechStack extends Component
{
    public $title = 'TechStack';
    public $mode;

    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->where('user_id','=',$this->user_id)
        ->first());
    }
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.page.tech-stack.tech-stack')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
