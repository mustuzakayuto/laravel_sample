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
// Route::get('/about',[HomeController::class,"about"]);
// Route::get('/search',[HomeController::class,"search"]);
// Route::get('/item/{id}',[ItemController::class,"show"]);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/item/', [ItemController::class, 'index'])->name('item.index');
// Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/dp/{id}', [ItemController::class, 'show']);
Route::get('/', function () {
    // resources/views/welcome.blade.php ビューが表示
    return view('welcome');
});
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
Route::get("/item/edit/{id}",[ItemController::class,"edit"])->name('item.edit');
Route::get("/item/update/{id}",[ItemController::class,"update"])->name('item.update');
Route::get("/item/destroy/{id}",[ItemController::class,"destroy"])->name('item.destroy');
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
