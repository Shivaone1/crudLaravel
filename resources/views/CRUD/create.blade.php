@extends('CRUD.Layout.main')

@section("main-container")
<div class="container">
    <h1>CREATE STUDENT</h1>
    <div class="text-end">
        <span class="btn btn-info text-right"><a href="{{url('/')}}"> <i class="fa fa-users"></i></a></span>
    </div>
    <form action="{{url('/store')}}" method="post" id="studentForm">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" min="10" max="10" pattern="[0-9]{10}" required>
        <!-- The pattern attribute enforces 10 digits for the mobile number -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <input type="submit" value="Submit">
    </form>
</div>
<script>
    function sdjfskld() {

    }
</script>
@stop