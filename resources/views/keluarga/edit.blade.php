@extends('layouts.nav')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>
    <form class="form-control form-control-lg" action="{{ route('keluarga.update', $keluarga->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            @if ($keluarga->profile_photo_path)

        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="name">Nama:</label><br>
            <input class="form-control" type="text" id="name" name="name" value="{{ $keluarga->name }}"><br>
        </div>
        <div>
            <input class="form-control" type="text" id="position" name="position" value="{{ $keluarga->position }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="salary">Gaji:</label><br>
            <input class="form-control" type="text" id="salary" name="salary" value="{{ $keluarga->salary }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="address">Alamat:</label><br>
            <input class="form-control" type="text" id="address" name="address" value="{{ $keluarga->address }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="country">Negara:</label><br>
            <input class="form-control" type="text" id="country" name="country" value="{{ $keluarga->country }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="postal_code">Nomor Pos:</label><br>
            <input class="form-control" type="text" id="postal_code" name="postal_code" value="{{ $keluarga->postal_code }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="about">Tentang:</label><br>
            <textarea class="form-control" id="about" name="about">{{ $keluarga->about }}</textarea><br>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
