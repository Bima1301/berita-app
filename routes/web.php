<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardPostController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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

Route::get('/',[PostController::class, 'index']);
Route::get('/posts',[PostController::class, 'search']);
Route::get('/posts/{post:slug}',[PostController::class, 'show']);
Route::post('/posts/{post:slug}',[PostController::class, 'postComment']);

// Route::get('/categories/{category:slug}', function(Category $category){
//     if ($category->slug == 'sport') {
//         return view('sport',[
//             'title' => $category->name,
//             'posts' => $category->posts->load('author','category'),
//             'category' => $category->name,
//             'active' => 'sport'
//         ]);
        
//     }else{
//         return view('social',[
//             'title' => $category->name,
//             'posts' => $category->posts->load('author','category'),
//             'category' => $category->name,
//             'active' => 'social'
//         ]);
//     }
// });

Route::get('/authors/{author:username}',function(User $author){
    $data = [
        'active'=>'home',
        'title' => $author->name,
        'posts' => $author->posts->load('category','author')
    ];
    return view('author',$data);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('admin');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('admin');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('admin');
Route::resource('/dashboard/users', UserController::class)->middleware('admin');
// Route::post('/comments', CommentController::class);

// Route::get('/social-categories/{category:slug}', function(Category $category){
    
// });
