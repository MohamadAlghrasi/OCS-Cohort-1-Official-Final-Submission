<?php

use App\Http\Controllers\WeeklyGameController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('tables', function () {
    return view('admin.tables');
});

Route::get('/', function () {
    return view('site.index');
})->name('index');

Route::get('test', function () {
    return view('site.test');
})->name('test');

Route::get('private', function () {
    return view('site.private');
})->name('private');

Route::get('contact', function () {
    return view('site.contact');
})->name('contact');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/admin/logout', function () {
    return redirect('/admin/login?logout=success');
})->name('admin.logout');


Route::get('/games', [WeeklyGameController::class, 'index'])->name('games.index');

Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Reservation Routes
Route::get('/reservation/{game}', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation/{game}', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation-confirmation/{id}', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');

// Admin Dashboard Route
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('games', App\Http\Controllers\Admin\GameController::class);
    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('coaches', App\Http\Controllers\Admin\CoachController::class);
    Route::resource('private-requests', App\Http\Controllers\Admin\PrivateGameRequestController::class)->except(['create', 'store', 'edit']);
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->except(['create', 'store', 'edit']);
});
Route::get('/private', function () {
    return view('site.private');
})->name('private');

Route::post('/private', [App\Http\Controllers\PrivateGameController::class, 'store'])->name('private.store');
// User Contact Routes
Route::get('contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');