@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center p-0">
        <div class="col-md-8 m-0">
        @empty(!$errors->all())
                <div class="alert alert-danger " role="alert">
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
                    Mesaj göndər
                </div>
                <div class="card-body py-2">
                
                    <form method="post" action="{{route('post.home')}}">
                    @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Maili alanlar</label>
                            <select name="email[]" multiple class="form-control" id="exampleFormControlSelect2">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Həftənin günü</label>
                            <select name="weekday" class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Saat : </label>
                            <input name="hour" placeholder="00:00" type="time" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Mail başlığı</label>
                            <input name="title" placeholder="Title" type="text" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mail kontenti</label>
                            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <input type="submit" value="GONDER" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        @endsection
