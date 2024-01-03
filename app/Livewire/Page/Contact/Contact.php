<?php

namespace App\Livewire\Page\Contact;

use Livewire\Component;

class Contact extends Component
{
    public $title = 'Contact';
    public $lng;
    public $lat;  
    public $zoom;
    
    public function mount(){
        $this->lng = 122.0761312;
        $this->lat = 6.9038855;
        $this->zoom = 16;
    }
    public function render()
    {
        return view('livewire.page.contact.contact')
        ->layout('components.layouts.contact',[
            'title'=>$this->title]);
    }
}
