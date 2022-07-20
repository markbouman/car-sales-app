<?php

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
    return view('Home');
});

Route::get('/car-info/{id}', function($id) {
    $cars = DB::select("SELECT * FROM cars WHERE Id = :id LIMIT 1", ['id' => $id]);
    if (count($cars) == 0) abort(404);
    return view('car-info', ['car' => $cars[0]]);
});

Route::get('/edit-car/{id}', function($id) {
    $cars = DB::select("SELECT * FROM cars WHERE Id = :id LIMIT 1", ['id' => $id]);
    if (count($cars) == 0) abort(404);
    return view('edit-car', ['car' => $cars[0]]);
})->middleware(['auth'])->name('editCar');;

Route::get('/edit-car', function() {
    return view('edit-car', ['car' => false]);
})->middleware(['auth'])->name('createCar');

Route::get('/delete-car/{id}', function($id) {
    $cars = DB::select("SELECT * FROM cars WHERE Id = :id LIMIT 1", ['id' => $id]);
    if (count($cars) == 0) abort(404);
    return view('delete-car', ['car' => $cars[0]]);
})->middleware(['auth'])->name('deleteCar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/register', function () {
    return view('register');
});

require __DIR__.'/auth.php';
