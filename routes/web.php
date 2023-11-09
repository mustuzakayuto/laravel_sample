<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about',[HomeController::class,"about"]);
Route::get('/search',[HomeController::class,"search"]);
Route::get('/item/{id}',[ItemController::class,"show"]);

// Route::get('/about', function () {
//     return view("about");
// });
// Route::get('/search', function (Request $request) {
//     // dd($request);
//     $keyword = $request->q;
//     // $message = "キーワードは{$keyword}です";
//     $data = [
//         "keyword" => $keyword
//     ];
//     return view("search",$data);
// });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
