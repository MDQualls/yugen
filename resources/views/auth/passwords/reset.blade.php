@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card__header">{{ __('Reset Password') }}</div>

            <div class="card__body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form__group">
                        <label class="form__label" for="email" class="form__label">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email"
                               class="form__control @error('email') is-invalid @enderror" name="email"
                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form__group">
                        <label for="password" class="form__label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form__control"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form__group bottom-margin-rem4">
                        <label for="password-confirm"
                               class="form__label">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form__control"
                               name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <div class="form__group">
                        <button type="submit" class="btn btn--primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
