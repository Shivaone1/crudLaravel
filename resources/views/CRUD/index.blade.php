@extends('CRUD.Layout.main')

@section("main-container")
<h1 class="mt-5">List of Student</h1>
<div class="text-end me-2">
    <a href="{{url('/create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>City</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $s=1;
        $getData=DB::table('student')->get();
        @endphp
        @foreach($getData as $c)
        <tr>
            <td>{{ $s++;}}</td>
            <td>{{ $c->name}}</td>
            <td>{{ $c->mobile}}</td>
            <td>{{ $c->email}}</td>
            <td>{{ $c->city}}</td>
            <td>
                <a href=""><i class="fa fa-edit"></i></a> <a href="{{ url('/delete/' . $c->ID) }}"><i class="fa fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    function addStudent() {
        alert("Hello Add This Record");
    }
</script>
@stop