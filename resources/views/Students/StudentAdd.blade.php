@extends('layout.studentlayout')
@section('content')
<div class="container col-8">
    <h1 class="text-center bg-dark text-white rounded">Registration Form</h1>
    <div class="card p-3">
      @if (session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
      @endif
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
         <div class="row">
          <div class="form-group col-md-6">
            <label for="">Student Name</label>
            <input type="text" name="stu_name" id="" class="form-control @error('stu_name') is-invalid @enderror" placeholder="Enter student name">
            @error('stu_name') 
            <small id="helpId" class="text-danger">{{ $message }}</small>
            @enderror
          </div>  
          <div class="form-group col-md-6">
            <label for="">Address</label>
            <input type="text" name="stu_address" id="" class="form-control @error('stu_address') is-invalid @enderror" placeholder="Enter your address">
            @error('stu_address') 
            <small id="helpId" class="text-danger">{{ $message }}</small>
            @enderror
          </div>     
        </div>   
        
         <div class="row">
          <div class="form-group col-md-4">
            <label for="">Contact Number</label>
            <input type="number" name="stu_contact" id="" class="form-control @error('stu_contact') is-invalid @enderror" placeholder="Enter contact number">
            @error('stu_contact') 
            <small id="helpId" class="text-danger">{{ $message }}</small>
            @enderror
          </div>  
          <div class="form-group col-md-4">
            <label for="">Gender</label>
            <select class="form-control" name="stu_gender" id="">
              <option></option>
              <option>Male</option>
              <option>Female</option>
              <option>Others</option>
            </select>
          </div>  
          <div class="form-group col-md-4">
            <label for="">Enroll Class</label>
            <select class="form-control" name="stu_class" id="">
              <option></option>
              @foreach ($classrooms as $class ) 
              <option value="{{ $class->id }}">{{ $class->class_name }}</option>
              @endforeach
            </select>
          </div>  
        </div>   
        
         <div class="row">
          <div class="form-group col-md-6">
            <label for="">Date of Birth</label>
            <input type="date" name="stu_dob" id="" class="form-control @error('stu_dob') is-invalid @enderror">
            @error('stu_dob') 
            <small id="helpId" class="text-danger">{{ $message }}</small>
            @enderror
          </div>  
          <div class="form-group col-md-3">
            <label for="">Profile</label>
            <input type="file" name="stu_image" id="" class="form-control @error('stu_image') is-invalid @enderror">
            @error('stu_image') 
            <small id="helpId" class="text-danger">{{ $message }}</small>
            @enderror
          </div>     
          <div class="form-group col-md-3">
            <label for="">Status</label>
            <select class="form-control" name="status" id="">
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>  
        </div>   
        <div class="form-group">
          <label for="">Description</label>
          <textarea class="form-control" name="" id="" rows="3"></textarea>
        </div>
        <button class="btn btn-primary d-flex mx-auto mr-4">Submit</button>
      </div>   
    </form>
  </div>
    
@endsection 

