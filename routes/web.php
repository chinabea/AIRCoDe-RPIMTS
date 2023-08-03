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
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProponentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProjectHistoryController;

use Illuminate\Support\Facades\Mail;
use App\Mail\Send;

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


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'director'])->group(function (){
    Route::get('director', function () {
        return view('dashboard');
    })->name('director');

});

Route::middleware(['auth', 'staff'])->group(function (){
    Route::get('/staff', function () {
        return view('dashboard');
    })->name('staff');


});

Route::middleware(['auth', 'researcher'])->group(function (){
    Route::get('/researcher', function () {
        return view('dashboard');
    })->name('researcher');

});

Route::middleware(['auth', 'reviewer'])->group(function (){
    Route::get('/reviewer', function () {
        return view('dashboard');
    })->name('reviewer');

});

// About Us
Route::get('/abouts', [AboutusController::class, 'index'])->name('abouts');
Route::get('/about/create', [AboutusController::class, 'create'])->name('transparency.aboutus.create');
Route::post('/about/store', [AboutusController::class, 'store'])->name('transparency.aboutus.store');
Route::get('/about/show/{id}', [AboutusController::class, 'show'])->name('transparency.aboutus.show');
Route::get('/about/edit/{id}', [AboutusController::class, 'edit'])->name('transparency.aboutus.edit');
Route::put('/about/edit/{id}', [AboutusController::class, 'update'])->name('transparency.aboutus.update');
Route::delete('/about/delete/{id}', [AboutusController::class, 'destroy'])->name('transparency.aboutus.destroy');


// Proposals
Route::get('/proposals', [ProposalsController::class, 'index'])->name('proposals');
Route::get('/proposal/create', [ProposalsController::class, 'create'])->name('transparency.proposals.create');
Route::post('/proposal/store', [ProposalsController::class, 'store'])->name('transparency.proposals.store');
Route::get('/proposal/show/{id}', [ProposalsController::class, 'show'])->name('transparency.proposals.show');
Route::get('/proposal/edit/{id}', [ProposalsController::class, 'edit'])->name('transparency.proposals.edit');
Route::put('/proposal/edit/{id}', [ProposalsController::class, 'update'])->name('transparency.proposals.update');
Route::delete('/proposal/delete/{id}', [ProposalsController::class, 'destroy'])->name('transparency.proposals.destroy');

// Reviews
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/review/create', [ReviewsController::class, 'create'])->name('reviews.create');
Route::post('/review/store', [ReviewsController::class, 'store'])->name('reviews.store');
Route::get('/review/show/{id}', [ReviewsController::class, 'show'])->name('reviews.show');
Route::get('/review/edit/{id}', [ReviewsController::class, 'edit'])->name('reviews.edit');
Route::put('/review/edit/{id}', [ReviewsController::class, 'update'])->name('reviews.update');
Route::delete('/review/delete/{id}', [ReviewsController::class, 'destroy'])->name('reviews.destroy');

// Announcements
Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements');
Route::get('/announcement/create', [AnnouncementsController::class, 'create'])->name('transparency.announcements.create');
Route::post('/announcement/store', [AnnouncementsController::class, 'store'])->name('transparency.announcements.store');
Route::get('/announcement/show/{id}', [AnnouncementsController::class, 'show'])->name('transparency.announcements.show');
Route::get('/announcement/edit/{id}', [AnnouncementsController::class, 'edit'])->name('transparency.announcements.edit');
Route::put('/announcement/edit/{id}', [AnnouncementsController::class, 'update'])->name('transparency.announcements.update');
Route::delete('/announcement/delete/{id}', [AnnouncementsController::class, 'destroy'])->name('transparency.announcements.destroy');

// Access Request
Route::get('/accessrequests', [AccessRequestController::class, 'index'])->name('accessrequests');
Route::get('/accessrequest/create', [AccessRequestController::class, 'create'])->name('transparency.accessrequests.create');
Route::post('/accessrequest/store', [AccessRequestController::class, 'store'])->name('transparency.accessrequests.store');
Route::get('/accessrequest/show/{id}', [AccessRequestController::class, 'show'])->name('transparency.accessrequests.show');
Route::get('/accessrequest/edit/{id}', [AccessRequestController::class, 'edit'])->name('transparency.accessrequests.edit');
Route::put('/accessrequest/edit/{id}', [AccessRequestController::class, 'update'])->name('transparency.accessrequests.update');
Route::delete('/accessrequest/delete/{id}', [AccessRequestController::class, 'destroy'])->name('transparency.accessrequests.destroy');

// Users
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/createusers', [UsersController::class, 'create'])->name('users.create');
Route::post('/storeusers', [UsersController::class, 'store'])->name('users.store');
Route::get('/showusers/{id}', [UsersController::class, 'show'])->name('users.show');
Route::get('/editusers/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/editusers/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/deleteusers/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

// Admin Proponents
Route::get('/proponents', [ProponentsController::class, 'index'])->name('proponents');
Route::get('/createproponents', [ProponentsController::class, 'create'])->name('proponents.admin-proponents.create');
Route::post('/storeproponents', [ProponentsController::class, 'store'])->name('proponents.admin-proponents.store');
Route::get('/showproponents/{id}', [ProponentsController::class, 'show'])->name('proponents.admin-proponents.show');
Route::get('/editproponents/{id}', [ProponentsController::class, 'edit'])->name('proponents.admin-proponents.edit');
Route::put('/editproponents/{id}', [ProponentsController::class, 'update'])->name('proponents.admin-proponents.update');
Route::delete('/deleteproponents/{id}', [ProponentsController::class, 'destroy'])->name('proponents.admin-proponents.destroy');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::get('/comments', function () {
    return view('comments');
});

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/compose', function () {
    return view('mailbox.compose');
});
Route::get('/inbox', function () {
    return view('mailbox.inbox');
});
Route::get('/read', function () {
    return view('mailbox.read');
});

Route::resource('documents', DocumentController::class);

Route::get('send', [HomeController::class, 'sendNotification']);


Route::get('/contact/create', [ContactController::class, 'create'])->name('contact');
Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/task', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/calendar', [TaskController::class, 'calendar'])->name('tasks.calendar');
Route::get('task/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/task/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('tasks.delete');

Route::get('fullcalender', [FullCalenderController::class, 'index'])->name('fullcalender');
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

// Projects
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/project/create', [ProjectsController::class, 'create'])->name('projects.create');
Route::post('/project/store', [ProjectsController::class, 'store'])->name('projects.store');
Route::get('/submission-details/show/{id}', [ProjectsController::class, 'show'])->name('submission-details.show');
Route::get('/project/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
Route::put('/project/edit/{id}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/project/delete/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');


Route::get('/submission-details.project-teams.create', function () {
    return view('submission-details.project-teams.create');
});
Route::get('/submission-details.project-teams.edit', function () {
    return view('submission-details.project-teams.modal');
});

Route::get('/project-teams', [ProjectTeamController::class, 'index'])->name('submission-details.project-teams.index');
Route::get('/project-teams/create', [ProjectTeamController::class, 'create'])->name('submission-details.project-teams.create');
Route::post('/project-teams/store', [ProjectTeamController::class, 'store'])->name('submission-details.project-teams.store');
Route::put('/project-teams/{id}', [ProjectTeamController::class, 'show'])->name('submission-details.project-teams.show');
Route::get('/project-teams/{id}/edit', [ProjectTeamController::class, 'edit'])->name('submission-details.project-teams.edit');
Route::put('/project-teams/{id}', [ProjectTeamController::class, 'update'])->name('submission-details.project-teams.update');
Route::delete('/project-teams/{id}', [ProjectTeamController::class, 'destroy'])->name('submission-details.project-teams.destroy');

// FOR STATUS
Route::get('/status/under-evaluation', [ProjectsController::class, 'underEvaluation'])->name('status.under-evaluation');
Route::get('/status/draft', [ProjectsController::class, 'draft'])->name('status.draft');
Route::get('/status/for-revision', [ProjectsController::class, 'forRevision'])->name('status.for-revision');
Route::get('/status/approved', [ProjectsController::class, 'approved'])->name('status.approved');
Route::get('/status/deferred', [ProjectsController::class, 'deferred'])->name('status.deferred');
Route::get('/status/disapproved', [ProjectsController::class, 'disapproved'])->name('status.disapproved');

Route::put('/dashboard', [ProjectsController::class, 'forRevisionSidebar'])->name('dashboard');




Route::get('/test-error', function () {
    abort(500);
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

