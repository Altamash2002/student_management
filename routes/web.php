<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', [StudentController::class, 'getStudents'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::view('/add-student','add-student');

    Route::post('/add',[StudentController::class, 'add']);
    Route::post('/edit/{roll_no}',[StudentController::class, 'editStudent']);

    Route::get('/student/delete/{roll_no}',[StudentController::class, 'delete']);
    Route::get('/student/edit/{roll_no}',[StudentController::class, 'edit']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
