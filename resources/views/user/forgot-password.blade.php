@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Востановление пароля</h1>
            <form action="{{route('password.email')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        name="email"
                        id="email"
                        type="text"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email"
                        value="{{old('email')}}"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>





                <button type="submit" class="btn btn-primary">Send</button>
{{--                <a href="{{route('password.request')}}" class="ms-2">Забыли пароль?</a>--}}
            </form>
        </div>
    </div>

@endsection

