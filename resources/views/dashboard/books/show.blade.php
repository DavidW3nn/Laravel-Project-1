@extends('layouts/main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Judul --}}
                <h1 class="mb-3">{{ $book->tittle}}</h1>

                   {{-- Edit --}}
                   <a href="/dashboard/books/{{ $book->slug }}/edit" class="btn btn-warning mt-1"><span data-feather='edit'>Edit</span></a>
                   
                  {{-- Delete --}}
                 <form action="/dashboard/books/{{ $book->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather='x-circle'>Delete</span></button>
                 </form>
      
                {{-- Image --}}
                @if ($book->image)
                <div style="max-height:350px; overflow:hidden;">
                    <img src="{{ asset('storage/' .$book->image) }}" class="card-img-top img-fluid mt-3" alt="{{ $book->category->name }}"> 
                </div>
    
                @else
                <img src="https://source.unsplash.com/1200x500?{{ $book->category->name}}" class="card-img-top img-fluid mt-3" alt="{{ $book->category->name }}">
                @endif
               

                {{-- Body --}}
                <article class="my-3 fs-5">
                    {!! $book->body !!}
                </article>
                {{-- Button untuk back --}}
                 <a href="/dashboard/books" class="btn btn-success mt-1"><span data-feather='delete'>Back to all my books</span></a>
                
            </div>
        </div>
    </div>


  



    <br><br>


@endsection