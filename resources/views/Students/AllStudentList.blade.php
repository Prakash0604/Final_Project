@extends('layout.studentlayout')
@section('content')
<div class="container">
    <div class="container col-5 mb-3">
        <div class="card p-3">
            <form action="" method="get">
                {{-- @csrf   --}}
                <div class="form-group col-md-12">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="">
                    <option value="">Select All</option>
                    <option value="Active"{{ Request::get('status')=='Active' ? 'selected':'' }}>Active</option>
                    <option value="Inactive"{{ Request::get('status')=='Inactive' ? 'selected':'' }}>Inactive</option>
                  </select>
                </div>
                <button class="btn btn-primary mb-3">Filter</button>
            </form>
        </div>
    </div>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Student Name</th>
                    <th>Address</th>
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
                    <td>@if($student->status!='Active')
                    <span class="badge badge-pill bg-danger">Inactive</span>
                    @else
                    <span class="badge badge-pill bg-success">Active</span>
                    @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
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
    <div class="container mt-3">
        {{ $students->links() }}
    </div>
</div>
    
@endsection