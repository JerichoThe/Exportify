@extends('layouts.main')

@section('container')
   <div class="row justify-content-center">
      <div class="col-lg-4">
         <main class="form-registration">
            <h1 class="text-center mb-4" width="72" height="57" style="color: #388E3C">Exportify</h1>
            <h1>Register Form : </h1>
            <form action="/register" method="post">
               @csrf
               <div class="form-floating">
                  <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                     required id="name" placeholder="name" value="{{ old('name') }}">
                  <label for="name">Name</label>
                  @error('name')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="form-floating">
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                     id="username" placeholder="username" required value="{{ old('username') }}">
                  <label for="nausernameme">Username</label>
                  @error('username')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="form-floating">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                     id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  <label for="email">Email address</label>
                  @error('email')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="form-floating">
                  <input type="password" name="password"
                     class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                     placeholder="Password" required>
                  <label for="password" style="left: 0; right: auto;">Password</label>
                  @error('password')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <button class="w-100 btn btn-lg text-light mt-3" style="background-color: #388E3C"
                  type="submit">Login</button>
            </form>
            <small class="d-block mt-3">Already Registered? <a href="/login">Login Now!</a></small>
         </main>
      </div>
   </div>
@endsection
