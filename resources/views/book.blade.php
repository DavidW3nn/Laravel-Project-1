@extends('layouts/main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Judul --}}
                    <h1 class="mb-3">{{ $book->tittle }}</h1>

                {{-- Author and Category --}}
                <p>By. <a href="/books?author={{ $book->author->username }}"> {{ $book->author->name }}</a> in <a href="/books?category={{ $book->category->slug }}" class="text-decoration-none">{{ $book->category->name }}</a></p>

                {{-- Image --}}
                @if ($book->image)
                <div style="max-height:350px; overflow:hidden;">
                    <img src="{{ asset('storage/' .$book->image) }}" class="card-img-top img-fluid" alt="{{ $book->category->name }}"> 
                </div>
                @else
                <img src="https://source.unsplash.com/1200x500?{{ $book->category->name}}" class="card-img-top img-fluid" alt="{{ $book->category->name }}">
                @endif

                {{-- Body --}}
                <article class="my-3 fs-5">
                    {!! $book->body !!}
                </article>
                {{-- Button --}}
                {{-- Button untuk back --}}
                <button class="btn btn-dark"><a href="/books" class="text-decoration-none">Back</a></button>
            </div>
        </div>
    </div>


  



    <br><br>


@endsection