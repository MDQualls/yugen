@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="card card--grey">
            <div class="card__header">{{ __('Reset Password') }}</div>

            <div class="card__body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p class="p__content--lead">
                    Enter your registered email address. If your email is valid you will receive instructions
                    on resetting your password. If you don't see the instructions in your inbox or promotions
                    tab, please check your spam folder.
                </p>


                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form__group bottom-margin-rem4">
                        <label for="email"
                               class="form__label">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="form__control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form__group">

                            <button type="submit" class="btn btn--primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
