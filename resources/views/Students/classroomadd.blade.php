@extends('layout.studentlayout')
@section('content')
    <div class="container mt-3 col-4">
        <h1 class="text-center bg-dark text-white rounded mt-2 mb-2">Classroom</h1>
        <div class="card p-3">
            @if (session()->has('classadd'))
                <div class="alert alert-success text-center">{{ session()->get('classadd') }}</div>
            @endif
            <form action="{{ url('/classroom/add') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Class Name</label>
                  <input type="text" name="class_name" id="" class="form-control @error('class_name') is-invalid @enderror" placeholder="" aria-describedby="helpId">
                  @error('class_name')
                  <small id="helpId" class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
               <div class="form-group">
                 <label for="">Class Description</label>
                 <textarea class="form-control" name="class_desc" id="" rows="3"></textarea>
               </div>
               <div class="form-group">
                 <label for="">Status</label>
                 <select class="form-control" name="status">
                   <option>Active</option>
                   <option>Inactive</option>
                 </select>
                 <button class="btn btn-primary mt-3 d-flex mx-auto">Add Classroom</button>
               </div>
            </form>
        </div>
    </div>
@endsection