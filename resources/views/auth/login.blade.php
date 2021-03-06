@extends('layouts.app')

@section('content')
    <div class="row">
        @include('partials.errors')

        <div class="card">
            <div class="card__header card--grey">
                {{ __('Login') }}
            </div>

            <div class="card__body">

                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form__group">
                        <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>
                        <div>
                            <input id="email" type="email" class="form__control @if($errors->any()) is-invalid @endif"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="form__group bottom-margin-rem4">
                        <label for="password" class="form__label">{{ __('Password') }}</label>
                        <div>
                            <input id="password" type="password"
                                   class="form__control @if($errors->any()) is-invalid @endif" name="password"
                                   required
                                   autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form__group bottom-margin-rem4">
                        <div class="form__check">
                            <input class="form__check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form__check-label" for="remember">
                                <span class="form__check-button"></span>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form__group">
                        <button type="submit" class="btn btn--primary">
                            {{ __('Login') }}
                        </button>

                        <div class="forgot-pass-link">
                            @if (Route::has('password.request'))
                                <a class="lead-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section("scripts")
@endsection
