<?php

use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardBookController;

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
    return view('home', [
        "tittle" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "tittle" => "About",
        "active" => 'about',
        "name" => "David Wen",
        "email" => "davidwn26049@gmail.com",
        "image" => "satoru.jpeg",

    ]);
});


Route::get('/books', [BookController::class, 'index']);


// Halaman single post
Route::get('/book/{book:slug}', [BookController::class, 'show']);

// Halaman Categories
Route::get('/categories', function () {
    return view('categories', [
        'tittle' => 'Book Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});


// Login (yg belom terotentikasi)
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// Logout
Route::post('/logout', [LoginController::class, 'logout']);
// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', function () {
    $userId = Auth::id();
    $allUsers = User::all()->count();
    $allBooks = Book::all()->count();
    $booksCount = Book::where('user_id', $userId)->count();
    $allCategories = Category::all()->count();
    $categoriesCount = Book::where('user_id', $userId)->distinct('category_id')->count('category_id');

    return view('dashboard.index', [
        "allUsers" => $allUsers,
        "allBooks" => $allBooks,
        "myBooks" => $booksCount,
        "allCategories" => $allCategories,
        "myCategories" => $categoriesCount
    ]);
})->middleware('auth');

// Route::get('/dashboard/books/{book:slug}');
Route::get('/dashboard/books/createSlug',[DashboardBookController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/books',DashboardBookController::class)->middleware('auth');

// Mengelola Categories
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('admin');