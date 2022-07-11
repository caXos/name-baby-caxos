<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BabyNameController;
use App\Http\Controllers\LikeController;
use App\Models\BabyName;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $sugestoes = BabyName::all();
    $user = Auth::user()->id;
    // $likes = Like::where('id_user',$user)->get('id_babyname')->value('id_babyname');
    // $likes = Like::where('id_user',$user)->get('id_babyname')->toArray(); //essa é a linha que mais funciona
    // $likes = Like::where('id_user',$user)->get('id_babyname')->toJSON();
    $likes = LikeController::getLikes($user);

    // $string = implode(" ",$likes);
    // error_log($string);

    return Inertia::render('Dashboard', ['sugestoes' => $sugestoes, 'likes_user' => $likes, 'loggedUser'=>$user]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/sugerir', function () {
        return Inertia::render('CriarSugestao');
    })->middleware(['auth', 'verified'])->name('sugerir');

    Route::post('sugerir', [BabyNameController::class, 'store'])->name('criarsugestao');

    // Route::get('/liked/{id_babyname}', [LikeController::class, 'getLiked'])->name('getLiked');
    Route::post('/like/{id_babyname}', [LikeController::class, 'like'])->name('like');
    Route::post('/dislike/{id_babyname}', [LikeController::class, 'dislike'])->name('dislike');
  });

require __DIR__.'/auth.php';
