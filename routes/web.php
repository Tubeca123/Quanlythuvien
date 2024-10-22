<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\UserforController;
use App\Http\Middleware\CheckLogin;

    // Route::get('/', function () {
    //     return view('welcome');
    // })->name("welcome");
    


    Route::group(['prefix' => 'file-manager', 'middleware' => ['web']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::get('/register', [UserController::class, 'index'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('handregister');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'handlogin'])->name('handlogin');
    Route::get('/logout', [UserController::class, 'handleLogout'])->name('handleLogout');//vd đây là link logout

    Route::get('/', [UserController::class, 'Trangchu'])->name('trang_chu');
    Route::post('/add-to-borrow/{id}', [UserforController::class, 'addtoborrow']);
    Route::get('/borrow_detail', [UserforController::class, 'detail'])->name('br_detail');
    Route::post('/remove_book/{id}', [UserforController::class, 'removeBook']);
    Route::post('/create_borrow', [UserforController::class, 'createBorrow']);

    Route::prefix('trangchu')->middleware(CheckLogin::class)->group(function () {
    
    });

    Route::prefix('admin')->middleware(CheckLogin::class)->group(function () {
    
    Route::post('/import', [ExcelImportController::class, 'import'])->name("import");
    Route::get('/user', [UserController::class, 'show'])->name('show_list_users');
    Route::get('/profile/{Id}', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/{Id}', [UserController::class, 'update_profile'])->name('update_profile');
    Route::put('/password/{Id}', [UserController::class, 'update_password'])->name('update_pw');

    Route::post('/user_lock/{Id}', [UserController::class, 'lockuser'])->name('lock_user');
    Route::post('/user_role/{Id}', [UserController::class, 'roleuser'])->name('role_user');
    


    
    Route::get('/books_list', [BookController::class, 'index'])->name('show_list_book');
    Route::get('/create_books', [BookController::class, 'create'])->name('create_book');
    Route::post('/create_books', [BookController::class, 'store'])->name('handle_create_book');
    Route::get('/edit_books/{Id}', [BookController::class, 'edit'])->name('edit_book');
    Route::put('/edit_books/{Id}', [BookController::class, 'update'])->name('update_book');
    Route::delete('/destroy_books/{Id}', [BookController::class, 'destroy'])->name('destroy_book') ;

    Route::get('/list_categories', [CategoryController::class, 'index'])->name('show_list_category');
    Route::get('/create_categories', [CategoryController::class, 'create'])->name('create_category');
    Route::post('/create_categories', [CategoryController::class, 'store'])->name('handle_create_category');
    Route::get('/edit_categories/{Id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('/edit_categories/{Id}', [CategoryController::class, 'update'])->name('update_category');
    Route::delete('/destroy_categories/{Id}', [CategoryController::class, 'destroy'])->name('destroy_category') ;
    
    Route::get('/list_publisher', [PublisherController::class, 'index'])->name('show_list_publis');
    Route::get('/create_publisher', [PublisherController::class, 'create'])->name('create_publis');
    Route::post('/create_publisher', [PublisherController::class, 'store'])->name('handle_create_publis');
    Route::get('/edit_publisher/{Id}', [PublisherController::class, 'edit'])->name('edit_publis');
    Route::put('/edit_publisher/{Id}', [PublisherController::class, 'update'])->name('update_publis');
    Route::delete('/destroy_publisher/{Id}', [PublisherController::class, 'destroy'])->name('destroy_publis') ;

    Route::get('/', [DashboardController::class, 'index'])->name('quanlytv');
    Route::get('/home', [DashboardController::class, 'show'])->name('home_brow');    









});


    

