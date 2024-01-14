<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use Illuminate\Http\Request;

class Profile extends Component
{
    public $title = 'About';

    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.admin.profile.profile')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
}
