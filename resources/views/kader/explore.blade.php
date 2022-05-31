@extends('layouts.admin')
@section('content')
<style>
table, th, td {
  border: 1px solid;
  text-align: center;
}
table {
  width: 100%;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <center>
                <h1 class="mb-4">Explore GMNI Surabaya</h1>
            </center>
            
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Universitas</th>
                    <th>Tipe</th>
                    <th>Profile</th>
                </tr>
                @foreach ($data as $dpk)
                <tr>
                    <td>{{$dpk['nama']}}</td>
                    <td>{{$dpk['universitas']}}</td>
                    <td>{{$dpk['tipe']}}</td>
                    <td><button class="btn btn-primary" onclick="window.location.href='{{route('kader-detailDpk', $dpk['id'])}}'">Detail</button></td>
                </tr>    
                @endforeach
                
            </table>
        </div>
    </div>
</div>
@endsection
