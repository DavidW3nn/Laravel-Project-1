@extends('layouts/main')

@section('container')
<h1>Book Categories</h1>
<div class="container">
    <div class="row">
    @foreach ($categories as $category)
        <div class="col-md-4 mt-5">
            <a href="/books?category={{ $category->slug }}">
                <div class="card bg-dark text-white hover-zoom">
                    <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-end">
                        <h3 class="card-title ">{{ $category->name }}</h3>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    </div>
</div>


@endsection