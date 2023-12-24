@extends('layouts/main')
@section('container')
 {{-- Judul --}}
    <h1 class="mb-3 text-center">{{ $tittle }}</h1>

{{-- Box Search --}}
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/books">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}" id="">
           @endif

           @if(request('author'))
           <input type="hidden" name="author" value="{{ request('author') }}" id="">
          @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

{{-- Hero Book --}}
@if ($books->count())
<div class="card mb-3">
    {{-- Image --}}
    @if ($books[0]->image)
    <div style="max-height:350px; overflow:hidden;">
        <img src="{{ asset('storage/' .$books[0]->image) }}" class="card-img-top img-fluid" alt="{{ $books[0]->category->name }}"> 
    </div>

    @else
    <img src="https://source.unsplash.com/1200x400?{{ $books[0]->category->name }}" class="card-img-top" alt="{{ $books[0]->category->name }}">
    @endif
    <div class="card-body text-center">


    
    {{-- Tittle --}}
        <h3 class="card-title">{{ $books[0]->tittle }}</h3>
    {{-- Author --}}
    <p>
         <small class="text-muted">
        By. <a href="/books?author={{ $books[0]->author->username }}" class="text-decoration-none">{{ $books[0]->author->name }}</a> in <a href="/books?category={{ $books[0]->category->slug }}" class="text-decoration-none">{{ $books[0]->category->name}}</a> {{ $books[0]->created_at->diffForHumans() }}
            </small>
    </p>
    {{-- Excerpt --}}
    <p class="card-text">{{ $books[0]->excerpt }}</p>
        <a href="/book/{{ $books[0]->slug }}" class="text-decoration-none btn btn-dark">Read more</a>
        </div>
</div>
 
{{-- Books --}}
<div class="container">
    <div class="row">
        @foreach ($books->skip(1) as $book)            
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)"><a href="/books?category={{ $book->category->slug }}" class="text-decoration-none text-white">{{ $book->category->name }}</a></div>
                {{-- Image --}}
                @if ($book->image)
                <div style="max-height:500px; overflow:hidden;">
                    <img src="{{ asset('storage/' .$book->image) }}" class="card-img-top img-fluid" alt="{{ $book->category->name }}"> 
                </div>
    
                @else
                <img src="https://source.unsplash.com/500x500?{{ $book->category->name }}" class="card-img-top" alt="{{ $book->category->name }}">
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $book->tittle}}</h5>
                  <p>
                    <small class="text-muted">
                    By. <a href="/books?author={{ $book->author->username }}" class="text-decoration-none">{{ $book->author->name}}</a>
                     {{ $book->created_at->diffForHumans() }}
                    </small>
                </p>
                  <p class="card-text">{{ $book->excerpt }}</p>
                  <a href="/book/{{ $book->slug }}" class="btn btn-dark">Read more</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>


@else
       <p class="text-center fs-4">No Book Found.</p>
@endif

{{-- Pages --}}
<div class="justify-content-center" style="display: flex; align-items: center;">
    {{ $books->links()}}
</div>


@endsection

