@extends('layouts.dash')

@section('content')
    <div class="card bg-info bg-gradient">
        <div class="card-body">
            <x-semuaalert />

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('galeri.update', $galeri) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $galeri->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control">{{ $galeri->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            <br>
                            @if ($galeri->gambar)
                                <img class="thumb" src="{{ asset('storage/' . $galeri->gambar) }}">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
