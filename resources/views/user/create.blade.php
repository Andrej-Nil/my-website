@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Register</h1>
            <form action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password">
                </div>


                <button type="submit" class="btn btn-primary">Register</button>
                <a class="mr-3" href="{{route('login')}}">Already registered?</a>
            </form>
        </div>
    </div>

@endsection
