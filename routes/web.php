<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\MeetingController::class, 'index'])->name('home');
Route::get('/meeting', [App\Http\Controllers\MeetingController::class, 'index'])->name('meeting');
Route::get('/rsvp', [App\Http\Controllers\MeetingAttendeeController::class, 'rsvp'])->name('rsvp');
Route::get('/meet_url/{id}/show', [App\Http\Controllers\MeetAttendeeGuestController::class, 'create'])->name('guest_attendee');
Route::post('/meet_url/show', [App\Http\Controllers\MeetAttendeeGuestController::class, 'show']);
Route::get('/meeting/{id}/show', [App\Http\Controllers\MeetingController::class, 'show']);
Route::get('/meeting/create', [App\Http\Controllers\MeetingController::class, 'create']);
Route::post('/meeting/store', [App\Http\Controllers\MeetingController::class, 'store']);
Route::delete('/meeting/{id}', [App\Http\Controllers\MeetingController::class, 'destroy']);
Route::put('/meeting/{id}', [App\Http\Controllers\MeetingController::class, 'update']);
Route::post('/attendee/store', [App\Http\Controllers\MeetingAttendeeController::class, 'store']);
Route::get('/meeting/{id}/attendee', [App\Http\Controllers\MeetingController::class, 'attendee']);
Route::put('/attendee/{id}', [App\Http\Controllers\MeetingAttendeeController::class, 'update']);
Route::post('/guest_attendee/store', [App\Http\Controllers\MeetAttendeeGuestController::class, 'store']);
Route::put('meet_url/guest_attendee/store', [App\Http\Controllers\MeetAttendeeGuestController::class, 'update']);
Route::get('/poll', [App\Http\Controllers\MeetingPollController::class, 'index'])->name('poll');

Route::get('/poll/create', [App\Http\Controllers\MeetingPollController::class, 'create']);
Route::get('/poll/{id}', [App\Http\Controllers\MeetingPollController::class, 'show']);
Route::post('/poll/store', [App\Http\Controllers\MeetingPollController::class, 'store']);
Route::get('/poll_question/{id}/{name}/create', [App\Http\Controllers\PollQuestionController::class, 'create']);
Route::post('/poll_question/store', [App\Http\Controllers\PollQuestionController::class, 'store']);

Route::post('/poll_count/store', [App\Http\Controllers\MeetingPollCountController::class, 'store']);