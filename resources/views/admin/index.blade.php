@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <img src="{{asset('assets/img/logogmni.png')}}" alt="logo" style="height: 300px;">
        </div>
        <div class="col-sm-8">
            <h1 class="text-center" style="color: #8B0000;">GMNI</h1>
            <p class="text text-center">Sebagai organisasi perjuangan maka setiap kader GMNI tidak saja dituntut berjuang dan 
                berpihak pada kepentingan rakyat tetapi sekaligus berjuang bersama-sama rakyat untuk 
                melawan segala macam bentuk penindasan yang diakibatkan oleh sistem kapitalisme, 
                imperialisme, kolonialisme dan feodalisme.</p>
            <p class="text text-center">Daftarkan admin baru disini <br> <a href="{{route('registerAdmin')}}"> Register Admin</a>
                <br> Daftarkan ketua baru disini <br> <a href="{{route('registerKetua')}}"> Register Ketua DPK</a>
                <br> Daftarkan kader baru disini <br> <a href="{{route('registerKader')}}"> Register Kader</a>
                <br> Daftarkan dpk baru disini <br> <a href="{{route('addDpk')}}"> Tambah DPK</a>
                <br> Tambah library baru disini <br> <a href="{{route('addLibrary')}}"> Tambah Library</a>
                <br> Tambah aktivitas baru disini <br> <a href="{{route('addAktivitas')}}"> Tambah Aktivitas</a>
                <br> Tambah Berita <br> <a href="{{route('addBerita')}}"> Tambah Berita</a>
            </p>
        </div>
    </div>
</div>
@endsection
