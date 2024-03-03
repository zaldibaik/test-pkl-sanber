@extends('layouts.navlogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="font-weight-bolder">Daftar karyawan</h4>
                    <p class="mb-0">Ayo daftar menjadi karyawan</p>
                </div>
                <div class="card-body">
                    <form class="form-control form-control-lg" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>Nama</div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div>Posisi</div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" id="position" name="position" class="form-control">
                        </div>
                        <div>Gaji</div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" id="salary" name="salary" class="form-control">
                        </div>
                        <div>Alamat</div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                        <div>Negara</div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" id="country" name="country" class="form-control">
                        </div>
                        <div>Kode Pos</div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" id="postal_code" name="postal_code" class="form-control">
                        </div>
                        <div>Tentang Diri</div>
                        <div class="input-group input-group-outline mb-3">
                            <textarea id="about" name="about" class="form-control"></textarea>
                        </div>
                        <div>
                            <label for="profile_photo_path">Foto Profil:</label>
                            <input type="file" id="profile_photo_path" name="profile_photo_path" accept="image/*">
                        </div>
                        <div class="form-check form-check-info text-start ps-0">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                            <label class="form-check-label" for="flexCheckDefault">
                                Saya menyetujui <a href="javascript:;" class="text-dark font-weight-bolder">Syarat dan Ketentuan</a>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-40 mt-4 mb-0">Daftar Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
