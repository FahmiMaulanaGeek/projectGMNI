@extends('layouts.admin')

@section('content')
<style>
table{
  border-collapse: collapse;
  width: 100%;
}
th{
    border: 1px solid gray;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {background-color: #f2f2f2;}

</style>

@if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
@if (session('failed'))
  <div class="alert alert-danger">
      {{ session('failed') }}
  </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table-library">
                <tr>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Download</th>
                </tr>
                @foreach ($dataEbook as $item)
                <tr>
                    <td>{{ $item['judul'] }}</td>
                    <td>{{ $item['tipe'] }}</td>
                    <td><a onclick="window.location.href='{{ route('downloadLibrary', $item['dokumen']) }}'" class="btn btn-primary">Download</a></td>
                </tr>    
                @endforeach
            </table>   
        </div>
        <div class="col-md-6">
            <table class="table-library">
                <tr>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Download</th>
                </tr>
                @foreach ($dataMateri as $item2)
                <tr>
                    <td>{{ $item2['judul'] }}</td>
                    <td>{{ $item2['tipe'] }}</td>
                    <td><a onclick="window.location.href='{{ route('downloadLibrary', $item2['dokumen']) }}'" class="btn btn-primary">Download</a></td>
                </tr>    
                @endforeach
            </table>   
        </div>
    </div>
</div>
@endsection
