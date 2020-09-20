@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email adresinizi doğrulayın') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Email adresinizə link göndərildi') }}
                        </div>
                    @endif

                    {{ __('Davam etməzdən əvvəl doğrulama linkini yoxlayın.') }}
                    {{ __('Link göndərilməyibsə') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klikləyin') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
