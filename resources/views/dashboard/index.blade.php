@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back ,{{ auth()->user()->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0"></div>
</div>

<div class="row">
  @can('admin')
    {{-- Total Users Yang hanya bisa dilihat admin --}}
    <div class="card col-sm-3 bg-success rounded p-3 m-3" style="color:white">
      <div class="card-body">
        <h2 class="card-title">All Users</h2>
        <hr>
        <div class="row justify-content-center align-items-center">
          <div class="col-sm-6 text-center">
            <h3>{{ $allUsers }}</h3>
          </div>
          <div class="col-sm-6 text-center">
            <span class="fs-4" data-feather="book"></span>
          </div>
        </div>
      </div>
    </div>
  @endcan

  
   {{-- Total Buku --}}
   <div class="card col-sm-3 bg-primary rounded p-3 m-3" style="color:white">
    <div class="card-body">
      @if (Gate::allows('admin'))
        <h2 class="card-title">All Books</h2>
      @else
        <h2 class="card-title">My Books</h2>
      @endif
      <hr>
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-6 text-center">
          @if (Gate::allows('admin'))
           <h3>{{ $allBooks }}</h3>
          @else
           <h3>{{ $myBooks }}</h3>
          @endif
        </div>
        <div class="col-sm-6 text-center">
          <span class="fs-4" data-feather="book"></span>
        </div>
      </div>
    </div>
  </div>
  
   {{-- Total Category --}}
   <div class="card col-sm-3 bg-danger rounded p-3 m-3" style="color:white">
    <div class="card-body">
    @if (Gate::allows('admin'))
      <h2 class="card-title">All Categories</h2>
    @else
      <h2 class="card-title">My Categories</h2>
     @endif
      <hr>
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-6 text-center">
        @if (Gate::allows('admin'))
         <h3>{{ $allCategories }}</h3>
        @else
         <h3>{{ $myCategories }}</h3>
         @endif
        </div>
        <div class="col-sm-6 text-center">
          <span data-feather="grid"></span>
        </div>
      </div>
    </div>
  </div>
  

</div>

  @endsection