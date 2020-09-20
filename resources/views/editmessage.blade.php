@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center p-0">
        <div class="col-md-8 m-0">
        @empty(!$errors->all())
                    <div class="alert alert-danger" role="alert">
                        Inputlari doldurun !
                    </div>
                    @endempty
                    @empty(!$_POST)
                    <div class="alert alert-success" role="alert">
                        Mesajlar yadda saxlanildi ! Qeyd etdiyiniz vaxtda gonderilecek
                    </div>
                    @endempty

            <div class="card my-auto">
                <div class="card-header">
                    Edit message
                </div>
                <div class="card-body py-2">
                    
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Mail multiple select</label>
                            <select name="email[]" multiple class="form-control" id="exampleFormControlSelect2">
                            @foreach($users as $user)
                                @empty(!in_array($user->id,$received))
                                    <option selected value="{{$user->id}}">{{$user->email}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                @endif
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Heftenin gunu</label>
                            <select name="weekday" class="form-control" id="exampleFormControlSelect1">
                                @foreach(range(1, 7) as $i)
                                @if($message->weekday==$i)
                                <option selected value="{{$i}}">{{$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                                @endforeach


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Saat : </label>
                            <input value="{{$message->hour}}" name="hour" placeholder="00:00" type="time"
                                class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Mail title</label>
                            <input value="{{$message->subject}}" name="title" placeholder="Title" type="text"
                                class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mail content</label>
                            <textarea name="content" class="form-control" id="exampleFormControlTextarea1"
                                rows="3">{{$message->content}}</textarea>
                        </div>
                        <input type="submit" value="GONDER" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        @endsection
