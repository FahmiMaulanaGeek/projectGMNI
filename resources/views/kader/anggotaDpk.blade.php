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
                    <th>Angkatan</th>
                    <th>Tahun KTD</th>
                    <th>Role</th>
                    <th>Jabatan</th>
                    <th>Keaktivan</th>
                </tr>
                @foreach ($data as $anggota)
                <tr>
                    <td>{{$anggota['nama']}}</td>
                    <td>{{$anggota['universitas']}}</td>
                    <td>{{$anggota['angkatan']}}</td>
                    <td>{{$anggota['tahun_ktd']}}</td>
                    <td>{{$anggota['role']}}</td>
                    <td>{{$anggota['jabatan']}}</td>
                    <td>{{$anggota['isActive']}}</td>
                </tr>    
                @endforeach
                
            </table>
        </div>
    </div>
</div>
@endsection
