<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Providers\AppServiceProvider;
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


Route::post('/sampleData',[APIController::class,'sendData'])->name('sendData');


Route::get('/', function () {
    return view('welcome');
})->name('index');




Route::get('/dashboard', [APIController::class,'getData'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/announcement', function () {
    return view('announcement');
})->middleware(['auth', 'verified'])->name('announcement');


Route::get('/access_control', function () {
    $data = User::join('masterusers', "users.masteruser_id", "masterusers.id")->select("*", 'users.id as my_id')->orderBy('masterusers.id', 'ASC')->get();
    return view('accessControl',compact('data'));
})->middleware(['auth', 'verified'])->name('accessControl');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
