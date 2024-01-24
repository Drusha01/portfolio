<?php

namespace App\Livewire\Components\Header\AdminHeader;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminHeader extends Component
{
    public $mode;

    public $fullname;

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->fullname = DB::table('users as u')
            ->select(DB::raw('CONCAT(user_firstname," ",user_middlename," ",user_lastname) as fullname'))
            ->where('user_id','=',$data['user_id'])
            ->first()->fullname;
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.components.header.admin-header.admin-header');
    }
    public function mode_toggle(Request $request){
        $request->session()->put('mode', !$this->mode);
        $this->dispatch('refresh-page');
    
    }
}
