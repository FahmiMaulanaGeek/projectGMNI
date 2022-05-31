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
            <h1>Jadwal Schedule Kegiatan GMNI</h1>
            <button class="btn btn-primary mb-3" onclick="window.location='{{route('komencoba')}}'">komencoba </button>
            <button class="btn btn-primary mb-3" onclick="window.location='{{route('addAktivitas')}}'">Tambah Schedule</button>
            <button class="btn btn-primary mb-3" onclick="window.location='{{route('accRequest')}}'">Lihat Request </button>
            <table>
                <tr>
                    <th>Judul</th>
                    <th>Durasi Kegiatan</th>
                    <th>Peminjaman Alat</th>
                    <th>Estimasi Peserta</th>
                    <th>Keterangan</th>
                    <th>Tgl Kegiatan</th>
                    <th>Penyelenggara</th>
                    <th>Detail</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
                @foreach ($data as $aktivitas)
                <tr>
                    <td>{{$aktivitas['judul']}}</td>
                    <td>{{$aktivitas['durasi_kegiatan']}}</td>
                    <td>{{$aktivitas['peminjaman_alat']}}</td>
                    <td>{{$aktivitas['estimasi_peserta']}}</td>
                    <td>{{$aktivitas['keterangan']}}</td>
                    <td>{{date('d-m-Y', strtotime($aktivitas['tgl_kegiatan']))}}</td>
                    <td>{{$aktivitas['nama']}}</td>
                    <td><a href="{{ route('admin-detail-schedule', $aktivitas['id']) }}" class="btn btn-primary">Detail</a></td>
                    <td><button class="btn btn-primary">Edit</button></td>
                    <td><button class="btn btn-danger">Hapus</button></td>
                </tr>    
                @endforeach
                
            </table>
        </div>
    </div>
</div>
@endsection
