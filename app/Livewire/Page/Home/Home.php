<?php

namespace App\Livewire\Page\Home;

use Livewire\Component;

class Home extends Component
{
    public $title = 'Home';
    public function render()
    {
        return view('livewire.page.home.home')
        ->layout('components.layouts.page',[
            'title'=>$this->title]);
    }
}
