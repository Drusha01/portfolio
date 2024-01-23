<?php

namespace App\Livewire\Components\Header\PageHeader;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PageHeader extends Component
{
    public $mode;
    public $user_id;
    public $request;
    public function boot(Request $request){
        $data = $request->session()->all();
        
    }

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        if(isset($data['user_id']) && intval($data['user_id']) !=0){
            $this->user_id = $data['user_id'] ;
        }
        if ($request->is('*/*')) {
            $this->request = (substr($request->path(),0,strpos($request->path(),'/')+1));
        }
    }
    public function render()
    {
        return view('livewire.components.header.page-header.page-header');
    }

    public function mode_toggle(Request $request){
        $request->session()->put('mode', !$this->mode);
        $this->dispatch('refresh-page');
    
    }
}
