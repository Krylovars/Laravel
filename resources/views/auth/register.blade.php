@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <div class="container">
        <form action="{{ route('register_process') }}" class="max-w-md mt-32 mx-auto" method="POST">
            @csrf
            {{-- <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>

                @error('email')
                    <p>Ошибка ввода -</p>
                @enderror

            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>


            <div class="form-floating">
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation"
                    placeholder="Password">
                <label for="password_confirmation">Password Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

            <a href="{{ route('login') }}">Вход </a>
        </form>
    </div>

@endsection
