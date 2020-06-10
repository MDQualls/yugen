@extends('layouts.app')

@section('content')
        <div class="row">
                <div class="card">
                    <div class="card__header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card__body">
                        @if (session('resent'))

                            <div class="alert__container">
                                <div class="alert__container--alert alert__container--info" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            </div>
                            <script>
                                setTimeout(function() {
                                    jQuery('.alert__container').fadeOut("slow");
                                }, 5000);
                            </script>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.  If you cannot find the email in your inbox or promotions tab please check your spam folder. ') }}
                        <div class="top-margin-rem4">
                            <div class="bottom-margin-rem2">{{ __('If you did not receive the email') }},</div>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn--primary ">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
