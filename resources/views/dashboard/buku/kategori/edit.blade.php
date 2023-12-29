@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit kategori buku</h1>
        </div>

        <div class="section-body">
            <div class="card col-md-9">
                <form action="/dashboard/buku/kategori/{{ $kategori->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input id="nama" value="{{ old('nama', $kategori->nama) }}" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" tabindex="1" required autofocus>
                            @error('nama')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary " tabindex="4">
                          Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection