<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIsssueController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\BookLostController;
use App\Http\Controllers\AppSettingsController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', [HomeController::class, "index"])->name('dashboard');

    Route::get('/manage/students', [StudentController::class, "index"])->name("manage.students");
    Route::get('/detail/students/{id}', [StudentController::class, "detailStudent"])->name("detail.students");
    Route::get('/add/students', [StudentController::class, "addStudent"])->name("add.students");
    Route::post('/add/students', [StudentController::class, "newStudent"])->name("add.students");
    Route::get('/update/students/{id}', [StudentController::class, "updateStudent"])->name("update.students");
    Route::post('/update/students/{id}', [StudentController::class, "editStudent"])->name("edit.students");
    Route::post('/delete/students/{id}', [StudentController::class, "deleteStudent"])->name("delete.students");
    Route::get('/status/students/{id}', [StudentController::class, "statusStudent"])->name("status.students");
    Route::get('/delete/student-phone-number/{id}', [StudentController::class, "deleteStudentPhoneNum"])->name("delete.student-phone-number");

    Route::get('/manage/books', [BookController::class, "index"])->name("manage.books");
    Route::get('/detail/books/{id}', [BookController::class, "detailBook"])->name("detail.books");
    Route::get('/add/books', [BookController::class, "addBook"])->name("add.books");
    Route::post('/add/books', [BookController::class, "newBook"])->name("add.books");
    Route::get('/update/books/{id}', [BookController::class, "updateBook"])->name("update.books");
    Route::post('/update/books/{id}', [BookController::class, "editBook"])->name("edit.books");
    Route::post('/delete/books/{id}', [BookController::class, "deleteBook"])->name("delete.books");
    Route::get('/status/books/{id}', [BookController::class, "statusBook"])->name("status.books");
    Route::get('/delete/books/author/{author_id}', [BookController::class, "bookAuthorDelete"])->name("delete.books.author");

    Route::get('book/issue', [BookIsssueController::class, "index"])->name('book.issue');
    Route::get('book/search', [BookIsssueController::class, "bookSearch"])->name('book.search');
    Route::get('member/search', [BookIsssueController::class, "memberSearch"])->name('member.search');
    Route::get('book/issue-confirm', [BookIsssueController::class, "issueConfirm"])->name('book.issue-confirm');
    Route::get('book/return', [BookReturnController::class, "index"])->name('book.return');
    Route::get('book/lost', [BookLostController::class, "index"])->name('book.lost');
    Route::get('book/issue/return/analysis/', [BookIsssueController::class, "bookAnalysisByDynamic"])->name('book.issue.return.analysis');

    Route::get('settings', [AppSettingsController::class, "index"])->name("settings");
    Route::get('settings/admin-options', [AppSettingsController::class, "adminOptions"])->name("settings.admin-options");
    Route::get('settings/app-options', [AppSettingsController::class, "appOptions"])->name("settings.app-options");
});
