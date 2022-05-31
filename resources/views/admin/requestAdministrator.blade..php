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
        <form method="POST" action="{{route('accRequest')}}">
        @csrf
        <div class="col-sm-12">
            <h1>Jadwal Request Kegiatan GMNI</h1>
            <table>
                <tr>
                    <th>Judul</th>
                    <th>Durasi Kegiatan</th>
                    <th>Peminjaman Alat</th>
                    <th>Estimasi Peserta</th>
                    <th>Keterangan</th>
                    <th>Tgl Kegiatan</th>
                    <th>Penyelenggara</th>
                    <th>Izin</th>
                </tr>
                @foreach ($data as $aktivitas)
                <tr>
                    <td>{{$aktivitas['judul']}}</td>
                    <td>{{$aktivitas['durasi_kegiatan']}}</td>
                    <td>{{$aktivitas['peminjaman_alat']}}</td>
                    <td>{{$aktivitas['estimasi_peserta']}}</td>
                    <td>{{$aktivitas['keterangan']}}</td>
                    <td>{{date('d-m-Y', strtotime($aktivitas['tgl_kegiatan']))}}</td>
                    <td>{{$aktivitas['users_id']}}</td>
                    <td><button class="btn btn-primary"><input type="hidden" value="{{$aktivitas['id']}}" name="id">Izinkan</button></td>
                </tr>    
                @endforeach
                
            </table>
        </div>
        </form>
    </div>
</div>
@endsection
