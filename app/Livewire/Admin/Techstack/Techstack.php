<?php

namespace App\Livewire\Admin\Techstack;

use Livewire\Component;
use Illuminate\Http\Request;

class Techstack extends Component
{
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public $user_id;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id =  $data['user_id']; 

        // self::update_data();
    }

    public function render()
    {
        return view('livewire.admin.techstack.techstack')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
}
