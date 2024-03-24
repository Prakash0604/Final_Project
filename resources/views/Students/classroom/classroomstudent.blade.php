@extends('layout.studentlayout')
@section('content')
<div class="container">
    <div class="card">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>S.n</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $n=1
                @endphp
                @forelse ( $classstu as $stu )
                <tr>
                    <td scope="row">{{ $n }}</td>
                    <td>{{ $stu->stu_name }}</td>
                    <td>@if ($stu->status!="Active")
                        <span class="badge badge-pill badge-danger">Inactive</span>
                        @else
                        <span class="badge badge-pill badge-success">Active</span>

                    @endif
                </td>
                </tr>
                @php
                    $n=$n+1;
                @endphp
                @empty
                <tr>
                    <td colspan="3" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    
@endsection