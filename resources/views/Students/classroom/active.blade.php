@extends('layout.studentlayout')
@section('content')
<div class="container">
    <h1 class="text-center bg-dark text-white col-5 d-flex mx-auto rounded mb-4 ">Active Class list</h1>
    <div class="card">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>S.n</th>
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>Status</th> 
                </tr>
            </thead>
            <tbody>
                @php
                    $n=1;
                @endphp
                @if ($active)
                    
                @forelse ($active as $class )
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
                </tr>
                @php
                    $n=$n+1;
                @endphp
                @empty
                <tr>
                    <td colspan="4" class="text-center">No data available</td>
                </tr>
                @endforelse 
                @endif
            </tbody>
        </table>
    </div>
    <div class="container mt-3">
        {{ $active->links() }}
    </div>

</div>
    
@endsection