@extends('layouts.app')
@section('content')

<div class="container w-50">
<div class="card">
    <div class="card-header">
        Xoş gəldiniz !
    </div>
    <div class="card-body">
        Bu hesap 'admin' hesabı deyildir !
        Profilinizə baxmaq üçün <a class="btn btn-primary px-2 py-0" href="{{ route('profile') }}"
                                       >
                                        {{ __('Klikləyin') }}
                                    </a>
    </div>
</div>
</div>

@endsection