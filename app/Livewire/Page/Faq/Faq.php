<?php

namespace App\Livewire\Page\Faq;

use Livewire\Component;

class Faq extends Component
{
    public $title = 'Faq';
    public function render()
    {
        return view('livewire.page.faq.faq')
        ->layout('components.layouts.page',[
            'title'=>$this->title]);
    }
}
