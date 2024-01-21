@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

    <div class="login-form__content">
        <div class="stamping__message">
        @if (Session::has('message'))
            <div class="logout__message">
                <div class="message__container">
                    <div class="message-item">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif
        </div>

    <div class="logoin-form__heading">
        <h2>ログイン</h2>
    </div>
    <form class="form"  action="/login" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="password" name="password" placeholder="パスワード"  value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>

    </form>

    <div class="register-link">
        <div class="register-link__content">
            <span class="register-link__text">アカウントをお持ちでない方はこちらから</span>
            <div class="register-link_item">
                <a href="/register">会員登録</a>
            </div>    
        </div>
    </div>
</div>

@endsection
   