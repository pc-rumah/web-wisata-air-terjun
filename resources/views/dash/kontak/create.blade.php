@extends('layouts.dash')

@section('content')
    <div class="card bg-info bg-gradient">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Manage Kontak</h5>

            <x-semuaalert />

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('kontak.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">No Telp</label>
                            <input type="number" name="no_telp" class="form-control" value="{{ $kontak->no_telp ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control">{{ $kontak->alamat ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $kontak->email ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
