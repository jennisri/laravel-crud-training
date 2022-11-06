<?php
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

// route student
// Route::get('student', [StudentController::class, 'index']);
// Route::post('student', [StudentController::class, 'store']);
// cara pertama memanggil id saja
// Route::get('student/{id}', [StudentController::class, 'show']);

// cara kedua langsung echo student
// model student yang didalam kurung kurawal
// Route::get('student/{student}', [StudentController::class, 'show']);
// Route::delete('student/{id}', [StudentController::class, 'destroy']);
// Route::put('student/{student}', [StudentController::class, 'update']);


// resource hanya untuk method index, show, store, update, destroy
Route::resource('student', StudentController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
])->middleware('auth'); // harus login



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
