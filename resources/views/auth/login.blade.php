@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card__header card--dark">
                {{ __('Login') }}
            </div>

            <div class="card__body">

                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form__group">
                        <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>
                        <div>
                            <input id="email" type="email" class="form__control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form__group">
                        <label for="password" class="form__label">{{ __('Password') }}</label>
                        <div>
                            <input id="password" type="password"
                                   class="form__control @error('password') is-invalid @enderror" name="password"
                                   required
                                   autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form__group">
                        <div class="form__check">
                            <input class="form__check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form__check-label1" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form__group">
                        <button type="submit" class="btn btn--primary">
                            {{ __('Login') }}
                        </button>

                        <div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
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
