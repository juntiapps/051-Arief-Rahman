<?php

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('home.dash');
});

Route::get('/books', function () {
    $data = [
        [
            'id' => 1,
            'title' => 'Naruto',
            'author' => 'Masashi Kishimoto',
            'stock' => 5,
            'category' => 'Fiksi'
        ],
        [
            'id' => 2,
            'title' => 'Naruto 2',
            'author' => 'Masashi Kishimoto',
            'stock' => 6,
            'category' => 'Fiksi'
        ]
    ];
    return view('home.books.list', ['books' => $data]);
});
Route::get('/books/add', function () {

    return view('home.books.add');
});

Route::get('/books/edit', function () {

    return view('home.books.edit');
});

Route::get('/books/delete', function () {

    return view('home.books.delete');
});

Route::get('/books/show', function () {
    $data =
        [
            'id' => 1,
            'title' => 'Naruto',
            'author' => 'Masashi Kishimoto',
            'stock' => 5,
            'category' => 'Fiksi'
        ];
    return view('home.books.show', ['book' => $data]);
});

Route::get('/categories', function () {
    return view('home.categories.list');
});

Route::get('/users', function () {
    return view('home.users.list');
});

Route::get('/transactions', function () {
    return view('home.transactions.list');
});
// Route::post('/log_in', function (){
//     return redirect()->route('home');
// });
