<?php

namespace App\Livewire\Authentication;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Login extends Component
{
    public $title;
    public $active;
    
    public $username;
    public $password;

    public function mount(){
        $this->title = 'Login';
        $this->active = 'Login';
    }

    public function render()
    {
        return view('livewire.authentication.login',[
            ])
        ->layout('components.layouts.guest',[
            'title'=>$this->title]);
    }

    public function login(Request $request){
        $data = $request->session()->all();
        if(!isset($data['user_id'])){ 
           $user_details =DB::table('users as u')
                ->where(['u.user_email'=> $this->username,'u.user_email_verified'=> 1])
                ->orWhere(
                    function($query) {
                        return $query
                        ->where(['u.user_name'=> $this->username,'u.user_name_verified'=> 1]);
                       })
                ->first();
                // dd($user_details);
            if( $user_details && password_verify($this->password,$user_details->user_password)){
                $request->session()->regenerate();

                $request->session()->put('user_id', $user_details->user_id);
                
                //append it to session
            
                if( $user_details->user_role_id == 1){
                    $this->dispatch('swal:redirect',
                        position         									: 'center',
                        icon              									: 'success',
                        title             									: 'Welcome back admin!',
                        showConfirmButton 									: 'true',
                        timer             									: '1500',
                        link              									: 'admin/dashboard'
                    );
                }else{

                    if( $user_details->user_id == 1){
                        $this->dispatch('swal:redirect',
                            position         									: 'center',
                            icon              									: 'success',
                            title             									: 'Welcome back Drusha!',
                            showConfirmButton 									: 'true',
                            timer             									: '1500',
                            link              									: 'admin/dashboard'
                        );
                    }else{
                        $this->dispatch('swal:redirect',
                            position         									: 'center',
                            icon              									: 'success',
                            title             									: 'Welcome back admin!',
                            showConfirmButton 									: 'true',
                            timer             									: '1500',
                            link              									: 'admin/dashboard'
                        );
                    }
                }
            }else{
                $this->dispatch('swal:redirect',
                    position          									: 'center',
                    icon              									: 'warning',
                    title            									: 'Invalid credentials!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
            }
            

        }
        
    }
}
