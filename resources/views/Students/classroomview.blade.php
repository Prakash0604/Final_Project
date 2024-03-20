@extends('layout.studentlayout')
@section('content')
<div class="container">
</div>
<div class="container">
    <h1 class="text-center bg-dark text-white col-3 d-flex mx-auto rounded mt-3 mb-4">Classroom</h1>
    <div class="card p-3">
        @if (session()->has('update'))
            <div class="alert alert-success text-center">{{ session()->get('update') }}</div>
        @endif
        @if (session()->has('nodata'))
            <div class="alert alert-danger text-center">{{ session()->get('nodata') }}</div>
        @endif
        @if (session()->has('delete'))
            <div class="alert alert-success text-center">{{ session()->get('delete') }}</div>
        @endif
        <form action="" method="get">
            <div class="form-group col-7">
              <input type="search" name="" id="" class="form-control" placeholder="Enter any word to search" aria-describedby="helpId">
              <button class="btn btn-primary mt-3">Search</button>
            </div>
        </form>
    
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>S.n</th>
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $n=1;
                @endphp
                @forelse ($classes as $class )
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $class->class_name }}</td>
                    <td>{{ $class->class_desc }}</td>
                    <td>@if($class->status!='Active')
                        <span class="badge badge-pill bg-danger">Inactive</span>
                        @else
                        <span class="badge badge-pill bg-success">Active</span>
                        @endif
                    </td>
                    <td>
                       <a href="{{ url('classroom/'.$class->id.'/edit') }}" class="btn btn-primary mt-3">Edit</a>
                       <a href="{{ url('classroom/'.$class->id.'/delete') }}" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                    </td>
                </tr>
                @php
                    $n=$n+1;
                @endphp
                @empty
                <tr>
                    <td colspan="5" class="text-center">No data available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    
@endsection