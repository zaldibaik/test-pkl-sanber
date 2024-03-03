
@extends('layouts.navlogin')

@section('content')

<div class="container">
    <div class="h1">Daftar menjadi karyawan</div>
    <form class="form-control form-control-lg" action=" {{ route('employees.store') }}" method="POST">
        @csrf
        <label class="col-sm-2 col-form-label" for="name">Nama:</label><br>
        <input class="form-control" type="text" id="name" name="name"><br>
        <label class="col-sm-2 col-form-label" for="position">Posisi:</label><br>
        <input class="form-control" type="text" id="position" name="position"><br>
        <label class="col-sm-2 col-form-label" for="salary">Gaji:</label><br>
        <input class="form-control" type="text" id="salary" name="salary"><br><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection