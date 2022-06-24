<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BabyNameController;
use App\Models\BabyName;

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
    // error_log($sugestoes);
    return Inertia::render('Dashboard', ['sugestoes' => $sugestoes]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/sugerir', function () {
        return Inertia::render('CriarSugestao');
    })->middleware(['auth', 'verified'])->name('sugerir');

    Route::post('sugerir', [BabyNameController::class, 'store'])->name('criarsugestao');
  });

require __DIR__.'/auth.php';
