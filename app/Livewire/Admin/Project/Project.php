<?php

namespace App\Livewire\Admin\Project;

use Livewire\Component;
use Illuminate\Http\Request;

class Project extends Component
{
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.admin.project.project')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
}
