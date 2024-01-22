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
use App\Http\Controllers\TrackController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;

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

Route::middleware(['auth', 'cache'])->group(function (){ 

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::get('/total-users', [UserController::class, 'showTotalUsers']);
    Route::get('/create-users', [UserController::class, 'create'])->name('users.create');
    Route::post('/store-users', [UserController::class, 'store'])->name('users.store');
    Route::get('/show-users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/edit-users/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/edit-users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/delete-users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/submission-details/show/{id}', [ProjectController::class, 'show'])->name('submission-details.show');
    Route::get('/access-requests', [AccessRequestController::class, 'index'])->name('access-requests');
    Route::get('/access-request/edit/{id}', [AccessRequestController::class, 'edit'])->name('transparency.access-requests.edit');
    Route::put('/access-request/edit/{id}', [AccessRequestController::class, 'update'])->name('transparency.access-requests.update');

    Route::get('/for-reviews', [ReviewController::class, 'index'])->name('for.reviews');
    Route::get('/reviewed-projects', [ReviewController::class, 'reviewed'])->name('reviewed');
    Route::get('/review.for-review-projects', [ReviewController::class, 'assignedToReview'])->name('for-review');
    Route::get('/review/review-and-summarize/{id}', [ReviewController::class, 'show'])->name('review.for-review-project');
    Route::get('/review/for-reviews', [ReviewController::class, 'forReviews'])->name('submission-details.reviews.for-reviews');

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

    Route::get('/search-projects', [ReportController::class, 'searchProjects'])->name('search.projects');
    
    Route::get('/generate-revision-pdf/{id}', [ReportController::class, 'generateRevisionReport'])->name('generate.revision.pdf');
    Route::get('/generate-pdf/{data_id}', [ReportController::class, 'generateProjectReport'])->name('generate.pdf');
    Route::post('/generate-users-report', [ReportController::class, 'generateUsersReport'])->name('generate.users.report');
    Route::post('/generate-projects-report', [ReportController::class, 'generateProjectsReport'])->name('generate.projects.report');
    Route::post('/generate-under-evaluation-report', [ReportController::class, 'generateUnderEvaluationReport'])->name('generate.under-evaluation.report');
    Route::post('/generate-for-revision-report', [ReportController::class, 'generateForRevisionReport'])->name('generate.for-revision.report');
    Route::post('/generate-deferred-report', [ReportController::class, 'generateDeferredReport'])->name('generate.deferred.report');
    Route::post('/generate-approved-report', [ReportController::class, 'generateApprovedReport'])->name('generate.approved.report');
    Route::post('/generate-disapproved-report', [ReportController::class, 'generateDisapprovedReport'])->name('generate.disapproved.report');
    Route::post('/generate-projects-report-xlsx', [ReportController::class, 'projectsReportExcel'])->name('projects.xlsx.report');

    Route::post('/access-requests/{id}/approve', [AccessRequestController::class, 'approve'])->name('access-requests.approve');
    Route::post('/access-requests/{id}/decline', [AccessRequestController::class, 'decline'])->name('access-requests.decline');

    // Messages
    Route::get('/messages/indexx', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/messages/reply', [MessageController::class, 'reply'])->name('messages.reply');
    Route::post('/messages/delete-selected', [MessageController::class, 'deleteSelected'])->name('messages.deleteSelected');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.mailbox');
    Route::get('/messages-view/{id}', [MessageController::class, 'show'])->name('messages.read-mail');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.compose');
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
    Route::post('/store/project/reviewers', [ReviewController::class, 'store'])->name('store.project.reviewers');
    Route::get('/reports', [ReportController::class, 'generateReport'])->name('reports');
}); 

Route::prefix('researcher')->middleware(['auth', 'cache', 'researcher'])->group(function (){ 

    Route::get('/home', [DashboardController::class, 'countAll'])->name('researcher.home');
    Route::get('/call-for-proposals/show/{id}', [CallForProposalController::class, 'show'])->name('transparency.call-for-proposals.show');
    Route::get('/tasks', [TaskController::class, 'index'])->name('submission-details.tasks.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('submission-details.tasks.create');
    Route::post('/task', [TaskController::class, 'store'])->name('submission-details.tasks.store');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('submission-details.tasks.edit');
    Route::put('/task/{id}/edit', [TaskController::class, 'update'])->name('submission-details.tasks.update');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('submission-details.tasks.delete');

    Route::get('/access-request/create', [AccessRequestController::class, 'create'])->name('transparency.access-requests.create');
    Route::post('/access-request/store', [AccessRequestController::class, 'store'])->name('transparency.access-requests.store');
    Route::get('/access-request/show/{id}', [AccessRequestController::class, 'show'])->name('transparency.access-requests.show');

    Route::get('/project/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('projects.update');

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


Route::prefix('directorOrStaff')->middleware(['auth', 'directorOrStaff', 'cache'])->group(function () { 

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


// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


Route::get('/test-error', function () {
    abort(500);
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
