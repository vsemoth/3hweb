<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('blog.single');
// });

$host = request()->getHttpHost();

if($host ==  'ski.co.za' || $host == 'www.ski.co.za' || '127.0.0.1') {
    $post = App\Models\Post::where('post_slug', '=', '{post_slug}')->first();
	Route::get('/', 'App\Http\Controllers\BlogController@getIndex')->middleware('web');
}

Route::get('{post_slug}', [
	'as' => 'blog.single',
	'uses' => 'App\Http\Controllers\BlogController@getSingle'
])->where(
	'slug', '[\w\d\-\_]+'
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);
});

require __DIR__.'/auth.php';
