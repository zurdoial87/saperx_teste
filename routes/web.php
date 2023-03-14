<?php

use App\Http\Controllers\AgendaController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/' , [AgendaController::class, 'index'] )->name("agenda.index"); 
Route::get('/all_agendas' , [AgendaController::class, 'getAll'] )->name("agenda.getall");
Route::post('/save_agenda' , [AgendaController::class, 'store'] )->name("save.agenda");
Route::get('/get_agenda/{agenda}' , [AgendaController::class, 'show'] )->name("show.agenda");
Route::put('/update_agenda' , [AgendaController::class, 'update'] )->name("update.agenda"); 
Route::delete('/delete_agenda/{id}' , [AgendaController::class, 'destroy'] )->name("delete.agenda");


/*Route::get('/contatos' , [AgendaController::class, 'index'] )->name("contatos.index");
Route::post('/save_contato' , [AgendaController::class, 'store'] )->name("save.contato");
Route::get('/get_contato/{contato}' , [AgendaController::class, 'show'] )->name("show.contato");
Route::put('/update_contato' , [AgendaController::class, 'update'] )->name("update.contato");
Route::delete('/delete_contato/{id}' , [AgendaController::class, 'destroy'] )->name("delete.contato");*/


