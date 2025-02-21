<?php

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GraduateTracerController;
use App\Http\Controllers\AlumniDirectoryController;
use App\Http\Controllers\AlumniEmployabilityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/survey', [SurveyController::class, 'showSurveyForm'])->name('survey.show');
Route::post('/survey', [SurveyController::class, 'submitAlumniSurveyForm'])->name('survey.submit');

Route::get('/survey/complete', [SurveyController::class, 'completeSurvey'])->name('survey.complete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/alumni-directory', [AlumniDirectoryController::class, 'index'])->name('alumni.directory');
Route::get('/alumni', [AlumniEmployabilityController::class, 'showDirectoryTracerData'])->name('alumni.showDirectoryTracerData');
Route::get('/alumni/search', [AlumniDirectoryController::class, 'search'])->name('alumni.directory.search');
Route::get('/alumni/export', [AlumniDirectoryController::class, 'exportAlumniAsExcel'])->name('alumni.export');

Route::get('/employability-tracer-data', [AlumniEmployabilityController::class, 'showEmployabilityTracerData'])->name('alumni.employability');
Route::get('/employability-tracer-data/search', [AlumniEmployabilityController::class, 'search'])->name('alumni.employability.search');
Route::get('/employability', [AlumniEmployabilityController::class, 'showEmployabilityTracerData'])->name('alumni.showEmployabilityTracerData');
Route::get('/employability/export', [AlumniEmployabilityController::class, 'exportEmployabilityAsExcel'])->name('employability.export');


Route::get('/graduate-tracer-data', [GraduateTracerController::class, 'index'])->name('graduate.tracer.data');
Route::get('/graduate-tracer/export', [GraduateTracerController::class, 'exportGraduateTracerData'])->name('graduate.tracer.export');


// View Alumni Route (Displays the edit form)
Route::get('/alumni/{id}/view', [AlumniController::class, 'show'])->name('alumni.view');

// Edit Alumni Route (Displays the edit form)
Route::get('/alumni/{id}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');

// Update Alumni Route (Handles form submission)
Route::put('/alumni/{id}', [AlumniController::class, 'update'])->name('alumni.update');

// Delete Alumni Route (Deletes the record)
Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])->name('alumni.delete');
Route::post('/alumni/delete-document', [AlumniController::class, 'deleteDocument'])->name('alumni.deleteDocument');





require __DIR__.'/auth.php';
