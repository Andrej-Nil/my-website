@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Login</h1>
            <form action="{{route('login.auth')}}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="Email">

                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password">

                </div>


                <div class="form-check">
                    <input name="remember" class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{route('password.request')}}" class="ms-2">Забыли пароль?</a>
            </form>
        </div>
    </div>

@endsection

