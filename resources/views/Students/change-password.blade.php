@extends('layout.studentlayout')
@section('content')
<div class="container col-4">
    <div class="card p-3">
      @if (session()->has('current_password'))
        <div class="alert alert-danger text-center">{{ session()->get('current_password') }}</div>
      @endif
      @if (session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
      @endif
        <form action="" method="post">
          @csrf
            <div class="form-group">
              <label for="">Current Password</label>
              <input type="password" name="ctpassword" id="" class="form-control" placeholder="Current Password">
              @error('ctpassword')
              <small id="helpId" class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="">New Password</label>
              <input type="password" name="npassword" id="" class="form-control" placeholder="New Password">
              @error('npassword')
              <small id="helpId" class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Confirm Password</label>
              <input type="password" name="cpassword" id="" class="form-control" placeholder="Confirm Password">
              @error('cpassword')
              <small id="helpId" class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button class="btn btn-primary">Change Password</button>
          </form>
    </div>
</div>
    
@endsection