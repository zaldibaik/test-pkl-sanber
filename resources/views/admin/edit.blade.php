@extends('layouts.nav')

@section('content')
<div class="container">
    <h1>Edit Admin</h1>
    <form action="{{ route('admins.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Admin</button>
    </form>
</div>
@endsection
