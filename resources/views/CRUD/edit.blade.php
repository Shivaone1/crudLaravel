@extends('CRUD.Layout.main')

@section("main-container")
<div class="container">
    <h1>UPDATE STUDENT</h1>
    <div class="text-end">
        <span class="btn btn-info text-right"><a href="{{url('/')}}"> <i class="fa fa-user"></i></a></span>
    </div>
    <form action="{{url('/store-edit')}}" method="post" id="studentForm">
        @csrf
        @foreach($getEditData as $c)
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$c->name}}" required>
        <input type="hidden" id="ID" name="ID" value="{{ $c->ID}}">
        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" min="10" max="10" pattern="[0-9]{10}" value="{{$c->mobile}}" required>
        <!-- The pattern attribute enforces 10 digits for the mobile number -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$c->email}}" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="{{$c->city}}" required>
        @endforeach
        <input type="submit" value="Submit">
    </form>
</div>
<script>
    function sdjfskld() {

    }
</script>
@stop