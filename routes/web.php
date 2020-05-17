<?php

// Route::get('/', function () {
//     return view('Welcome');
// });

//Login de la pagina
Auth::routes();

//Middleware
Route::group(['middleware' => 'admin'], function(){
    //Ruta para llamar todos los campos de usuarios
    Route::resource('users', 'UserController');
});

Route::get('/home', 'HomeController@index')->name('home');

//******************************************************************* */
//Ruta de Welcome
Route::resource('editor', 'EditorController');

Route::resource('/', 'WelcomeController');
Route::post('loadcat', 'WelcomeController@loadcat');
//loadcat es para cargar las categorias por un select

//***************************USERS********************************************* */

//Ruta vista Importar Usuarios
Route::get('import', 'UserController@importView');

//Ruta controlador para importar usuarios
Route::post('import-list-excel', 'UserController@importExcel')->name('users.import.excel');

// Genera reportes en PDF Reports
Route::get('generate/pdf/users', 'UserController@pdf');

// Genera reportes en EXCEL Reports
Route::get('generate/excel/users', 'UserController@excel');

//********************************CURSOS*************************************** */
//Ruta de Cursos
Route::resource('cursos', 'CursoController');
//********************************CLASES*************************************** */
//Ruta de Cursos
Route::resource('clases', 'ClaseController');

// *****************************EDITOR**********************************

Route::get('mycurso', 'CursoController@mycurso');
//Route::put('mydata/{id}', 'UserController@updmydata');
// Route::get('editor/index', 'ArticleController@index');
// Route::get('editor/create', 'ArticleController@editorcreate');
// Route::get('editor/{id}', 'ArticleController@showeditor');
// Route::get('editor/{id}/edit', 'ArticleController@updarticle');





