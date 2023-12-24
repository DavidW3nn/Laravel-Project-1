<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {               
        // Jika Admin maka menampilkan seluruh books
        if(auth()->user()->username === 'davidwen'){
            return view('dashboard.books.index',[
            'books' => Book::all(),
            ]);
        }
         return view('dashboard.books.index',[
            'books' => Book::where('user_id',auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.books.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tittle' => 'required|max:255',
            'slug' => 'required|unique:books',
            'category_id' => 'required',
            'image' => 'image|file|min:1024',
            'body' =>'required'
        ]
        );
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('book-images');
        }
  

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($validateData['body'],200));

        // Upload ke database
        Book::create($validateData);

        // Kembalikan ke halaman books
        return redirect('/dashboard/books')->with('success','New book has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('dashboard.books.show',[
            'book' => $book,
            'tittle' => 'Show'
        ]);
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit',[
            'categories' => Category::all(),
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'tittle' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|min:1024',
            'body' =>'required'
        ];
        

        if($request->slug != $book->slug){
            $rules['slug'] ='required|unique:books';
        }

        $validateData = $request->validate($rules);

         // check image baru
         if($request->file('image')){
            // Hapus gambar yang lama
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validateData['image'] = $request->file('image')->store('book-images');
        }

        // Upload ke database
        Book::where('id',$book->id)
            ->update($validateData);

        // Kembalikan ke halaman books
        return redirect('/dashboard/books')->with('success','New book has been updated!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Book::class,'slug',$request->tittle);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Hapus gambar yang lama (difile)
        if($book->image){
            Storage::delete($book->image);
        }
         // Hapus data (di table)
         Book::destroy($book->id);
         return redirect('/dashboard/books')->with('success','Book has been delated!');

         
    }
}
