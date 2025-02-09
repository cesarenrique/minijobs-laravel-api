<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ReclutadorController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\SinRolController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CargoEmpresaController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\EmpresaCargoController;
use App\Http\Controllers\EmpresaAnuncioController;
use App\Http\Controllers\CargoEmpresaAnuncioController;
use App\Http\Controllers\EmpresaReclutadorController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\AnyoPlanAcademicoController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\AsignaturaController;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/
Route::get('/alumno/complete',[AlumnoController::class,'indexComplete']);
Route::get('/profesor/complete',[ProfesorController::class,'indexComplete']);
Route::get('/encargado/complete',[EncargadoController::class,'indexComplete']);
Route::get('/reclutador/complete',[ReclutadorController::class,'indexComplete']);
Route::get('/administrador/complete',[AdministradorController::class,'indexComplete']);
Route::get('/sinrol/complete',[SinRolController::class,'indexComplete']);

Route::get('/empresa/{id}/cargo', [EmpresaCargoController::class,'indexCargos']);
Route::get('/empresa/{id}/anuncio', [EmpresaAnuncioController::class,'indexAnuncios']);
Route::get('/empresa/{empresa}/cargo/{id}/anuncio', [CargoEmpresaAnuncioController::class,'indexAnuncios']);
Route::get('/anuncio/{id}/complete', [AnuncioController::class,'showComplete']);

Route::post('/user/login', [UserController::class,'login']);
Route::post('/user/logout', [UserController::class,'logout']);
Route::get('/user/{id}/updateUltimoRol/{rol}', [UserController::class,'updateUltimoRol']);

Route::get('/encargado/{idEncargado}/user', [EncargadoController::class,'showUserComplete']);
Route::get('/encargado/user/{idUser}', [EncargadoController::class,'showUser']);
Route::get('/encargado/{idEncargado}/empresa', [EmpresaController::class,'showEncargadoEmpresas']);

Route::get('/reclutador/{idReclutador}/user', [ReclutadorController::class,'showUserComplete']);
Route::get('/reclutador/user/{idUser}', [ReclutadorController::class,'showUser']);
Route::get('/reclutador/{id}/anuncios', [ReclutadorController::class,'anuncios']);

Route::get('/alumno/{idAlumno}/user', [AlumnoController::class,'showUserComplete']);
Route::get('/alumno/user/{idUser}', [AlumnoController::class,'showUser']);

Route::get('/empresareclutador/existe/{idEmpresa}/{idReclutador}', [EmpresaReclutadorController::class,'showExiste']);
Route::get('/cargoempresa/existe/{idEmpresa}/{idCargo}', [CargoEmpresaController::class,'showExiste']);

Route::get('/candidato/{idUsuario}/anuncios', [CandidatoController::class,'showAnuncios']);
Route::get('/candidato/{idAnuncio}/usuarios', [CandidatoController::class,'showAlumnos']);
Route::get('/candidato/existe/{idAnuncio}/{idAlumno}', [CandidatoController::class,'showExiste']);

Route::get('/carrera/{id}/complete', [CarreraController::class,'showCarreraComplete']);
Route::post('/carrera/complete', [CarreraController::class,'storeComplete']);

Route::resource('/user', UserController::class);
Route::resource('/encargado', EncargadoController::class);
Route::resource('/administrador', AdministradorController::class);
Route::resource('/reclutador', ReclutadorController::class);
Route::resource('/profesor', ProfesorController::class);
Route::resource('/alumno', AlumnoController::class);
Route::resource('/sinrol', SinRolController::class);
Route::resource('/empresa', EmpresaController::class);
Route::resource('/cargo', CargoController::class);
Route::resource('/cargoempresa', CargoEmpresaController::class);
Route::resource('/anuncio', AnuncioController::class);
Route::resource('/empresareclutador', EmpresaReclutadorController::class);
Route::resource('/candidato', CandidatoController::class);
Route::resource('/anyoplanacademico', AnyoPlanAcademicoController::class);
Route::resource('/centro', CentroController::class);
Route::resource('/carrera', CarreraController::class);
Route::resource('/asignatura',AsignaturaController::class);

Route::get('/user/username/{username}', [UserController::class,'showForUsername']);

