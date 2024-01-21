<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public $user_id;

    public function update_data(){
        
    }

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id =  $data['user_id']; 

        self::update_data();
    }

    public function render()
    {
        return view('livewire.admin.settings.settings')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
}
