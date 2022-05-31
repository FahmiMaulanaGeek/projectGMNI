@extends('layouts.admin')

@section('content')
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Dokumen Administrasi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ketua-addAdministration') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>

                            {{-- <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label for="tipe" class="col-md-4 col-form-label text-md-end">{{ __('Tipe') }}</label>


                            <div class="col-md-6">
                                <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror">
                                    <option value="Absen KTD">Absen KTD</option>
                                    <option value="Absen PPAB">Absen PPAB</option>
                                    <option value="Surat Keputusan">Surat Keputusan</option>
                                </select>

                                @error('tipe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dokumen" class="col-md-4 col-form-label text-md-end">{{ __('dokumen') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="dokumen" value="{{ old('dokumen') }}">

                                @error('dokumen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        <div class="row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
