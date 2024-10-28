<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
// middleware
use App\Http\Middleware\Logout;
use App\Http\Middleware\Authenticated;
use App\Http\Middleware\Unauthenticated;
use App\Http\Middleware\AccountisValid;
use App\Http\Middleware\AccountisAdmin;
use App\Http\Middleware\AccountisUser;
use App\Http\Middleware\Darkmode;

// authentication
use App\Livewire\Authentication\Signout;
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\RegisterEmail;
use App\Livewire\Authentication\ForgotPassword;
use App\Livewire\Authentication\AccountRecovery;
use App\Livewire\Authentication\ChangeEmail;
use App\Livewire\Authentication\Inactive;
use App\Livewire\Authentication\Deleted;

use App\Livewire\CreatePost;

// page
use App\Livewire\Page\About\About;
use App\Livewire\Page\Contact\Contact;
use App\Livewire\Page\Faq\Faq;
use App\Livewire\Page\Home\Home;
use App\Livewire\Page\Project\Project;
use App\Livewire\Page\Blog\Blog;
use App\Livewire\Page\TechStack\TechStack;
use App\Livewire\Page\Blog\BlogDetails;
use App\Livewire\Page\Blog\Tags;

// user
use App\Livewire\User\Profile\Profile as UserProfile;

// admin
use App\Livewire\Admin\About\About as AdminAbout;
use App\Livewire\Admin\Blog\Blog as AdminBlog;
use App\Livewire\Admin\Contact\Contact as AdminContact;
use App\Livewire\Admin\Dashboard\Dashboard as AdminDashboard;
use App\Livewire\Admin\Faq\Faq as AdminFaq;
use App\Livewire\Admin\Homepage\Homepage as AdminHomepage;
use App\Livewire\Admin\Project\Project as AdminProject;
use App\Livewire\Admin\Techstack\Techstack as AdminTechstack;
use App\Livewire\Admin\Settings\Settings as AdminSettings;

use App\Livewire\Admin\Profile\Profile as AdminProfile;

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


Route::get('/logout', Signout::class)->middleware(Logout::class)->name('logout');

Route::middleware([Unauthenticated::class])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register-email',RegisterEmail::class)->name('register-email');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/account/recovery/{hash}', AccountRecovery::class)->name('account-recovery');
});
Route::middleware([Authenticated::class])->group(function () {
    Route::get('/deleted', Deleted::class)->name('deleted');
    Route::get('/inactive', Inactive::class)->name('inactive');
});

Route::middleware([Authenticated::class,AccountisValid::class])->group(function () {
    Route::get('/change-email', ChangeEmail::class)->name('change.email');
});


Route::middleware([Darkmode::class])->group(function () {
    Route::get('/', Home::class)->name('homepage.drusha');
    Route::prefix('/')->group(function () {
        Route::get('homepage/', Home::class)->name('homepage.drusha.default');
        Route::get('about', About::class)->name('about.drusha');
        Route::get('contact', Contact::class)->name('contact.drusha');
        Route::get('faq', Faq::class)->name('faq.drusha');
        Route::get('home', Home::class)->name('home.drusha');
        Route::get('projects',Project::class)->name('project.drusha');
        Route::get('blogs',Blog::class)->name('blog.drusha');
        Route::get('techstack', TechStack::class)->name('techstack.drusha');

        Route::get('homepage/{id}', Home::class)->name('homepage');
        Route::get('about/{id}', About::class)->name('about');
        Route::get('contact/{id}', Contact::class)->name('contact');
        Route::get('faq/{id}', Faq::class)->name('faq');
        Route::get('home/{id}', Home::class)->name('home');
        Route::get('projects/{id}',Project::class)->name('project');
        Route::get('blogs/{id}',Blog::class)->name('blog');
        Route::get('techstack/{id}', TechStack::class)->name('techstack');

        Route::get('blogdetails/{id}', BlogDetails::class)->name('blog.details');
        Route::get('blog/tag/{id}', Tags::class)->name('blog.tags');
        
    });
});

Route::middleware([Darkmode::class,Authenticated::class,AccountisValid::class,AccountisAdmin::class])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/profile', UserProfile::class)->name('user.user-profile');
    });

});

Route::middleware([Darkmode::class,Authenticated::class,AccountisValid::class,AccountisUser::class])->group(function () {
    Route::prefix('admin/')->group(function () {
        Route::get('dashboard', AdminDashboard::class)->name('admin.dashboard');
        Route::get('homepage', AdminHomepage::class)->name('admin.homepage');
        Route::get('about', AdminAbout::class)->name('admin.about');
        Route::get('faq', AdminFaq::class)->name('admin.faq');
        Route::get('techstack', AdminTechstack::class)->name('admin.techstack');
        Route::get('projects', AdminProject::class)->name('admin.projects');
        Route::get('blogs', AdminBlog::class)->name('admin.blogs');
        Route::get('contact', AdminContact::class)->name('admin.contact');
        Route::get('profile', AdminProfile::class)->name('admin.admin-profile');
        Route::get('settings', AdminSettings::class)->name('admin.settings');
    });
});

Route::get('/createpost', CreatePost::class)->name('createpost');


Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    dd($user);
});


Route::get('/auth/facebook/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});
 
Route::get('/auth/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    dd($user);
});
