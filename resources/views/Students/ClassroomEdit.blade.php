@extends('layout.studentlayout')
@section('content')
    <div class="container mt-3 col-4">
        <h1 class="text-center bg-dark text-white rounded mt-2 mb-2">Edit Classroom</h1>
        <div class="card p-3">
            @if (session()->has('classadd'))
                <div class="alert alert-success text-center">{{ session()->get('classadd') }}</div>
            @endif
            <form action="{{ url('/classroom/'.$classrooms->id.'/edit') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Class Name</label>
                  <input type="text" name="class_name" id="" class="form-control @error('class_name') is-invalid @enderror" placeholder="" value="{{ $classrooms->class_name }}">
                  @error('class_name')
                  <small id="helpId" class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
               <div class="form-group">
                 <label for="">Class Description</label>
                 <textarea class="form-control" name="class_desc" id="" rows="3">{{ $classrooms->class_desc }}</textarea>
               </div>
               <div class="form-group">
                 <label for="">Status</label>
                 <select class="form-control" name="status" id="">
                   <option></option>
                   @if ($classrooms->status=='Active')   
                   <option selected>Active</option>
                   <option>Inactive</option>
                   @elseif ($classrooms->status=='Inactive')
                   <option >Active</option>
                   <option selected>Inactive</option>
                   @endif
                 </select>
                 <button class="btn btn-primary mt-3">Update Classroom</button>
                 <a href="{{ url('/classroom/view') }}" class="btn btn-secondary mt-3">Cancel</a>
               </div>
            </form>
        </div>
    </div>
@endsection