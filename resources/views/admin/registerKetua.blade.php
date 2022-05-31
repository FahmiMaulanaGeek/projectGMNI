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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerKetua') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                    <input placeholder="Select date" type="date" id="example" class="form-control" name="tanggal_lahir">
                            </div>

                                @error('tanggallahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">{{ __('Jenis kelamin') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="Pria">Pria</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>

                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="angkatan" class="col-md-4 col-form-label text-md-end">{{ __('Angkatan') }}</label>

                            <div class="col-md-6">
                                <input id="angkatan" type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{ old('angkatan') }}" required autocomplete="angkatan">

                                @error('angkatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tahun_ktd" class="col-md-4 col-form-label text-md-end">{{ __('Tahun KTD') }}</label>

                            <div class="col-md-6">
                                <input id="tahun_ktd" type="text" class="form-control @error('tahun_ktd') is-invalid @enderror" name="tahun_ktd" value="{{ old('tahun_ktd') }}" required autocomplete="tahun_ktd">

                                @error('tahun_ktd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="universitas" class="col-md-4 col-form-label text-md-end">{{ __('Universitas') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="universitas" id="universitas">
                                    @foreach($univ as $u)
                                    <option value="{{ $u['id'] }}">{{ $u['nama'] }}</option>
                                    @endforeach
                                  </select>

                                @error('universitas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dpk_id" class="col-md-4 col-form-label text-md-end">{{ __('DPK ID') }}</label>

                            <div class="col-md-6">
                                <select name="dpk_id" id="dpk_id" class="form-control @error('dpk_id') is-invalid @enderror">
                                    @foreach ($data as $dpk)
                                    <option value="{{$dpk['id']}}">{{$dpk['nama']}}</option>
                                    @endforeach
                                </select>

                                @error('dpk_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="jabatan" class="col-md-4 col-form-label text-md-end">{{ __('Jabatan') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="jabatan" id="jabatan">
                                    <option value="Ketua">Ketua</option>
                                    <option value="Kader">Kader</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Sekretaris Jendral">Sekretaris Jendral</option>
                                    <option value="Kabid Politik">Kabid Politik</option>
                                    <option value="Kabid Agitasi Propaganda">Kabid Agitasi Propaganda</option>
                                    <option value="Kabid Kader">Kabid Kader</option>
                                  </select>

                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="jabatan" class="col-md-4 col-form-label text-md-end">{{ __('Jabatan') }}</label>
                            <select name="jabatan" id="jabatan">
                                <option value="Kader">Kader</option>
                                <option value="Bendahara">Bendahara</option>
                                <option value="Sekretaris Jendral">Sekretaris Jendral</option>
                                <option value="Kabid Politik">Kabid Politik</option>
                                <option value="Kabid Agitasi Propaganda">Kabid Agitasi Propaganda</option>
                                <option value="Kabid Kader">Kabid Kader</option>
                              </select>

                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> --}}
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
