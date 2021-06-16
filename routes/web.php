<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ShowController;
use App\Models\Tour;
// use App\Http\Controllers\CarController;/*App là NAMESPA #tên thư mục*/
// use App\Models\Car;
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
Route::resource('tour', TourController::class);
Route::resource('show', ShowController::class);