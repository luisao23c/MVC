<?php
use Lib\Route;
use App\Controllers\ControllerUser;
use App\Controllers\ControllerSocios;
// Route::get("/start",[ControllerSocios::class,"start"]);
// Route::get('/angel',[ControllerUser::class,"login"]);
// Route::post('/angel',[ControllerUser::class,"login"]);
// Route::put('/angel',[ControllerUser::class,"login"]);
// Route::delete('/angel',[ControllerUser::class,"login"]);
// Routes sin ser autenticadas
Route::post('/luis',[ControllerUser::class,"register"]);
Route::dispatch();
// Routes Autenticadas
// Route::auth();
// Route::post('/luis',[ControllerUser::class,"register"]);
// Route::dispatch();

?>