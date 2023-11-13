<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CallForProposalController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LineItemBudgetController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageController;

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

// Login with Google Routes
Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Track Submitted Project
Route::get('/', [TrackController::class, 'track'])->name('welcome');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'cache'])->group(function (){

    Route::get('/total-users', [UserController::class, 'showTotalUsers']);
    Route::get('/create-users', [UserController::class, 'create'])->name('users.create');
    Route::post('/store-users', [UserController::class, 'store'])->name('users.store');
    Route::get('/show-users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/edit-users/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/edit-users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/delete-users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/submission-details/show/{id}', [ProjectController::class, 'show'])->name('submission-details.show');
    Route::get('/access-requests', [AccessRequestController::class, 'index'])->name('access-requests');
    Route::get('/review/review-and-summarize/{id}', [ReviewController::class, 'show'])->name('review.for-review-project');
    Route::get('/review/for-reviews', [ReviewController::class, 'forReviews'])->name('submission-details.reviews.for-reviews');
    // Messages
    Route::resource('messages', MessageController::class);
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    // Route::get('/messages/{{message}}', [MessageController::class, 'show'])->name('messages.show');
    // Route::put('/messages/{{message}}', [MessageController::class, 'update'])->name('messages.update');
    // Route::delete('/messages/{{message}}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::prefix('staff')->middleware(['auth', 'cache', 'staff'])->group(function (){
    Route::get('/home', [DashboardController::class, 'countAll'])->name('staff.home');
    Route::post('/project/summary/reviews', [ReviewController::class, 'storeSummaryReview'])->name('store.summary.reviews');

});

Route::prefix('reviewer')->middleware(['auth', 'cache', 'reviewer'])->group(function (){

    Route::get('/home', [DashboardController::class, 'countAll'])->name('reviewer.home');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
    Route::get('/review/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/review/store', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/review/show/{id}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::get('/review/edit/{id}', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/review/edit/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/review/delete/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/review/storeComments/{id}', [ReviewController::class, 'storeComments'])->name('reviews.storeComments');
});

Route::prefix('director')->middleware(['auth', 'cache', 'director'])->group(function (){

    Route::get('/home', [DashboardController::class, 'countAll'])->name('director.home');

    Route::delete('/project/delete/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/project-teams', [MemberController::class, 'index'])->name('submission-details.project-teams.index');
    Route::delete('/access-request/delete/{id}', [AccessRequestController::class, 'destroy'])->name('transparency.access-requests.destroy');
    Route::put('/reviews/review-decision/{id}', [ReviewController::class, 'reviewDecision'])->name('reviews.review-decision.store');
    Route::get('/select-reviewers', [ReviewController::class, 'select'])->name('submission-details.reviews.select');
});

Route::prefix('researcher')->middleware(['auth', 'cache', 'researcher'])->group(function (){

    Route::get('/home', [DashboardController::class, 'countAll'])->name('researcher.home');
    Route::get('/call-for-proposals/show/{id}', [CallForProposalController::class, 'show'])->name('transparency.call-for-proposals.show');
    Route::get('/tasks', [TaskController::class, 'index'])->name('submission-details.tasks.index');
    Route::get('task/create', [TaskController::class, 'create'])->name('submission-details.tasks.create');
    Route::post('/task', [TaskController::class, 'store'])->name('submission-details.tasks.store');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('submission-details.tasks.edit');
    Route::put('/task/{id}/edit', [TaskController::class, 'update'])->name('submission-details.tasks.update');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('submission-details.tasks.delete');

    Route::get('/access-request/create', [AccessRequestController::class, 'create'])->name('transparency.access-requests.create');
    Route::post('/access-request/store', [AccessRequestController::class, 'store'])->name('transparency.access-requests.store');
    Route::get('/access-request/show/{id}', [AccessRequestController::class, 'show'])->name('transparency.access-requests.show');
    Route::get('/access-request/edit/{id}', [AccessRequestController::class, 'edit'])->name('transparency.access-requests.edit');
    Route::put('/access-request/edit/{id}', [AccessRequestController::class, 'update'])->name('transparency.access-requests.update');

    Route::get('/project/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/project/edit/{id}', [ProjectController::class, 'update'])->name('projects.update');

    Route::get('/project-teams/create', [MemberController::class, 'create'])->name('submission-details.project-teams.create');
    Route::post('/project-teams/store/{id}', [MemberController::class, 'store'])->name('submission-details.project-teams.store');
    Route::put('/project-teams/{id}', [MemberController::class, 'show'])->name('submission-details.project-teams.show');
    Route::get('/project-teams/{id}/edit', [MemberController::class, 'edit'])->name('submission-details.project-teams.edit');
    Route::put('/project-teams/{id}', [MemberController::class, 'update'])->name('submission-details.project-teams.update');
    Route::delete('/project-teams/{id}', [MemberController::class, 'destroy'])->name('submission-details.project-teams.destroy');

    Route::get('/line-items-budget/create', [LineItemBudgetController::class, 'create'])->name('submission-details.line-items-budget.create');
    Route::post('/line-items-budget/store', [LineItemBudgetController::class, 'store'])->name('submission-details.line-items-budget.store');
    Route::get('/show-line-items-budget/{id}', [LineItemBudgetController::class, 'show'])->name('submission-details.line-items-budget.show');
    Route::get('/edit-line-items-budget/{id}', [LineItemBudgetController::class, 'edit'])->name('submission-details.line-items-budget.edit');
    Route::put('/edit-line-items-budget/{id}', [LineItemBudgetController::class, 'update'])->name('submission-details.line-items-budget.update');
    Route::delete('/delete-line-items-budget/{id}', [LineItemBudgetController::class, 'destroy'])->name('submission-details.line-items-budget.destroy');

    Route::get('/files/create', [FileController::class, 'create'])->name('submission-details.files.create');
    Route::post('/upload', [FileController::class, 'store'])->name('submission-details.files.store');
    Route::put('/files/reupload/{id}', [FileController::class, 'reupload'])->name('submission-details.files.reupload');
    Route::get('/files/{id}/edit', [FileController::class, 'edit'])->name('submission-details.files.edit');
    Route::delete('/files/delete/{id}', [FileController::class, 'delete'])->name('submission-details.files.delete'); // dipa nagana
    Route::get('/pdf/preview/{filename}', [FileController::class, 'previewPDF'])->name('submission-details.files.preview');
    Route::get('/download/{id}', [FileController::class, 'download'])->name('file.download');
    Route::get('/status/edit', [StatusController::class, 'update'])->name('projects.editstatus');
});


Route::prefix('directorOrStaff')->middleware(['auth', 'cache', 'directorOrStaff'])->group(function () {

    // Call-for-proposals
    Route::get('/call-for-proposals', [CallForProposalController::class, 'index'])->name('call-for-proposals');
    Route::get('/call-for-proposals/create', [CallForProposalController::class, 'create'])->name('transparency.call-for-proposals.create');
    Route::post('/call-for-proposals/store', [CallForProposalController::class, 'store'])->name('transparency.call-for-proposals.store');
    Route::get('/call-for-proposals/edit/{id}', [CallForProposalController::class, 'edit'])->name('transparency.call-for-proposals.edit');
    Route::put('/call-for-proposals/edit/{id}', [CallForProposalController::class, 'update'])->name('transparency.call-for-proposals.update');
    Route::delete('/call-for-proposals/delete/{id}', [CallForProposalController::class, 'destroy'])->name('transparency.call-for-proposals.destroy');
    Route::put('/projects/{id}/update-status', [StatusController::class, 'updateStatus'])->name('projects.updateStatus');
    Route::get('/users', [UserController::class, 'index'])->name('users');

});


Route::middleware(['auth', 'cache'])->group(function (){

    // NAGANA NA YAYS!
    Route::get('/generate-pdf/{data_id}', [PdfController::class, 'generatePDF'])->name('generate.pdf');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::post('/store/project/reviewers', [ReviewController::class, 'store'])->name('store.project.reviewers');//oks na

    // MOT FUNCTIONAL YET!
    Route::post('/add-review/{data_id}', [ReviewController::class, 'addReview'])->name('add.review');

    Route::get('/status/draft', [StatusController::class, 'draft'])->name('status.draft');
    Route::get('/status/under-evaluation', [StatusController::class, 'underEvaluation'])->name('status.under-evaluation');
    Route::get('/status/for-revision', [StatusController::class, 'forRevision'])->name('status.for-revision');
    Route::get('/status/approved', [StatusController::class, 'approved'])->name('status.approved');
    Route::get('/status/deferred', [StatusController::class, 'deferred'])->name('status.deferred');
    Route::get('/status/disapproved', [StatusController::class, 'disapproved'])->name('status.disapproved');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('mark-all-as-read');
    Route::get('/mark-notification-as-read/{notification}', [NotificationController::class, 'markAsRead'])->name('mark-notification-as-read');


});

// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');


Route::get('/test-error', function () {
    abort(500);
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});