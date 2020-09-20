@extends('layouts.app')
@section('content')
<div class="container w-50">

    <div class="card-header">{{ __('Mesaj qutusu') }}</div>

    @if(count($messages)==0)
        <div class="card px-2 py-3 text-danger">
            Göndəriləcək mesajlar qutusu boşdur.
        </div>
    @endif
    @foreach($messages as $message)
    <ul class="list-group list-group">
        <li class="list-group-item">
            <div class="float-left">
            <span class="text-primary text-small float-left w-100 px-0 pt-1"> {{$message->subject}} </span>
            <sub class="text-muted">{{$message->updated_at->diffForHumans()." -> H/gunu: ".$message->weekday." Saat: ".$message->hour}}</sub>
            </div>
            <div class="float-right py-2">
                <a class="mx-1 px-3 py-0 btn btn-danger"
                    href="{{route('get.messagepanel').'/delete/'.$message->id}}">&#9986</a>

                <a class="mx-1 px-3 py-0 btn btn-danger"
                    href="{{route('get.messagepanel').'/edit/'.$message->id}}">&#9998;</a>
            </div>

        </li>
    </ul>
    @endforeach
    {{ $messages->links('paginator') }}

    <br>
</div>

</div>
@endsection
