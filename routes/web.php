<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
/* class Service
{
    //
} */
  // ->header('Content-Type', 'text/plain');
// Route::get('/greeting', function () {
//     return response('Hello Lorena,How are you?',200)
//     ->header('Content-Type', 'text/plain');   
// });

// Route::get('info', function() { phpinfo(); });

// // Route::get('/posts', function () {
// //     return view('posts');
// // });

// Route::get('/users', function(){
//     $users = User::all();
//     return view('profiles', compact('users'));
// });

// Route::get('/users/{user}', function (User $user) {
//     return view('profile', compact('user'));
// });

// Route::get('/show', [UserController::class, 'show'])->name('show');
// Route::get('/index', [UserController::class, 'index'])->name('index');
// Route::get('/function', [UserController::class, 'getData'])->name('function');

// Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
// Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');

// Route::get('profile', [ProfileController::class,'index'])->name('profile');
// Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

// // Route::get('/post/create',[PostController::class,'create']);
// // Route::post('/post', [PostController::class, 'store']);
// Route::get('/collections', [CollectionController::class, 'index']);

 
 

Route::resource('/cars',CarsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/','/login');

