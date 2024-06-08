<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', [HomeController::class, 'homepage']);





Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/post', [HomeController::class, 'post'])->middleware('auth', 'admin')->name('post');

Route::get('appointments/create/{doc_id}', [AppointmentController::class, 'create'])->middleware('auth')->name('appointments.create');
Route::post('appointments/store', [AppointmentController::class, 'store'])->middleware('auth')->name('appointments.store');

Route::get('/table', function () {
    return view('admin.table.tablelist');
})->middleware('auth', 'admin')->name('table');

Route::get('/forms', function () {
    return view('admin.forms.formlist');
})->middleware('auth', 'admin')->name('forms');
Route::get('/add_doctor', function () {
    return view('admin.forms.add_doctor');
})->middleware('auth', 'admin')->name('add.doctor');

Route::get('/addservice', function () {
    return view('admin.blog.services');
})->middleware('auth', 'admin')->name('add.services');
Route::get('/feedback', function () {
    return view('user.feedback');
})->middleware('auth')->name('add.feedback');



    Route::post('/save/services', [ServiceController::class, 'saveData'])
    ->middleware('auth', 'admin')
    ->name('save.service');

Route::get('/view/services', [ServiceController::class, 'viewData'])
    ->middleware('auth', 'admin')
    ->name('view.service');

Route::get('/edit/{id}/services', [ServiceController::class, 'editData'])
    ->middleware('auth', 'admin')
    ->name('edit.service');

Route::post('/update/{id}/services', [ServiceController::class, 'updateData'])
    ->middleware('auth', 'admin')
    ->name('update.service');

Route::get('/delete/{id}/services', [ServiceController::class, 'deleteData'])
    ->middleware('auth', 'admin')
    ->name('delete.service');

Route::post('/save/feedback', [FeedbackController::class, 'saveData'])
    ->middleware('auth')
    ->name('save.feedback');
Route::get('/view/feedback', [FeedbackController::class, 'viewData'])
    ->middleware('auth', 'admin')
    ->name('view.feedback');
Route::post('/update/{id}/feedback', [FeedbackController::class, 'update'])
    ->middleware('auth')
    ->name('.feedback');
Route::get('/edit/{id}/feedback', [FeedbackController::class, 'edit'])
    ->middleware('auth', 'admin')
    ->name('edit.feedback');
Route::delete('/delete/{id}/feedback', [FeedbackController::class, 'destroy'])
    ->middleware('auth', 'admin')
    ->name('delete.feedback');


Route::middleware(['auth', 'admin'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::post('/save', [DoctorController::class, 'saveData'])->name('save');

    Route::get('/view', [DoctorController::class, 'viewData'])->name('view');
    Route::get('/{doc_id}/delete', [DoctorController::class, 'deleteData'])->name('delete');
    Route::get('/{doc_id}/edit', [DoctorController::class, 'editData'])->name('edit');
    Route::post('/{doc_id}/update', [DoctorController::class, 'updateData'])->name('update');
    Route::get('/appoinment', [AppointmentController::class, 'viewData'])->name('appoinment.view');
    Route::get('/appointments/filter', [AppointmentController::class, 'viewData'])->name('appointments.filter');
    Route::get('/appointments/filter/pdf', [AppointmentController::class, 'generatePDF'])->name('appointments.filter.pdf');


});

Route::middleware(['auth', 'admin'])->prefix('user')->name('user.')->group(function () {
    Route::get('/view', [HomeController::class, 'viewData'])->name('view');
    Route::get('/{user_id}/delete', [HomeController::class, 'deleteData'])->name('delete');
    Route::get('/{user_id}/edit', [HomeController::class, 'editData'])->name('edit');
    Route::post('/{user_id}/update', [HomeController::class, 'updateData'])->name('update');
    Route::get('/admin/view', [HomeController::class, 'viewadminData'])->name('admin');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});


Route::get('/checkout', 'PaymentController@checkout')->name('checkout');
Route::post('/payment', 'PaymentController@payment')->name('payment');
Route::get('/payment/success', 'PaymentController@success')->name('payment.success');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';

