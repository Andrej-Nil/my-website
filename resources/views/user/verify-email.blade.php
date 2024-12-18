@extends('layouts.app')

@section('title', 'Verify email')

@section('content')
    <h1>verify email</h1>

    <div class="alert alert-info" role="alert">
        Спасибо за регистрацию.Для того что бы получить все возможности учетной записи,
        подтвертите ваш аккаун использовав ссылку в писме на почте которую вы указали при создания аккаунта
    </div>
    <div>
        Не пришло письмо?
        <form action="" method="post">
            @csrf
            <button type="submit" class="btn btn-link ps-0">Отправить повторно</button>
        </form>
    </div>
@endsection
