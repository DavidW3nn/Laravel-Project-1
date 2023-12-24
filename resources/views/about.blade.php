@extends('layouts/main')

@section('container')
    <h1>{{ $name }}</h1>
    <h3>{{ $email }}</h3>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="200" height="200" class="img-thumbnail rounded-circle">

@endsection