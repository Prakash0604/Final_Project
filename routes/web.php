<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('islogin')->group(function(){

    Route::get('/register',[UserController::class, 'loadregister']);
    Route::post('/register',[UserController::class, 'storeregister']);
    Route::get('/verifynow/{token}',[UserController::class, 'verify']);
    Route::get('/login',[UserController::class, 'loadlogin']);
    Route::post('/login',[UserController::class, 'storelogin']);
});

Route::middleware('islogout')->group(function(){
    Route::get('/dashboard',[StudentController::class, 'dashboard']);
    Route::get('/logout',[StudentController::class, 'logout']);
    Route::get('/student/add',[StudentController::class,'stuadd']);
    Route::get('/classroom/add',[StudentController::class, 'loadclassroom']);
    Route::post('/classroom/add',[StudentController::class, 'storeclassroom']);
    Route::get('/classroom/view',[StudentController::class, 'loadclasslist']);
    Route::get('/classroom/{id}/edit',[StudentController::class, 'loadclassedit']);
    Route::post('/classroom/{id}/edit',[StudentController::class, 'storeclassedit']);
    Route::get('/classroom/{id}/delete',[StudentController::class, 'classdel']);
});

