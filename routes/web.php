<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\PagesController::class, 'home']);
Route::get('blog/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');

/* Route::get('posts', function(){
      return App\Models\Post::all();  //muestra todos los posts------es una prueba
}); */




Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){  // Grupo de Rutas---- Todas las rutas de este grupo van a estar precedidas por admin -->prefix es decir admin\posts

    Route::get('posts', [App\Http\Controllers\Admin\PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('posts/create', [App\Http\Controllers\Admin\PostsController::class, 'create'])->name('admin.posts.create');
    Route::post('posts', [App\Http\Controllers\Admin\PostsController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}', [App\Http\Controllers\Admin\PostsController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [App\Http\Controllers\Admin\PostsController::class, 'update'])->name('admin.posts.update');

    Route::post('posts/{post}/photos', [App\Http\Controllers\Admin\PhotosController::class, 'store'])->name('admin.posts.photos.store');
});



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/* Route::get('home', [App\Http\Controllers\HomeController::class, 'index']);

es lo mismo que 

Route::get('home','HomeController@index'); ---->>>> Aqui esta buscando el HomeController en App/ 
Route::get('home','App\HomeController@index');
*/





