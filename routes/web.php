<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProposalsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\HomeController;

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



// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/director', function () {
    return view('director');
})->name('director')->middleware('director');

Route::get('/staff', function () {
    return view('staff');
})->name('staff')->middleware('staff');

Route::get('/researcher', function () {
    return view('researcher');
})->name('researcher')->middleware('researcher');

Route::get('/reviewer', function () {
    return view('reviewer');
})->name('reviewer')->middleware('reviewer');

// About Us
Route::get('/abouts', [AboutusController::class, 'index'])->name('abouts');
Route::get('/createabouts', [AboutusController::class, 'create'])->name('transparency.aboutus.create');
Route::post('/storeabouts', [AboutusController::class, 'store'])->name('transparency.aboutus.store');
Route::get('/showabouts/{id}', [AboutusController::class, 'show'])->name('transparency.aboutus.show');
Route::get('/editabouts/{id}', [AboutusController::class, 'edit'])->name('transparency.aboutus.edit');
Route::put('/editabouts/{id}', [AboutusController::class, 'update'])->name('transparency.aboutus.update');
Route::delete('/deleteabouts/{id}', [AboutusController::class, 'destroy'])->name('transparency.aboutus.destroy');

// Projects
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/createprojects', [ProjectsController::class, 'create'])->name('proponents.projects.create');
Route::post('/storeprojects', [ProjectsController::class, 'store'])->name('proponents.projects.store');
Route::get('/showprojects/{id}', [ProjectsController::class, 'show'])->name('proponents.projects.show');
Route::get('/editprojects/{id}', [ProjectsController::class, 'edit'])->name('proponents.projects.edit');
Route::put('/editprojects/{id}', [ProjectsController::class, 'update'])->name('proponents.projects.update');
Route::delete('/deleteprojects/{id}', [ProjectsController::class, 'destroy'])->name('proponents.projects.destroy');


// Proposals
Route::get('/proposals', [ProposalsController::class, 'index'])->name('proposals');
Route::get('/createproposals', [ProposalsController::class, 'create'])->name('transparency.proposals.create');
Route::post('/storeproposals', [ProposalsController::class, 'store'])->name('transparency.proposals.store');
Route::get('/showproposals/{id}', [ProposalsController::class, 'show'])->name('transparency.proposals.show');
Route::get('/editproposals/{id}', [ProposalsController::class, 'edit'])->name('transparency.proposals.edit');
Route::put('/editproposals/{id}', [ProposalsController::class, 'update'])->name('transparency.proposals.update');
Route::delete('/deleteproposals/{id}', [ProposalsController::class, 'destroy'])->name('transparency.proposals.destroy');
// Reviews
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/createreviews', [ReviewsController::class, 'create'])->name('reviews.create');
Route::post('/storereviews', [ReviewsController::class, 'store'])->name('reviews.store');
Route::get('/showreviews/{id}', [ReviewsController::class, 'show'])->name('reviews.show');
Route::get('/editreviews/{id}', [ReviewsController::class, 'edit'])->name('reviews.edit');
Route::put('/editreviews/{id}', [ReviewsController::class, 'update'])->name('reviews.update');
Route::delete('/deletereviews/{id}', [ReviewsController::class, 'destroy'])->name('reviews.destroy');

// Announcements
Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements');
Route::get('/createannouncements', [AnnouncementsController::class, 'create'])->name('transparency.announcements.create');
Route::post('/storeannouncements', [AnnouncementsController::class, 'store'])->name('transparency.announcements.store');
Route::get('/showannouncements/{id}', [AnnouncementsController::class, 'show'])->name('transparency.announcements.show');
Route::get('/editannouncements/{id}', [AnnouncementsController::class, 'edit'])->name('transparency.announcements.edit');
Route::put('/editannouncements/{id}', [AnnouncementsController::class, 'update'])->name('transparency.announcements.update');
Route::delete('/deleteannouncements/{id}', [AnnouncementsController::class, 'destroy'])->name('transparency.announcements.destroy');


// Announcements
Route::get('/accessrequests', [AccessRequestController::class, 'index'])->name('accessrequests');
Route::get('/createaccessrequests', [AccessRequestController::class, 'create'])->name('transparency.accessrequests.create');
Route::post('/storeaccessrequests', [AccessRequestController::class, 'store'])->name('transparency.accessrequests.store');
Route::get('/showaccessrequests/{id}', [AccessRequestController::class, 'show'])->name('transparency.accessrequests.show');
Route::get('/editaccessrequests/{id}', [AccessRequestController::class, 'edit'])->name('transparency.accessrequests.edit');
Route::put('/editaccessrequests/{id}', [AccessRequestController::class, 'update'])->name('transparency.accessrequests.update');
Route::delete('/deleteaccessrequests/{id}', [AccessRequestController::class, 'destroy'])->name('transparency.accessrequests.destroy');

// Proponents
Route::get('/draft', [DraftController::class, 'index'])->name('draft');

Route::get('/underevaluation', function () {
    return view('proponents.underevaluation');
})->name('underevaluation');

Route::get('/forrevision', function () {
    return view('proponents.forrevision');
})->name('forrevision');

Route::get('/approved', function () {
    return view('proponents.approved');
})->name('approved');

Route::get('/deferred', function () {
    return view('proponents.deferred');
})->name('deferred');

Route::get('/disapproved', function () {
    return view('proponents.disapproved');
})->name('disapproved');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/directordashboard', function () {
    return view('layouts.directordashboard');
});

Route::get('/comments', function () {
    return view('comments');
});

Route::get('/indexx', function () {
    return view('transparency.proposals.indexx');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
