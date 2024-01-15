<?php

namespace App\Livewire\Admin\About;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class About extends Component
{
    public $title = 'About';

    public $mode;
    public $background = "282828";
    public $color = 'fff';

    public $achievements_active;
    public $achievements_max_display;
    public $achievements_filter = [];

    public $experience_active;
    public $experience_max_display;
    public $experience_filter = [];

    public $education_active;
    public $education_max_display;
    public $education_filter = [];


    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];

        $table = self::get_table_info('experience');
        $this->experience_active = $table->table_isactive;
        $this->experience_max_display = $table->table_max_display;

        $table = self::get_table_info('education');
        $this->education_active = $table->table_isactive;
        $this->education_max_display = $table->table_max_display;

        $experience_filter = DB::table('table_columns')
            ->where('user_id','=',$data['user_id'])
            ->where('table_id','=',$table->id)
            ->orderBy('column_order','asc')
            ->get()
            ->toArray();

        foreach ($experience_filter as $key => $value) {
            array_push($this->experience_filter,[
                'active'=> $value->active,
                'name' => $value->name,
                'class' => $value->class,
                'style'=> $value->style
            ]);
        }


    }
    public function render(){
        return view('livewire.admin.about.about')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
    public function update_active_table($table_name,$isactive){
        if(DB::table('tables')
            ->where('table_name','=',$table_name)
            ->update(['table_isactive' => $isactive])){
            return self::get_table_info($table_name)->table_isactive;
        }
    }
    public function update_max_display($table_name,$max_display){
        if(DB::table('tables')
            ->where('table_name','=',$table_name)
            ->update(['table_max_display' => $max_display])){
            return self::get_table_info($table_name)->table_max_display;
        }
    }
    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->first());
    }
    public function max_display($table_name){
        if($table_name == 'about-page'){

        }else if($table_name == 'about-content'){

        }else if($table_name == 'achievements'){
           
        }
        else if($table_name == 'experience'){
            if($this->experience_max_display >= 0 && $this->experience_max_display <= 100){
                $this->experience_max_display = self::update_max_display($table_name, $this->experience_max_display );
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'success',
                    title             									: 'Successfully updated!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
            }else{
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'warning',
                    title             									: 'Invalid Input!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
                $table = self::get_table_info($table_name);
                $this->experience_max_display = $table->table_max_display;
            }
        }
        else if($table_name == 'education'){
            if($this->education_max_display >= 0 && $this->education_max_display <= 100){
                $this->education_max_display = self::update_max_display($table_name, $this->education_max_display );
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'success',
                    title             									: 'Successfully updated!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
            }else{
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'warning',
                    title             									: 'Invalid Input!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
                $table = self::get_table_info($table_name);
                $this->education_max_display = $table->table_max_display;
            }
        }
    }
    public function toggle_active($table_name){
        if($table_name == 'about-page'){

        }else if($table_name == 'about-content'){

        }else if($table_name == 'achievements'){
           
        }
        else if($table_name == 'experience'){
            $this->experience_active = self::update_active_table($table_name, !$this->experience_active);
           
        }
        else if($table_name == 'education'){
            $this->education_active = self::update_active_table($table_name, !$this->education_active);
        }
        $this->dispatch('swal:redirect',
            position         									: 'center',
            icon              									: 'success',
            title             									: 'Successfully updated!',
            showConfirmButton 									: 'true',
            timer             									: '1000',
            link              									: '#'
        );
    }

    // experiece CRUD 
    
}
