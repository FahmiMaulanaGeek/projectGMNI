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
                    <th>User yang mengajukan</th>
                    <th>Tipe</th>
                    <th>Download</th>
                    <th>Acc</th>
                    <th>Status</th>
                </tr>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item['namanama'] }}</td>
                    <td>{{ $item['tipe'] }}</td>
                    <td><a onclick="window.location.href='{{ route('downloadAdministration', $item['image']) }}'" class="btn btn-primary">Download</a></td>
                    <form action="{{ route('admin-accAdministration') }}" method="POST">
                        @csrf
                        <td><button type="submit" class="btn btn-primary">Acc <input type="text" name="id" value="{{ $item['id'] }}" hidden> </button></td>
                    </form>
                    
                    <td>{{ $item['validasi'] }}</td>

                @endforeach
            </table>   
        </div>
    </div>
</div>
@endsection
