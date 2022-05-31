@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <center>
                <img src="{{$data[0]['image']}}" alt="logo" style="height: 300px;">
                <p class="center">
                    <a href="{{route('kader-anggotaDpk', $data[0]['id'])}}">Lihat Anggota DPK</a>
                </p>  
            </center>  
        </div>
        <div class="col-sm-9">
            <h1 class="text-center" style="color: #8B0000;">{{$data[0]['nama']}}</h1>
            <p class="text text-center"><b>{{$data[0]['universitas']}} / {{$data[0]['tipe']}}</b></p>
            <p class="text text-center">{{$data[0]['bio']}}</p>
        </div>
    </div>
</div>
@endsection
