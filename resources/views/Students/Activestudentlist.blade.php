@extends('layout.studentlayout')
@section('content')
    <div class="container">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($activestudent as $active ) 
                    <tr>
                        <td>{{ $n }}</td>
                        <td>{{ $active->stu_name }}</td>
                        <td>@if ($active->status="Active")
                            <span class="badge badge-pill badge-success">Active</span>
                        @endif
                    </td>
                    </tr>
                    @php
                        $n=$n+1;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection