<?php

namespace App\Livewire\Admin\Homepage;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Homepage extends Component
{
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public $user_id;

    public function update_data(){
        // dd(DB::table('tables')
        //     ->where('user_id','=',$this->user_id)
        //     ->get()
        //     ->toArray());
    }
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id =  $data['user_id']; 

        self::update_data();
    }
    public function render()
    {
        return view('livewire.admin.homepage.homepage')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
}
