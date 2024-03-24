@extends('layout.studentlayout')
@section('content')
<div class="container d-flex mr-3 p-3">
    <div class="card col-3 p-3 mr-4 text-center">
        <h3>Class</h3>
        <a href="{{ url('reports/classroom/active') }}" style="text-decoration: none;" class="text-dark">Active</a>
        <a href="{{ url('reports/classroom/inactive') }}" style="text-decoration: none" class="text-dark">Inactive</a>
    </div>
    <div class="card col-3 p-3 mr-4 text-center">
        <h3>Students</h3>
        <a href="{{ url('reports/students/active') }}" style="text-decoration: none;" class="text-dark">Active</a>
        <a href="{{ url('reports/students/inactive') }}" style="text-decoration: none" class="text-dark">Inactive</a>
    </div>
</div>
    
@endsection