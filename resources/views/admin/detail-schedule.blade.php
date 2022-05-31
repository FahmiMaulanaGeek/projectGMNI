@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 ">
            
                <h1 style="top:-1000%">{{ $data[0]['judul'] }}</h1>
            
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Durasi Kegiatan :') }}</label>

                <div class="col-md-6">
                    <label for="durasi_kegiatan" class="form-control">{{ $data[0]['durasi_kegiatan'] }}</label>
                </div>
            </div>

            <div class="row mb-3">
                <label for="estimasi_peserta" class="col-md-4 col-form-label text-md-end">{{ __('Estimasi Peserta :') }}</label>

                <div class="col-md-6">
                    <label for="estimasi_peserta" class="form-control">{{ $data[0]['estimasi_peserta'] }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="keterangan" class="col-md-4 col-form-label text-md-end">{{ __('Keterangan :') }}</label>

                <div class="col-md-6">
                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="10">{{ $data[0]['keterangan'] }}</textarea>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="tgl_kegiatan" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Kegiatan') }}</label>

                <div class="col-md-6">
                    <label for="tgl_kegiatan" class="form-control">{{ date('d-M-Y', strtotime($data[0]['tgl_kegiatan'])) }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama :') }}</label>

                <div class="col-md-6">
                    <label for="nama" class="form-control">{{ $data[0]['nama'] }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama DPK :') }}</label>

                <div class="col-md-6">
                    <label for="nama" class="form-control">{{ $data[0]['nama_dpk'] }}</label>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-form-label text-md-end"></label>

                <div class="col-md-6">
                    <input type="text" class="form-control mb-3" name="komentar"> <button class="btn btn-primary">Comment</button>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <td><a href="{{ route('admin-detail-schedule', $aktivitas['id']) }}" class="btn btn-primary">Detail</a></td>
            </div> --}}

       

           
        </div>
    </div>
</div>
@endsection
