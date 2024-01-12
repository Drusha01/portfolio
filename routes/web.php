<?php

use Illuminate\Support\Facades\Route;

// middleware
use App\Http\Middleware\Logout;
use App\Http\Middleware\Authenticated;
use App\Http\Middleware\Unauthenticated;
use App\Http\Middleware\AccountisValid;
use App\Http\Middleware\AccountisAdmin;
use App\Http\Middleware\AccountisStudent;
use App\Http\Middleware\Darkmode;

// authentication
use App\Livewire\Authentication\Signout;
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\RegisterEmail;
use App\Livewire\Authentication\ForgotPassword;
use App\Livewire\Authentication\AccountRecovery;
use App\Livewire\Authentication\ChangeEmail;

use App\Livewire\CreatePost;

// page
use App\Livewire\Page\About\About;
use App\Livewire\Page\Contact\Contact;
use App\Livewire\Page\Faq\Faq;
use App\Livewire\Page\Home\Home;
use App\Livewire\Page\Project\Project;
use App\Livewire\Page\Blog\Blog;
use App\Livewire\Page\TechStack\TechStack;

// user
use App\Livewire\User\Profile\Profile;

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

Route::get('/logout', Signout::class)->middleware(Logout::class)->name('logout');

Route::middleware([Unauthenticated::class])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register-email',RegisterEmail::class)->name('register-email');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/account/recovery/{hash}', AccountRecovery::class)->name('account-recovery');
});

Route::middleware([Authenticated::class,AccountisValid::class])->group(function () {
    Route::get('/change-email', ChangeEmail::class)->name('change.email');
});


Route::middleware([Darkmode::class])->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/', Home::class)->name('homepage');
        Route::get('/about', About::class)->name('about');
        Route::get('/contact', Contact::class)->name('contact');
        Route::get('/faq', Faq::class)->name('faq');
        Route::get('/home', Home::class)->name('home');
        Route::get('/projects',Project::class)->name('project');
        Route::get('/blog',Blog::class)->name('blog');
        Route::get('/techstack', TechStack::class)->name('techstack');

    });
});

Route::middleware([Authenticated::class,AccountisValid::class,AccountisAdmin::class])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/profile', Profile::class)->name('user.profile');
    });

});
Route::get('/createpost', CreatePost::class)->name('createpost');


