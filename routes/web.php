<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Auth;
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
    return redirect(route('index'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('accessLevel:0')->name('index');

Route::resource('curso', CursoController::class)->middleware(['auth', 'accessLevel:1']);
Route::resource('disciplina', DisciplinaController::class)->middleware(['auth', 'accessLevel:1']);
Route::resource('professor', ProfessorController::class)->middleware(['auth', 'accessLevel:2']);
Route::resource('aluno', AlunoController::class)->middleware(['auth', 'accessLevel:2']);

Route::get('aluno/{aluno}/edit-matricula', [AlunoController::class, 'editMatriculas'])->middleware(['auth', 'accessLevel:2'])->name('aluno.editMatriculas');
Route::put('aluno/{aluno}/edit-matricula', [AlunoController::class, 'updateMatriculas'])->middleware(['auth', 'accessLevel:2']);

Route::get('acesso-negado', function () {
    return view('acesso-negado');
})->middleware(['auth', 'accessLevel:0'])->name('acesso-negado');
