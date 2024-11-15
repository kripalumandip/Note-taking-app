<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;



Route::get('/',[NoteController::class,'index'])->name('index');
Route::get('/create.form',[NoteController::class,'createForm'])->name('create.form');
Route::post('/create.note',[NoteController::class,'createNote'])->name('create.note');
Route::get('notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit'); // Shows edit form
Route::put('notes/{id}', [NoteController::class, 'update'])->name('notes.update'); // Updates the note
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');


