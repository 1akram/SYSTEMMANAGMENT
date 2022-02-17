<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\MotherBoardController;
 

Route::get('/', function(){
    return view('dd');
}) ;
Route::get('/component',  [ComponentController::class,'get'])->name('showComponents');
Route::get('/component/{id}',  [ComponentController::class,'show'])->name('showComponent');
Route::post('/component/save',  [ComponentController::class,'save'])->name('saveComponent');
Route::get('/component/delete/{id}',  [ComponentController::class,'delete'])->name('deleteComponent');
Route::get('/component/edit/{id}',  [ComponentController::class,'edit'])->name('editComponent');
Route::post('/component/update',  [ComponentController::class,'update'])->name('updateComponent');



Route::get('/motherBoard', [MotherBoardController::class,'get'])->name('showMotherBoards');
Route::get('/motherBoard/{id}', [MotherBoardController::class,'show'])->name('showMotherBoard');
Route::post('/motherBoard/save',  [MotherBoardController::class,'save'])->name('saveMotherBoard');
Route::get('/motherBoard/delete/{id}',  [MotherBoardController::class,'delete'])->name('deletemotherBoard');

Route::get('/motherBoard/edit/{id}',  [MotherBoardController::class,'edit'])->name('editmotherBoard');
Route::post('/motherBoard/update',  [MotherBoardController::class,'update'])->name('updatemotherBoard');