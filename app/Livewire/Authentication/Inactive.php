<?php

namespace App\Livewire\Authentication;

use Livewire\Component;
use Illuminate\Http\Request;

class Inactive extends Component
{
    public $title;
    public function mount(){
        $this->title = 'Inactive';
    } 
    public function render()
    {
        return view('livewire.authentication.inactive')
        ->layout('components.layouts.guest',[
            'title'=>$this->title]);
    }
}
