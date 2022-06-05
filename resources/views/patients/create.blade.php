@extends('layouts.app')

@section('content')
    {{-- Display a form to enter patient's records --}}
    <div class="container">
        <form action="/patients" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-grou">
                <label for="gender">Gender</label>

                <label for="male">
                    <input type="radio" name="gender" id="male" value="male">
                    Male
                </label>
                <label for="female">
                    <input type="radio" name="gender" id="female" value="female">
                    Female
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    @endsection
