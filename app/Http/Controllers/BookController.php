<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class BookController extends Controller
{
    // Halaman Utama dari BookController
    public function index()
    {
        $tittle = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $tittle = 'in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $tittle = 'by ' . $author->name;
        }
        return view('books', [
            "tittle" => "All Books " . $tittle,
            "active" => 'books',
            "books" => Book::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    // Menampilkan detail dari Book
    public function show(Book $book)
    {
        return View('book', [
            "tittle" => "Single Book",
            "active" => 'books',
            "book" => $book
        ]);
    }
}
