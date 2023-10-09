<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProposalsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\LineItemBudgetController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EmailBoxController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\ProjectHistoryController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\NotificationController;

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
Route::get('/projects/track', [TrackController::class, 'track'])->name('projects.track');
Route::get('/', [TrackController::class, 'track'])->name('welcome');


// Route::get('/', function () {
//     return view('welcome')->name('welcome');
// });


Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function (){

    Route::get('/total-users', [UsersController::class, 'showTotalUsers']);
    Route::get('/create-users', [UsersController::class, 'create'])->name('users.create'); //this should be in a login
    Route::post('/store-users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/show-users/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/edit-users/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/edit-users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/delete-users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/submission-details/show/{id}', [ProjectsController::class, 'show'])->name('submission-details.show');
    Route::get('/access-requests', [AccessRequestController::class, 'index'])->name('access-requests');


    Route::prefix('staff')->middleware(['auth', 'staff'])->group(function (){
        Route::get('/home', [DashboardController::class, 'countAll'])->name('staff.home');
    
    });

    Route::prefix('reviewer')->middleware(['auth', 'reviewer'])->group(function (){
    
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

    Route::prefix('director')->middleware(['auth', 'director'])->group(function (){
    
        Route::get('/home', [DashboardController::class, 'countAll'])->name('director.home');
        Route::get('/abouts', [AboutusController::class, 'index'])->name('abouts');
        Route::get('/about/create', [AboutusController::class, 'create'])->name('transparency.aboutus.create');
        Route::post('/about/store', [AboutusController::class, 'store'])->name('transparency.aboutus.store');
        Route::get('/about/edit/{id}', [AboutusController::class, 'edit'])->name('transparency.aboutus.edit');
        Route::put('/about/edit/{id}', [AboutusController::class, 'update'])->name('transparency.aboutus.update');
        Route::delete('/about/delete/{id}', [AboutusController::class, 'destroy'])->name('transparency.aboutus.destroy');
    
        Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements');
        Route::get('/announcement/create', [AnnouncementsController::class, 'create'])->name('transparency.announcements.create');
        Route::post('/announcement/store', [AnnouncementsController::class, 'store'])->name('transparency.announcements.store');
        Route::get('/announcement/edit/{id}', [AnnouncementsController::class, 'edit'])->name('transparency.announcements.edit');
        Route::put('/announcement/edit/{id}', [AnnouncementsController::class, 'update'])->name('transparency.announcements.update');
        Route::delete('/announcement/delete/{id}', [AnnouncementsController::class, 'destroy'])->name('transparency.announcements.destroy');
    
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::delete('/project/delete/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
        Route::get('/project-teams', [ProjectTeamController::class, 'index'])->name('submission-details.project-teams.index');
        Route::delete('/project-teams/{id}', [ProjectTeamController::class, 'destroy'])->name('submission-details.project-teams.destroy');
        Route::delete('/access-request/delete/{id}', [AccessRequestController::class, 'destroy'])->name('transparency.access-requests.destroy');
    
        // Route::get('/review/{id}', [ReviewController::class, 'review'])->name('reviews.review-decision');
        Route::put('/reviews/review-decision/{id}', [ReviewController::class, 'reviewDecision'])->name('reviews.review-decision.store');
    
        // Route::get('/select-reviewers/{projectId}', [ReviewController::class, 'selectReviewers'])->name('submission-details.reviews.select-reviewer');
        // Route::get('/select-reviewers', [ReviewController::class, 'selectReviewers'])->name('submission-details.reviews.select-reviewer');
        // Route::post('/projects/assign-reviewers', [ReviewController::class, 'assignReviewers'])->name('submission-details.reviews.assignReviewers');
    
        Route::get('/select-reviewers', [ReviewController::class, 'select'])->name('submission-details.reviews.select');
        // Route::post('/submission-details/{projectId}/assignReviewers', [ReviewController::class, 'selectReviewers'])->name('submission-details.reviews.select-reviewer');
    });


    
});

Route::prefix('researcher')->middleware(['auth', 'researcher'])->group(function (){
    
    Route::get('/home', [DashboardController::class, 'countAll'])->name('researcher.home');

    Route::get('/about/show/{id}', [AboutusController::class, 'show'])->name('transparency.aboutus.show');
    Route::get('/call-for-proposals/show/{id}', [ProposalsController::class, 'show'])->name('transparency.call-for-proposals.show'); //view all list without functions
    Route::get('/announcement/show/{id}', [AnnouncementsController::class, 'show'])->name('transparency.announcements.show'); //view all list without functions

    Route::get('/tasks', [TaskController::class, 'index'])->name('submission-details.tasks.index');
    // Route::get('/task/calendar', [TaskController::class, 'calendar'])->name('tasks.calendar');
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

    Route::get('/project/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/project/store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/project/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/project/edit/{id}', [ProjectsController::class, 'update'])->name('projects.update');

    Route::get('/project-teams/create', [ProjectTeamController::class, 'create'])->name('submission-details.project-teams.create');
    Route::post('/project-teams/store/{id}', [ProjectTeamController::class, 'store'])->name('submission-details.project-teams.store');
    Route::put('/project-teams/{id}', [ProjectTeamController::class, 'show'])->name('submission-details.project-teams.show');
    Route::get('/project-teams/{id}/edit', [ProjectTeamController::class, 'edit'])->name('submission-details.project-teams.edit');
    Route::put('/project-teams/{id}', [ProjectTeamController::class, 'update'])->name('submission-details.project-teams.update');

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
    // Route::get('/pdf/preview/{filename}', [FileController::class, 'previewPDF'])->name('submission-details.files.pdf.preview');
    // Route::get('/{filename}', [FileController::class, 'previewPDF'])->name('submission-details.files.pdf-preview');
    // Route::get('/pdf/preview/{filename}',  [FileController::class, 'previewPDF'])->name('submission-details.files.preview');
    // Route::get('/pdf/preview/{filename}', [FileController::class, 'previewPDF'])->name('submission-details.files.preview');
    Route::get('/pdf/preview/{filename}', [FileController::class, 'previewPDF'])->name('submission-details.files.preview');
    Route::get('/download/{id}', [FileController::class, 'download'])->name('file.download');

    Route::get('/status/edit', [StatusController::class, 'update'])->name('projects.editstatus');
});


Route::prefix('DirectorAndStaff')->middleware(['auth', 'directorOrStaff'])->group(function () {

    // Call-for-proposals
    Route::get('/call-for-proposals', [ProposalsController::class, 'index'])->name('call-for-proposals');
    Route::get('/call-for-proposals/create', [ProposalsController::class, 'create'])->name('transparency.call-for-proposals.create');
    Route::post('/call-for-proposals/store', [ProposalsController::class, 'store'])->name('transparency.call-for-proposals.store');
    Route::get('/call-for-proposals/edit/{id}', [ProposalsController::class, 'edit'])->name('transparency.call-for-proposals.edit');
    Route::put('/call-for-proposals/edit/{id}', [ProposalsController::class, 'update'])->name('transparency.call-for-proposals.update');
    Route::delete('/call-for-proposals/delete/{id}', [ProposalsController::class, 'destroy'])->name('transparency.call-for-proposals.destroy');

    
    Route::put('/projects/{id}/update-status', [StatusController::class, 'updateStatus'])->name('projects.updateStatus');
    
});


// NAGANA NA YAYS!
Route::get('/generate-pdf/{data_id}', [PdfController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
Route::post('/store/project/reviewers', [ReviewController::class, 'store'])->name('store.project.reviewers');//oks na
Route::post('/project/summary/reviews', [ReviewController::class, 'storeSummaryReview'])->name('store.summary.reviews');



// KIND OF NAGANA NA, BUT NOT FULLY! ON PROCESS! 
Route::get('/Recommendations-Suggestions-and-Comments/{data_id}', [ReviewController::class, 'comments'])->name('submission-details.reviews.rsc');


// MOT FUNCTIONAL YET!
Route::post('/add-review/{data_id}', [ReviewController::class, 'addReview'])->name('add.review');

Route::get('/status/draft', [StatusController::class, 'draft'])->name('status.draft');
Route::get('/status/under-evaluation', [StatusController::class, 'underEvaluation'])->name('status.under-evaluation');
Route::get('/status/for-revision', [StatusController::class, 'forRevision'])->name('status.for-revision');
Route::get('/status/approved', [StatusController::class, 'approved'])->name('status.approved');
Route::get('/status/deferred', [StatusController::class, 'deferred'])->name('status.deferred');
Route::get('/status/disapproved', [StatusController::class, 'disapproved'])->name('status.disapproved');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

Route::get('/emailbox/compose', [EmailBoxController::class, 'index'])->name('emailbox.compose');
Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact');
Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// register 
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::post('/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('mark-all-as-read');
Route::get('/mark-notification-as-read/{notification}', [NotificationController::class, 'markAsRead'])->name('mark-notification-as-read');



Route::get('/error', function () {
    return view('errors.errorView')->name('errors.errorView');
});


Route::get('/test-error', function () {
    abort(500);
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
