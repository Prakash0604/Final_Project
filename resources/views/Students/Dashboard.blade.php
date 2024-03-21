@extends('layout.studentlayout')
@section('content')
    <div class="container">
        <h1 class="text-center bg-dark text-white rounded mt-2 mb-2">Dashboard</h1>
        <div class="card p-3">
            <h3 class="text-center rounded mt-2 mb-2">Class Record</h3>
            <table class="table text-center table-bordered">
                <thead>
                    <tr>
                        <th>Total Class</th>
                        <th>Active class</th>
                        <th>Inactive Class</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{ $totalclass }}</td>
                        <td><a href="{{ url('reports/classroom/active') }}" class="btn btn-warning">{{ $classactive }}</a></td>
                        <td><a href="{{ url('reports/classroom/inactive') }}" class="btn btn-danger">{{ $classinactive }}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection