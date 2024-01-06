<?php

namespace App\Livewire\Page\Project;

use Livewire\Component;
use Illuminate\Http\Request;

class Project extends Component
{
    public $title = 'Project';
    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.page.project.project')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
