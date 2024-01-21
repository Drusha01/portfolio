<?php

namespace App\Livewire\Page\Contact;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Contact extends Component
{
    public $title = 'Contact';
    public $lng;
    public $lat;  
    public $zoom;

    public $mode;

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->lng = 122.0761312;
        $this->lat = 6.9038855;
        $this->zoom = 16;
    }
    public function render()
    {
        return view('livewire.page.contact.contact')
        ->layout('components.layouts.contact',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
