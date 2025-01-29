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



Route::resource('/user', UserController::class);
Route::resource('/encargado', EncargadoController::class);
Route::resource('/administrador', AdministradorController::class);
Route::resource('/reclutador', ReclutadorController::class);
Route::resource('/profesor', ProfesorController::class);
Route::resource('/alumno', AlumnoController::class);
Route::resource('/sinrol', SinRolController::class);

Route::get('/user/username/{username}', [UserController::class,'showForUsername']);

