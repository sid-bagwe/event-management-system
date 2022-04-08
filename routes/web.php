<?php
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/events',[EventController::class, 'index']);
Route::post('/events',[EventController::class, 'store']);
Route::get('/events/create',[EventController::class, 'create']);
Route::get('/events/{id}',[EventController::class, 'show']);
Route::put('/events/{id}',[EventController::class, 'updateEvent']);
Route::get('/events/update/{id}',[EventController::class, 'update']);
Route::get('/invitations/{id}',[EventController::class, 'invitations']);
Route::get('/events/created/{id}',[EventController::class, 'creations']);
Route::delete('/events/{id}',[EventController::class, 'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
