<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\VoteQuestionController;
use App\Http\Controllers\VoteAnswerController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions', QuestionsController::class)->except('show');
//Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');
Route::get('/questions/{slug}' , [QuestionsController::class,'show'])->name('questions.show');

Route::resource('questions.answers', AnswersController::class)->except(['create', 'show', 'index']);
Route::post('/answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');

Route::post('/questions/{question}/favorites', [App\Http\Controllers\FavoritesController::class, 'store'])->name('questions.favorite');
Route::delete('/questions/{question}/favorites', [App\Http\Controllers\FavoritesController::class, 'destroy'])->name('questions.unfavorite');

Route::post('/questions/{question}/vote', VoteQuestionController::class);
Route::post('/answers/{answer}/vote', VoteAnswerController::class);

//Route::get('questions', [App\Http\Controllers\QuestionsController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
