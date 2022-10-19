<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\articlesController;
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


Route::get('/login', [FirstController::class, 'login']);


Route::post('/loginT', [FirstController::class, 'loginT']);


Route::get('/index', [indexController::class, 'index']);

Route::get('/articles', [articlesController::class, 'articles']);

Route::get('/aarticles', [articlesController::class, 'aarticles']);
