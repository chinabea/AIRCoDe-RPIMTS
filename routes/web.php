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
use App\Http\Controllers\LineItemBudgetController;
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

// Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'staff'])->group(function (){
    Route::get('/staff', [ProjectsController::class, 'forRevision'])->name('staff');

});


Route::middleware(['auth', 'reviewer'])->group(function (){
    Route::get('/reviewer', function () {
        return view('dashboard');
    })->name('reviewer');
    
    Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
    Route::get('/review/create', [ReviewsController::class, 'create'])->name('reviews.create');
    Route::post('/review/store', [ReviewsController::class, 'store'])->name('reviews.store');
    Route::get('/review/show/{id}', [ReviewsController::class, 'show'])->name('reviews.show');
    Route::get('/review/edit/{id}', [ReviewsController::class, 'edit'])->name('reviews.edit');
    Route::put('/review/edit/{id}', [ReviewsController::class, 'update'])->name('reviews.update');
    Route::delete('/review/delete/{id}', [ReviewsController::class, 'destroy'])->name('reviews.destroy');

});


Route::middleware(['auth', 'director'])->group(function (){
    Route::get('director', function () {
        return view('dashboard');
    })->name('director');

    Route::get('/abouts', [AboutusController::class, 'index'])->name('abouts');
    Route::get('/about/create', [AboutusController::class, 'create'])->name('transparency.aboutus.create');
    Route::post('/about/store', [AboutusController::class, 'store'])->name('transparency.aboutus.store');
    Route::get('/about/edit/{id}', [AboutusController::class, 'edit'])->name('transparency.aboutus.edit');
    Route::put('/about/edit/{id}', [AboutusController::class, 'update'])->name('transparency.aboutus.update');
    Route::delete('/about/delete/{id}', [AboutusController::class, 'destroy'])->name('transparency.aboutus.destroy');
    Route::get('/call-for-proposals', [ProposalsController::class, 'index'])->name('call-for-proposals');
    Route::get('/call-for-proposals/create', [ProposalsController::class, 'create'])->name('transparency.call-for-proposals.create');
    Route::post('/call-for-proposals/store', [ProposalsController::class, 'store'])->name('transparency.call-for-proposals.store');
    Route::get('/call-for-proposals/edit/{id}', [ProposalsController::class, 'edit'])->name('transparency.call-for-proposals.edit');
    Route::put('/call-for-proposals/edit/{id}', [ProposalsController::class, 'update'])->name('transparency.call-for-proposals.update');
    Route::delete('/call-for-proposals/delete/{id}', [ProposalsController::class, 'destroy'])->name('transparency.call-for-proposals.destroy');
    Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements');
    Route::get('/announcement/create', [AnnouncementsController::class, 'create'])->name('transparency.announcements.create');
    Route::post('/announcement/store', [AnnouncementsController::class, 'store'])->name('transparency.announcements.store');
    Route::get('/announcement/edit/{id}', [AnnouncementsController::class, 'edit'])->name('transparency.announcements.edit');
    Route::put('/announcement/edit/{id}', [AnnouncementsController::class, 'update'])->name('transparency.announcements.update');
    Route::delete('/announcement/delete/{id}', [AnnouncementsController::class, 'destroy'])->name('transparency.announcements.destroy');
    Route::get('/access-requests', [AccessRequestController::class, 'index'])->name('access-requests');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
    Route::get('/submission-details/show/{id}', [ProjectsController::class, 'show'])->name('submission-details.show');
    Route::delete('/project/delete/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/project-teams', [ProjectTeamController::class, 'index'])->name('submission-details.project-teams.index');
    Route::delete('/project-teams/{id}', [ProjectTeamController::class, 'destroy'])->name('submission-details.project-teams.destroy');

    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });
    

});

Route::middleware(['auth', 'researcher'])->group(function (){
    Route::get('/researcher', function () {
        return view('dashboard');
    })->name('researcher');

    Route::get('/about/show/{id}', [AboutusController::class, 'show'])->name('transparency.aboutus.show');
    Route::get('/call-for-proposals/show/{id}', [ProposalsController::class, 'show'])->name('transparency.call-for-proposals.show'); //view all list without functions
    Route::get('/announcement/show/{id}', [AnnouncementsController::class, 'show'])->name('transparency.announcements.show'); //view all list without functions
    Route::get('/access-request/create', [AccessRequestController::class, 'create'])->name('transparency.access-requests.create');
    Route::post('/access-request/store', [AccessRequestController::class, 'store'])->name('transparency.access-requests.store');
    Route::get('/access-request/show/{id}', [AccessRequestController::class, 'show'])->name('transparency.access-requests.show');
    Route::get('/access-request/edit/{id}', [AccessRequestController::class, 'edit'])->name('transparency.access-requests.edit');
    Route::put('/access-request/edit/{id}', [AccessRequestController::class, 'update'])->name('transparency.access-requests.update');
    Route::delete('/access-request/delete/{id}', [AccessRequestController::class, 'destroy'])->name('transparency.access-requests.destroy');
    Route::delete('/delete-users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/project/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/project/store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/submission-details/show/{id}', [ProjectsController::class, 'show'])->name('submission-details.show');
    Route::get('/project/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/project/edit/{id}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact');
    Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/project-teams/create', [ProjectTeamController::class, 'create'])->name('submission-details.project-teams.create');
    Route::post('/project-teams/store/{id}', [ProjectTeamController::class, 'store'])->name('submission-details.project-teams.store');
    Route::put('/project-teams/{id}', [ProjectTeamController::class, 'show'])->name('submission-details.project-teams.show');
    Route::get('/project-teams/{id}/edit', [ProjectTeamController::class, 'edit'])->name('submission-details.project-teams.edit');
    Route::put('/project-teams/{id}', [ProjectTeamController::class, 'update'])->name('submission-details.project-teams.update');
    Route::delete('/project-teams/{id}', [ProjectTeamController::class, 'destroy'])->name('submission-details.project-teams.destroy');

    
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/calendar', [TaskController::class, 'calendar'])->name('tasks.calendar');
Route::get('task/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/task/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('tasks.delete');


// FOR STATUS
Route::get('/status/under-evaluation', [ProjectsController::class, 'underEvaluation'])->name('status.under-evaluation');
Route::get('/status/draft', [ProjectsController::class, 'draft'])->name('status.draft');
Route::get('/status/for-revision', [ProjectsController::class, 'forRevision'])->name('status.for-revision');
Route::get('/status/approved', [ProjectsController::class, 'approved'])->name('status.approved');
Route::get('/status/deferred', [ProjectsController::class, 'deferred'])->name('status.deferred');
Route::get('/status/disapproved', [ProjectsController::class, 'disapproved'])->name('status.disapproved');


// Route::get('/proj-revision/show', [ProjectsController::class, 'forRevisionSidebar'])->name('proj-revision.show');






    // Route::get('/create-users', [UsersController::class, 'create'])->name('users.create'); this should be in a login
    // Route::post('/store-users', [UsersController::class, 'store'])->name('users.store');
    // Route::get('/show-users/{id}', [UsersController::class, 'show'])->name('users.show');
    // Route::get('/edit-users/{id}', [UsersController::class, 'edit'])->name('users.edit');
    // Route::put('/edit-users/{id}', [UsersController::class, 'update'])->name('users.update');
    
Route::get('/proponents', [ProponentsController::class, 'index'])->name('proponents');
Route::get('/create-proponents', [ProponentsController::class, 'create'])->name('proponents.admin-proponents.create');
Route::post('/store-proponents', [ProponentsController::class, 'store'])->name('proponents.admin-proponents.store');
Route::get('/show-proponents/{id}', [ProponentsController::class, 'show'])->name('proponents.admin-proponents.show');
Route::get('/edit-proponents/{id}', [ProponentsController::class, 'edit'])->name('proponents.admin-proponents.edit');
Route::put('/edit-proponents/{id}', [ProponentsController::class, 'update'])->name('proponents.admin-proponents.update');
Route::delete('/delete-proponents/{id}', [ProponentsController::class, 'destroy'])->name('proponents.admin-proponents.destroy');

Route::resource('documents', DocumentController::class);

Route::get('send', [HomeController::class, 'sendNotification']);



Route::get('/track', [TrackController::class, 'index'])->name('track');
Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs');

Route::get('/line-items-budget/create', [LineItemBudgetController::class, 'create'])->name('submission-details.line-items-budget.create');
Route::post('/line-items-budget/store', [LineItemBudgetController::class, 'store'])->name('submission-details.line-items-budget.store');

Route::post('/projects/{project}/files', 'ProjectFileController@store')->name('project.files.store');
Route::get('/projects/{project}/files', 'ProjectFileController@index')->name('project.files.index');
Route::delete('/projects/{project}/files/{file}', 'ProjectFileController@destroy')->name('project.files.destroy');




Route::get('/test-error', function () {
    abort(500);
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
