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
                <div class="card-header">{{ __('Tambah Aktivitas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addAktivitasKetua') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="durasi_kegiatan" class="col-md-4 col-form-label text-md-end">{{ __('Durasi Kegiatan') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="durasi_kegiatan" id="durasi_kegiatan">
                                    <option value="1 Jam">1 Jam</option>
                                    <option value="2 Jam">2 Jam</option>
                                    <option value="3 Jam">3 Jam</option>
                                    <option value="4 Jam">4 Jam</option>
                                    <option value="5 Jam">5 Jam</option>
                                </select>

                                @error('durasi_kegiatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="peminjaman_alat" class="col-md-4 col-form-label text-md-end">{{ __('Peminjaman Alat') }}</label>

                            <div class="col-md-6">
                                <fieldset>
                                    <input type="checkbox" id="papan_tulis" name="papan_tulis" value="papan tulis">
                                    <label for="papan_tulis"> Papan Tulis</label><br>
                                    <input type="checkbox" id="almamater" name="almamater" value="almamater">
                                    <label for="vehicle2"> Almamater</label><br>
                                    <input type="checkbox" id="lcd" name="lcd" value="lcd">
                                    <label for="lcd">LCD </label><br>
                                    <input type="checkbox" id="proyektor" name="proyektor" value="proyektor">
                                    <label for="lcd">Proyektor </label><br>
                                </fieldset>
                                @error('peminjaman_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="estimasi_peserta" class="col-md-4 col-form-label text-md-end">{{ __('Estimasi Peserta') }}</label>

                            <div class="col-md-6">
                                <input id="estimasi_peserta" type="text" class="form-control @error('estimasi_peserta') is-invalid @enderror" name="estimasi_peserta" value="{{ old('estimasi_peserta') }}" required autocomplete="estimasi_peserta" autofocus>

                                @error('estimasi_peserta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-end">{{ __('Keterangan ') }}</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required autocomplete="keterangan" autofocus>

                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl_kegiatan" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Kegiatan') }}</label>

                            <div class="col-md-6">
                                <input id="tgl_kegiatan" type="date" class="form-control @error('tgl_kegiatan') is-invalid @enderror" name="tgl_kegiatan" value="{{ old('tgl_kegiatan') }}" required autocomplete="tgl_kegiatan" autofocus>

                                @error('tgl_kegiatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
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
