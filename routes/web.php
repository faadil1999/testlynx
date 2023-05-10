<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\EventController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/events',[EventController::class,'index'] )->name("evenements.index");
    Route::get('/event/{id}',[EventController::class,'show'] )->name("evenement.show");
    Route::post('/event',[EventController::class,'store'] )->name("evenement.store");
    Route::get('event/edit/{id}',[EventController::class,'edit'])->name("evenement.edit");
    Route::put('event/edit/{id}',[EventController::class,'update'])->name("evenement.update");
    Route::get('/events/scope',[EventController::class, 'search'])->name("evenement.scope");
    Route::delete('event/{id}',[EventController::class,'delete'])->name("evenement.delete");
});
