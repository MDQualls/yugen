@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card__header card--grey">{{ __('Register') }}</div>

            <div class="card__body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form__group">
                        <label for="name" class="form__label">{{ __('Name') }}</label>
                        <div>
                            <input id="name" type="text" class="form__control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form__group">
                        <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>
                        <div>
                            <input id="email" type="email" class="form__control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group bottom-margin-rem4">
                        <label for="password-confirm"
                               class="form__label">{{ __('Confirm Password') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="form__control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form__group">
                        <button type="submit" class="btn btn--primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
