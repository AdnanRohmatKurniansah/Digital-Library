@extends('layouts.main')

@section('content')
    <div class="buku" id="buku" style="margin: 50px 0">
        <div class="container max-w-screen-xl">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-3">Daftar Buku</h1>
                <p class="mb-5">Jelajahi beberapa koleksi buku yang tersedia di perpustakaan kami.</p>
            </div>
            <div class="col-md-4 d-flex">
                <form action="/buku" class="d-flex mt-5">
                    <div class="form-group  me-2">
                        <input placeholder="Search..." value="{{ request('search') }}" type="text" class="form-control" name="search" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark text-white">Submit</button>
                    </div>
                </form> 
            </div>
        </div>
        <div class="row pt-5">
            @if ($bukus->count())
                @foreach ($bukus as $buku)
                    <div class="col-md-3 mb-5">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $buku->sampul) }}" class="card-img-top" style="min-height: 230px; max-height: 230px" alt="...">
                            <div class="card-body">
                                <span class="card-title fw-bold">Judul: {{ $buku->judul }}</span>
                                <p class="card-text">Kategori: {{ implode(', ', $buku->kategori_bukus->pluck('nama')->toArray()) }}</p>
                                <p class="card-text">Tahun terbit: {{ $buku->tahun_terbit }}</p>
                                <a href="/buku/{{ $buku->id }}" class="mt-3 btn btn-sm btn-dark">Detail buku</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
                    <h2>Buku tidak ditemukan</h2>
                </div>
            @endif
        </div>
        <div class="d-flex mt-5 justify-content-center">
            {{ $bukus->links() }}
        </div>   
        </div>
    </div>
@endsection