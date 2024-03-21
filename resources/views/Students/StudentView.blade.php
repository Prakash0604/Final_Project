@extends('layout.studentlayout')
@section('content')
<div class="container">
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Classroom</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $n=1;
                @endphp
                @forelse ($students as $student ) 
                <tr>
                    <td>{{ $n }}</td>
                    <td>
                        @if ($student->stu_image!="")
                        <img src="{{ asset('storage/images/'.$student->stu_image) }}" alt="images" width="100px" height="100px" class=" rounded-circle" >
                        @else
                        <img src="{{ asset('images/avtarimage.png') }}" alt="images" width="100px" height="100px" class=" rounded-circle" >
                        @endif
                    </td>
                    <td>{{ $student->stu_name }}</td>
                    <td>{{ $student->stu_address }}</td>
                    <td>{{ $student->class_name }}</td>
                    <td>@if($student->status!='Active')
                    <span class="badge badge-pill bg-danger">Inactive</span>
                    @else
                    <span class="badge badge-pill bg-success">Active</span>
                    @endif
                    </td>
                    <td>
                        <a href="">
                        <button class="btn btn-primary">Edit</button>
                        </a>
                    </td>
                </tr>
                @php
                    $n=$n+1;
                @endphp
                @empty
                <tr>
                    <td colspan="7" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    
@endsection