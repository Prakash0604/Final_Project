@extends('layout.layout1')
@section('content')
<div class="form signup">
    <header>Login</header>
    @if (session()->has('invalid'))
      <div class="alert alert-danger text-center">{{ session()->get('invalid') }}</div>
    @endif
    <form action="" method="POST">
      @csrf
      <input type="text" placeholder="Email address" name="email"  class=" form-control @error('email') is-invalid @enderror"  />
      @error('email')
      <span class="text-danger">{{ $message }}</span>
     @enderror
      <input type="password" placeholder="Password" name="password"  class="form-control @error('password') is-invalid @enderror"  />
      @error('password')
      <span class="text-danger">{{ $message }}</span>
      @enderror
      <button class="btn btn-warning btn-lg">Login</button>
    </form>
    <div class="text-white mt-3">
      Not registered yet? <a href="{{ url('/register') }}" class="text-white ">Register now</a>
    </div>
  
  </div>
  
@endsection