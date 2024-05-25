<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
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

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', "loginPage")->name('loginPage');
    Route::post('/login', "login")->name('login');
    Route::get('/logout', "logout")->name('logout');
});

Route::middleware(Authenticate::class)->group(function () {
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/', [DashboardController::class,'index'])->name('admin.dash');
        Route::resource('users',UserController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('books',BookController::class);
    });
    
    Route::get('', function () {
        return view('admin.dash');
    });
});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('auth.login');
// });
// Route::get('/home', function () {
//     return view('home.dash');
// });

// Route::get('/books', function () {
//     $data = [
//         [
//             'id' => 1,
//             'title' => 'Naruto',
//             'author' => 'Masashi Kishimoto',
//             'stock' => 5,
//             'category' => 'Fiksi'
//         ],
//         [
//             'id' => 2,
//             'title' => 'Naruto 2',
//             'author' => 'Masashi Kishimoto',
//             'stock' => 6,
//             'category' => 'Fiksi'
//         ]
//     ];
//     return view('home.books.list', ['books' => $data]);
// });
// Route::get('/books/add', function () {

//     return view('home.books.add');
// });

// Route::get('/books/edit', function () {

//     return view('home.books.edit');
// });

// Route::get('/books/delete', function () {

//     return view('home.books.delete');
// });

// Route::get('/books/show', function () {
//     $data =
//         [
//             'id' => 1,
//             'title' => 'Naruto',
//             'author' => 'Masashi Kishimoto',
//             'stock' => 5,
//             'category' => 'Fiksi'
//         ];
//     return view('home.books.show', ['book' => $data]);
// });

// Route::get('/categories', function () {
//     return view('home.categories.list');
// });

// Route::get('/users', function () {
//     return view('home.users.list');
// });

// Route::get('/transactions', function () {
//     return view('home.transactions.list');
// });
// Route::post('/log_in', function (){
//     return redirect()->route('home');
// });
