@extends('layouts.nav')

@section('content')
<div class="container">
    <h1>Edit Keluarga</h1>
    <form class="form-control form-control-lg" action="{{ route('keluarga.update', $keluarga->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label class="col-sm-2 col-form-label" for="nama_ayah">Nama Ayah:</label><br>
            <input class="form-control" type="text" id="nama_ayah" name="nama_ayah" value="{{ $keluarga->nama_ayah }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="nama_ibu">Nama Ibu:</label><br>
            <input class="form-control" type="text" id="nama_ibu" name="nama_ibu" value="{{ $keluarga->nama_ibu }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="nomor_KK">Nomor KK:</label><br>
            <input class="form-control" type="text" id="nomor_KK" name="nomor_KK" value="{{ $keluarga->nomor_KK }}"><br>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
