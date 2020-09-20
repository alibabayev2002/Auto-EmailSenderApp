@extends('layouts.app')

@section('content')
<div class="container w-50">
    <div class="card">
        <div class="card-header">
            Profil
        </div>
        <div class="card-body">
            <form method="post" action="{{route('profile.edit')}}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" disabled value="{{Auth::user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <input required value="{{Auth::user()->type}}" disabled type="text" class="form-control" id="exampleInputPassword1" placeholder="Ad">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ad</label>
                    <input name="name" required value="{{Auth::user()->name}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="Ad">
                </div>
                <button type="submit" class="btn btn-primary">Dəyiş</button>
                <a class="btn btn-danger" href="{{route('get.profiledelete')}}">HESABI SİL</a>
            </form>
        </div>
    </div>
</div>
@endsection
