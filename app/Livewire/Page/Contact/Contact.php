<?php

namespace App\Livewire\Page\Contact;

use Livewire\Component;

class Contact extends Component
{
    public $title = 'Contact';
    public function render()
    {
        return view('livewire.page.contact.contact')
        ->layout('components.layouts.page',[
            'title'=>$this->title]);
    }
}
