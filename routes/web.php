<?php

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

// Route::get('/', function () { return view('welcome'); });

Route::resource('taches', 'TacheController');

// Route::get('/taches', 'TacheController@index')->name('index');

Route::resource('jeux', 'JeuController');

// Route::get('/jeux','JeuxController@index')->name('jeux.index');

Route::get('/jeux2/{nb}', 'JeuController@index2')->name('jeux.index2');

Route::post('/jeux/upload', 'JeuController@upload')->name('jeux.upload');

Route::post('/jeux/upload2/{id}', 'JeuController@upload2')->name('jeux.upload2');

Route::resource('commentaires', 'CommentaireController');

Route::any('/', 'AccueilController@accueil')->name('accueil.index');

Route::get('/tags','TagController@index')->name('tags.index');

Route::get('/apropos','AccueilAProposController@apropos')->name('accueil.apropos');

Route::get('/contact','AccueilContactController@contact')->name('accueil.contact');

Route::get('/master', function () { return view('layout.master'); });

Route::get('/commentaires/create/', 'CommentaireController@create')->name('commentaires.create')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
