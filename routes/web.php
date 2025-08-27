<?php

use App\Http\Controllers\GoogleSheetController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\SheetController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
Route::get('/spreadsheet', [SpreadsheetController::class, 'index']);
Route::get('/read', [SheetController::class, 'readData']);
Route::get('/write', [SheetController::class, 'writeData']);
Route::get('/arsip', [SheetController::class, 'index']);
Route::post('/arsip', [SheetController::class, 'store']);
Route::get('/sheet', [GoogleSheetController::class, 'index'])->name('sheet.index');
Route::get('/sheet/add', [GoogleSheetController::class, 'add'])->name('sheet.add');
Route::post('/sheet/store', [GoogleSheetController::class, 'store'])->name('sheet.store');