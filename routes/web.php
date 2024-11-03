<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\UserforController;
use App\Http\Controllers\BorrowController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Models\Borrow;

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

    Route::get('/', [UserforController::class, 'Trangchu'])->name('trang_chu');
    Route::get('/borrow_detail', [UserforController::class, 'detail'])->name('br_detail');
    Route::get('/show_borrow_1', [UserforController::class, 'list_borrow_wait'])->name('br_1');
    Route::get('/list_close_borrow', [UserforController::class, 'list_close_br'])->name('list_close_br');
    Route::get('/book_wait_borrow/{Id}', [UserforController::class, 'book_wait'])->name('book_wait_br');
    Route::get('/list_borrowing', [UserforController::class, 'list_borrowing'])->name('borrowing2');
    Route::get('/list_borrow_done', [UserforController::class, 'done_br'])->name('borrow_done');

    Route::post('/create_borrow', [BorrowController::class, 'createBorrow']);
    Route::post('/destroy_borrow/{Id}',  [BorrowController::class, 'close_brow_wait']);
    Route::post('/remove_book/{id}', [BorrowController::class, 'removeBook']);
    Route::post('/add-to-borrow/{id}', [BorrowController::class, 'addtoborrow']);    

    Route::prefix('admin')->middleware(CheckLogin::class)->group(function () {
    
    Route::post('/import', [ExcelImportController::class, 'import'])->name("import");
    Route::get('/user', [UserController::class, 'show'])->name('show_list_users');
    Route::get('/profile/{Id}', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/{Id}', [UserController::class, 'update_profile'])->name('update_profile');
    Route::put('/password/{Id}', [UserController::class, 'update_password'])->name('update_pw');

    Route::post('/user_lock/{Id}', [UserController::class, 'lockuser'])->name('lock_user');
    Route::post('/user_role/{Id}', [UserController::class, 'roleuser'])->name('role_user');
    
    Route::get('/list_menu', [MenuController::class, 'index'])->name('show_list_menu');

    Route::get('/list_borrow_new', [AdminController::class, 'Borrow_wait'])->name('borrow_new');
    Route::get('/list_borrowing', [AdminController::class, 'Borrowing'])->name('borrowing');
    Route::post('/add_borrow/{Id}',  [AdminController::class, 'add_borrow']);
    Route::get('/check_book_wait_borrow/{Id}', [AdminController::class, 'get_return'])->name('check_borrow');
    Route::post('/return_borrow/{Id}',  [AdminController::class, 'return_borrow'])->name('return_borrow');
    Route::get('/book_wait_borrow/{Id}', [AdminController::class, 'book_in_wait'])->name('book_in_wait');

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


    

