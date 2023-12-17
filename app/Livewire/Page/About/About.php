<?php

namespace App\Livewire\Page\About;

use Livewire\Component;

class About extends Component
{
    public $title = 'About';
    public function render()
    {
        return view('livewire.page.about.about')
            ->layout('components.layouts.page',[
                'title'=>$this->title]);
    }
}
