@extends('layouts.nav')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>
    <form class="form-control form-control-lg" action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="profile_photo_path">Profile Photo:</label>
            <input type="file" id="profile_photo_path" name="profile_photo_path" accept="image/*">
            @if ($employee->profile_photo_path)
            <img src="{{ asset('profile-photos/' . $employee->profile_photo_path) }}" alt="{{ $employee->name }}'s Profile Photo" class="img-thumbnail">
            @endif

        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="name">Nama:</label><br>
            <input class="form-control" type="text" id="name" name="name" value="{{ $employee->name }}"><br>
        </div>
        <div>
            <input class="form-control" type="text" id="position" name="position" value="{{ $employee->position }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="salary">Gaji:</label><br>
            <input class="form-control" type="text" id="salary" name="salary" value="{{ $employee->salary }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="address">Alamat:</label><br>
            <input class="form-control" type="text" id="address" name="address" value="{{ $employee->address }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="country">Negara:</label><br>
            <input class="form-control" type="text" id="country" name="country" value="{{ $employee->country }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="postal_code">Nomor Pos:</label><br>
            <input class="form-control" type="text" id="postal_code" name="postal_code" value="{{ $employee->postal_code }}"><br>
        </div>
        <div>
            <label class="col-sm-2 col-form-label" for="about">Tentang:</label><br>
            <textarea class="form-control" id="about" name="about">{{ $employee->about }}</textarea><br>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
