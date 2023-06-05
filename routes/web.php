<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\RecommendController;
use App\Http\Controllers\TwitterController;
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
Route::get('/add', function() {
    return view('add');
})->name('add');

Route::post('/add_insert', [AnimeController::class,'add_insert'])->name('add_insert');

Route::put('add_favorite/{id}', [DetailController::class, 'add_favorite'])->name('add_favorite');

Route::post('detach/{id}', [DetailController::class, 'detach'])->name('detach');

Route::get('/favorite',function() {
    return view('favorite');
})->middleware(['auth'])->name('favorite');

Route::get('customer', [CustomersController::class, 'form'])->name('customer');
Route::get('edit_index/{id}', [CustomersController::class, 'edit_index'])->name('edit_index');
Route::post('update/{id}', [CustomersController::class, 'update'])->name('update');
Route::post('delete/{id}', [CustomersController::class, 'delete'])->name('delete');

Route::get('/', function () {
    return view('top');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('dashboard', [SummaryController::class, 'form'])->name('dashboard');

Route::get('set', [ScheduleController::class, 'set'])->name('set');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');

Route::get('detail',[BookmarkController::class, 'store']);
Route::get('detail/{id}',[DetailController::class, 'show'])->name('detail');
Route::post('add_schedule', [DetailController::class, 'add_schedule'])->name('add_schedule');
Route::post('add_single/{id}', [DetailController::class, 'add_single'])->name('add_single');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/recommend', function () {
    return view('recommend');
})->name('recommend');

Route::post('/recommend_result', [RecommendController::class, 'postData'])->name('recommend_result');

Route::get('/schedule', function () {
    return view('schedule');
})->name('schedule');

Route::post('clear', [ScheduleController::class, 'clear'])->name('clear');

Route::get('schedule', [ScheduleController::class, 'form'])->name('schedule');

/*ここからtwitter認証*/
Route::get('auth/twitter', [TwitterController::class, 'loginwithTwitter']);
Route::get('auth/callback/twitter', [TwitterController::class, 'cbTwitter']);

require __DIR__.'/auth.php';
