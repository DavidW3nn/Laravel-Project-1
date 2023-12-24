@extends('layouts/main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <main class="form-registration">
     
          <h1 class="h3 mbß-3 fw-normal">Registration Form</h1>

            <form action="/register" method="post" class="text-center mt-5">
                {{-- Mengatasi cross site request forgery --}}
                @csrf
                {{-- Icon --}}
              <img class="mb-4" src="/img/logoApple.png" alt="" width="40" height="40">
                
              {{-- Name --}}
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top 
                @error('name') is-invalid  @enderror"  id="name" placeholder="Name" value="{{ old('name') }}" required>
                <label for="name">Name</label>
                {{-- Message Error --}}
                @error('name')
                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              {{-- Username --}}
              <div class="form-floating">
                <input type="text" name="username" class="form-control
                @error('username') is-invalid @enderror " id="username" placeholder="Username" value="{{ old('username') }}" required>
                <label for="username">Username</label>
                {{-- Message Error --}}
                @error('username')
                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              {{-- Email --}}
              <div class="form-floating">
                <input type="email" name="email" class="form-control 
                @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>
                <label for="email">Email address</label>
                @error('email')
                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              {{-- Password --}}
              <div class="form-floating">
                <input type="password" name="password" class="form-control
                @error('password') is-invalid @enderror " id="password" placeholder="Password" value="{{ old('password') }}" required>
                <label for="password">Password</label>
                {{-- Message Error --}}
                @error('password')
                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                    {{ $message }}
                  </div>
                @enderror
              </div>


              <small class="d-block text-end mt-3">Already Registered? <a href="/login" class="text-decoration-none">Login!</a></small>

              <button class="w-100 btn btn-lg btn-dark mt-3" type="submit">Registration</button>
            </form>
           
          </main>
    </div>
</div>
@endsection