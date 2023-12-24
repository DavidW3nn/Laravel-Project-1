@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Book Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>

    {{-- Table Books --}}
    <div class="table-responsive col-lg-8">
      {{-- Add Data --}}
      <a href="/dashboard/categories/create" class="btn btn-primary"><span data-feather='plus-circle'></span> Create New Category</a>
        {{-- Flash Message Success create book--}}
              @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
        {{-- Flash Message --}}
        <table class="table table-striped table-sm mt-3">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
              

                <td>
                    {{-- Detail --}}
                    <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-dark"><span data-feather='eye'></span></a>
                    {{-- Edit --}}
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning mt-1"><span data-feather='edit'></span></a>

                     {{-- Delete --}}
                     <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather='x-circle'></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection