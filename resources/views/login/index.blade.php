@extends('layouts/main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8">
        <main class="form-signin">
          <h1 class="h3 mbß-3 fw-normal">Please Login</h1>
          {{-- Flash Message Success For Registered--}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          {{-- Flash Message --}}

           {{-- Flash Message Failed for Login--}}
           @if (session('loginError'))
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
             {{ session('loginError') }}
             <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
           </div>
           @endif
         {{-- Flash Message --}}

        
            <form class="text-center mt-5" method="post" action="/login">
              @csrf
              <img class="mb-4" src="/img/logoApple.png" alt="" width="40" height="40">
              {{-- Email --}}
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                <label for="email">Email address</label>
               @error('email')
                  <div id="validationServer03Feedback" class="invalid-feedback text-start">
                    {{ $message }}
                  </div>
               @enderror
              </div>

              
              {{-- Password --}}
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" value="{{ old('password') }}" required>
                <label for="password">Password</label>
                @error('password')
                  <div id="validationServer03Feedback" class="invalid-feedback text-start">
                    {{ $message }}
                  </div>
                @enderror
              </div>
          
              <button class="w-100 btn btn-lg btn-dark mt-3" type="submit">Login</button>
            </form>
            <small class="d-block text-end mt-3">Not a member? <a href="/register" class="text-decoration-none">Register Now!</a></small>
          </main>
    </div>
</div>
@endsection