@extends('layout.layout1')
@section('content')
<div class="form signup p-2 mt-3">
  <header>Signup</header>
  @if (session()->has('register'))
    <div class="alert alert-success text-center">{{ session()->get('register') }}</div>
  @endif
  @if (session()->has('referalcode'))
    <div class="alert alert-success text-center">{{ session()->get('referalcode') }}</div>
  @endif
  @if (session()->has('codeinv'))
    <div class="alert alert-danger text-center">{{ session()->get('codeinv') }}</div>
  @endif
  <form action="{{ url('/register') }}" method="POST">
    @csrf
    <input type="text" placeholder="Full name"  name="full_name"  class=" p-3 form-control @error('full_name') is-invalid @enderror" />
    @error('full_name')
      <span class="text-danger">{{ $message }}</span>
    @enderror
    <input type="text" placeholder="Email address" name="email"  class="p-3 form-control @error('email') is-invalid @enderror"  />
    @error('email')
    <span class="text-danger">{{ $message }}</span>
   @enderror
    <input type="password" placeholder="Password" name="password"  class="p-3 form-control @error('password') is-invalid @enderror"  />
    @error('password')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <input type="text" placeholder="Refer code(Optional)" name="referal_code"  class=" p-3 form-control"  />
    <button class="btn btn-warning btn-lg">Signup</button>
  </form>
  <div class="text-white mt-3">
    Already registered ? <a href="{{ url('/login') }}" class="text-white ">Login now</a>
  </div>
</div>
@endsection



