@extends('layouts.nav')


@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>
    <form class="form-control form-control-lg" action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="col-sm-2 col-form-label"  for="name">Nama:</label><br>
        <input class="form-control"  type="text" id="name" name="name" value="{{ $employee->name }}"><br>
        <label class="col-sm-2 col-form-label" for="position">Posisi:</label><br>
        <input class="form-control"  type="text" id="position" name="position" value="{{ $employee->position }}"><br>
        <label class="col-sm-2 col-form-label" for="salary">Gaji:</label ><br>
        <input class="form-control"  type="text" id="salary" name="salary" value="{{ $employee->salary }}"><br><br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection