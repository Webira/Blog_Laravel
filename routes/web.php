<?php

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Http\Livewire\Utilisateurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/***Route::get('/', function () {
    return view('welcome');
});*/

/**Route::get('/posts', function () {
    return Post::with('category')->paginate(3);
});

Route::get('/categorys', function () {
    return Category::with('posts')->paginate(3);
});
// l'auteur de post
Route::get('/userPosts', function () {
    return User::with('posts')->paginate(3);
});*/
        


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/contactform', [HomeController::class, 'contact'])->name('contactform');
Route::get('/accesopensim', [HomeController::class, 'accesOpenSim'])->name('accesopensim');

        
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categorys.posts', CategoryPostController::class);
    Route::resource('categorys', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.dashboardAdmin');
    Route::delete('/dashboard', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/contactform', [ContactController::class, 'create'])->name('contactform.create');
    Route::post('/contactform', [ContactController::class, 'store'])->name('contactform.store');
    Route::get('/contactboard', [ContactController::class, 'index'])->name('contactboard.index');
    Route::resource('contacts', ContactController::class);
});

        // routes for admin
Route::group([
    'middleware' => ['auth', 'auth.admin'],'as' => 'admin.'
], function(){
    Route::group([ "prefix" => 'adopensim', "as" => 'adopensim.'
], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.dashboardAdmin');

    Route::get('/usersim', [UserController::class, 'usersimList'])->name('usersim.usersimList');
    /*Route::get('/volunteers', [UserController::class, 'volunteersList'])->name('volunteers');
    Route::get('/usersRoles', [RoleController::class, 'allRoles'])->name('usersRoles');
    Route::get('/adduserform', [UserController::class, 'addUser'])->name('adduserform');*/
 
    });
});
        // routes for manager
Route::group([
    'middleware' => ['auth', 'auth.manager'], 'as' => 'manager.'
], function(){
    Route::group([ "prefix" => 'opensim', "as" => 'opensim.'
], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.dashboardAdmin');

    Route::get('/usersim', [UserController::class, 'usersimList'])->name('usersim.usersimList');
   });
});




