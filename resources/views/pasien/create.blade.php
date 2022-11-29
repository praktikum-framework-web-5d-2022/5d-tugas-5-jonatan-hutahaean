@extends('master')
@section('title','Rumah Sakit')

@section('content')
    <style>
        .bg-maroon {
            background-color: maroon;
            color: white;
        }
        .bt-maroon{
            background-color: maroon;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data Pasien</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('pasien.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" class="form-control" value="{{old('nik')}}">
                        @error('nik')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" value="{{old('nama')}}">
                        @error('nama')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-laki" {{old('jenis_kelamin') == "Laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="Perempuan" {{old('jenis_kelamin') == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">{{old('alamat')}}</textarea>
                        @error('alamat')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="biaya_obat" class="form-label">Biaya Obat</label>
                        <input type="text" name="biaya_obat" id="biaya_obat" placeholder="Masukkan 0 jika tidak ada biaya obat" class="form-control" value="{{old('biaya_obat')}}">
                        @error('biaya_obat')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="biaya_konsultasi" class="form-label">Biaya Konsultasi</label>
                        <input type="text" name="biaya_konsultasi" id="biaya_konsultasi" placeholder="Masukkan 0 jika tidak ada biaya konsultasi" class="form-control" value="{{old('biaya_konsultasi')}}">
                        @error('biaya_konsultasi')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="biaya_administrasi" class="form-label">Biaya Administrasi</label>
                        <input type="text" name="biaya_administrasi" id="biaya_administrasi" placeholder="Masukkan 0 jika tidak ada biaya administrasi" class="form-control" value="{{old('biaya_administrasi')}}">
                        @error('biaya_administrasi')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="biaya_lain" class="form-label">Biaya Lainnya</label>
                        <input type="text" name="biaya_lain" id="biaya_lain" placeholder="Masukkan 0 jika tidak ada biaya lainnya" class="form-control" value="{{old('biaya_lain')}}">
                        @error('biaya_lain')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bt-maroon">Tambah</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
