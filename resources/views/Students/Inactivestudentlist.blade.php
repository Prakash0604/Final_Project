@extends('layout.studentlayout')
@section('content')
    <div class="container">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Inactive</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($inactivestudent as $inactive ) 
                    <tr>
                        <td>{{ $n }}</td>
                        <td>{{ $inactive->stu_name }}</td>
                        <td>@if ($inactive->status=="Inactive")
                            <span class="badge badge-pill badge-danger">Inactive</span>
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