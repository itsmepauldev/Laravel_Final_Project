<?php
use App\Http\Controllers\EducationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\JobOpeningController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/applicant-management', function () {
    return view('applicant-management');
})->middleware('auth');






Route::middleware('auth')->group(function () {
    Route::get('/applicant-management', [ApplicantController::class, 'index']);
    Route::get('/applicant-management/create', [ApplicantController::class, 'create']);
    Route::post('/applicant-management', [ApplicantController::class, 'store']);
    Route::get('/applicant-management/{id}/edit', [ApplicantController::class, 'edit']);
    Route::put('/applicant-management/{id}', [ApplicantController::class, 'update']);
    Route::delete('/applicant-management/{id}', [ApplicantController::class, 'destroy']);
});



Route::post('/education/store', [EducationController::class, 'store'])->name('education.store');
Route::get('/education/{id}/edit', [EducationController::class, 'edit'])->name('education.edit');
Route::put('/education/{id}', [EducationController::class, 'update'])->name('education.update');
Route::delete('/education/{id}', [EducationController::class, 'destroy'])->name('education.destroy');
Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');
Route::post('/education/store', [EducationController::class, 'store'])->name('education.store');



Route::get('/employment/create', [EmploymentController::class, 'create'])->name('employment.create');
Route::post('/employment/store', [EmploymentController::class, 'store'])->name('employment.store');
Route::get('/employment/{id}/edit', [EmploymentController::class, 'edit'])->name('employment.edit');
Route::put('/employment/{id}', [EmploymentController::class, 'update'])->name('employment.update');
Route::delete('/employment/{id}', [EmploymentController::class, 'destroy'])->name('employment.destroy');



Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/{id}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
Route::put('/payment/{id}', [PaymentController::class, 'update'])->name('payment.update');
Route::delete('/payment/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');



Route::get('/reference/create', [ReferenceController::class, 'create'])->name('reference.create');
Route::post('/reference/store', [ReferenceController::class, 'store'])->name('reference.store');
Route::get('/reference/{id}/edit', [ReferenceController::class, 'edit'])->name('reference.edit');
Route::put('/reference/{id}', [ReferenceController::class, 'update'])->name('reference.update');
Route::delete('/reference/{id}', [ReferenceController::class, 'destroy'])->name('reference.destroy');

Route::get('/user-management', [UserController::class, 'index'])->name('user.index');
Route::get('/user-management/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user-management', [UserController::class, 'store'])->name('user.store');
Route::get('/user-management/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user-management/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user-management/{id}', [UserController::class, 'destroy'])->name('user.destroy');



Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity.index');





Route::get('/job-opening', [JobOpeningController::class, 'index'])->name('job.index');
Route::get('/job-opening/create', [JobOpeningController::class, 'create'])->name('job.create');
Route::post('/job-opening', [JobOpeningController::class, 'store'])->name('job.store');
Route::get('/job-opening/{id}/edit', [JobOpeningController::class, 'edit'])->name('job.edit');
Route::put('/job-opening/{id}', [JobOpeningController::class, 'update'])->name('job.update');
Route::delete('/job-opening/{id}', [JobOpeningController::class, 'destroy'])->name('job.destroy');
