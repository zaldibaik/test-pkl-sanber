@extends('layouts.navlogin')


@section('content')
{{-- <div class="container">


    <div class="h1">Daftak menjadi karyawan</div>
    <form class="form-control form-control-lg" action=" {{ route('keluarga.store') }}" method="POST">
        @csrf
        <label class="col-sm-2 col-form-label" for="nama_ibu">Nama:</label><br>
        <input class="form-control" type="text" id="nama_ibu" name="name"><br>
        <label class="col-sm-2 col-form-label" for="nama_ayah">nama ayah:</label><br>
        <input class="form-control" type="text" id="nama_ayah" name="nama_ayah"><br>
        <label class="col-sm-2 col-form-label" for="nomor_KK">nama ibu:</label><br>
        <input class="form-control" type="text" id="nomor_KK" name="nomor_KK"><br><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="font-weight-bolder">Daftar Keluarga</h4>
                    <p class="mb-0">Ayo daftar menjadi anggota keluarga</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('keluarga.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                        </div>
                        <div class="mb-3">
                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_KK" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" id="nomor_KK" name="nomor_KK">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                            <label class="form-check-label" for="flexCheckDefault">
                                Saya menyetujui <a href="javascript:;" class="text-dark font-weight-bolder">Syarat dan Ketentuan</a>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-40 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
