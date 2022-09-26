<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// all film
Route::get('/films',[FilmController::class,'getFilms']);
// only film with day of the week
Route::get('/films/{day}',[FilmController::class,'getFilmsByDayOfWeek']);
Route::get('/films/{id}',[FilmController::class,'getFilmByid']);
// aggiungi un film
Route::post('/films',[FilmController::class,'postFilm']);
Route::delete('/films/{id}',[FilmController::class,'deleteFilm']);
Route::put('/films/{id}',[FilmController::class,'putFilm']);