@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Daftar Karyawan</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Ayah</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Ibu</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor KK</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keluarga as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm">{{ $item->nama_ayah }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm">{{ $item->nama_ibu }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <h6 class="mb-0 text-sm">{{ $item->nomor_KK }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div role="group" aria-label="Basic example">
                                        <a class="btn bg-gradient-info mb-3" href="{{ route('keluarga.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('keluarga.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        <a class="btn bg-gradient-success mb-3" href="{{ route('keluarga.show', $item->id) }}">Info</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
