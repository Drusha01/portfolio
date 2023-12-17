<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\CreatePost;

use App\Livewire\Page\About\About;
use App\Livewire\Page\Contact\Contact;
use App\Livewire\Page\Faq\Faq;
use App\Livewire\Page\Home\Home;
use App\Livewire\Page\Project\Project;
use App\Livewire\Page\TechStack\TechStack;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

Route::prefix('/')->group(function () {
    Route::get('/', Home::class)->name('homepage');

    Route::get('/about', About::class)->name('about');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/faq', Faq::class)->name('faq');
    Route::get('/home', Home::class)->name('home');
    Route::get('/project',Project::class)->name('project');
    Route::get('/techstack', TechStack::class)->name('techstack');
  

});


Route::get('/createpost', CreatePost::class)->name('createpost');


