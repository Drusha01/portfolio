<?php

namespace App\Livewire\Page\Project;

use Livewire\Component;

class Project extends Component
{
    public $title = 'Project';
    public function render()
    {
        return view('livewire.page.project.project')
        ->layout('components.layouts.page',[
            'title'=>$this->title]);
    }
}
