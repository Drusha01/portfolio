<?php

namespace App\Livewire\Page\TechStack;

use Livewire\Component;

class TechStack extends Component
{
    public $title = 'TechStack';
    public function render()
    {
        return view('livewire.page.tech-stack.tech-stack')
        ->layout('components.layouts.page',[
            'title'=>$this->title]);
    }
}
