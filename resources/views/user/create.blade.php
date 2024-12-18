@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Register</h1>
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Name">
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('name')}}" placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password">
                </div>


                <button type="submit" class="btn btn-primary">Register</button>
                <a class="ms-3" href="{{route('login')}}">Already registered?</a>
            </form>
        </div>
    </div>

@endsection
