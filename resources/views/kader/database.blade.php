@extends('layouts.admin')
@section('content')
    
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Angkatan</th>
        <th scope="col">Tahun KTD</th>
        <th scope="col">DPK</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Universitas</th>
      </tr>
    </thead>
    @foreach ($data as $d)
    <tbody>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{$d['nama']}}</td>
        <td>{{$d['tanggal_lahir']}}</td>
        <td>{{$d['jenis_kelamin']}}</td>
        <td>{{$d['angkatan']}}</td>
        <td>{{$d['tahun_ktd']}}</td>
        <td>{{$d['nama_dpk']}}</td>
        <td>{{$d['jabatan']}}</td>
        <td>{{$d['nama_universitas']}}</td>
        {{-- <td><button class="btn btn-primary" onclick="window.location.href='{{route('admin-detailDpk', $dpk['id'])}}'">Detail</button></td> --}}
    </tbody>
    @endforeach

  </table>
@endsection