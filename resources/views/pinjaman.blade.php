@extends('layouts.main')

@section('content')
<div class="pinjaman">
    <div class="container max-w-screen-xl" style="margin-top: 50px; margin-bottom: 50px">
        <div class="row pt-5">
            @if ($pinjamans->count())
            @foreach ($pinjamans as $pinjaman)
                <div class="col-md-3 mb-5">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $pinjaman->buku->sampul) }}" class="card-img-top" style="min-height: 230px; max-height: 230px" alt="...">
                        <div class="card-body">
                            <span class="card-title fw-bold">Judul: {{ $pinjaman->buku->judul }}</span>
                            <p class="card-text">Kategori: {{ implode(', ', $pinjaman->buku->kategori_bukus->pluck('nama')->toArray()) }}</p>
                            <p class="card-text">Tahun terbit: {{ $pinjaman->buku->tahun_terbit }}</p>
                            <a href="/buku/{{ $pinjaman->id_buku }}" class="mt-3 btn btn-sm btn-dark">Detail buku</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                <h3>Anda tidak meminjam buku sama sekali</h3>
            </div>
            @endif
        </div>
        <div class="d-flex mt-5 justify-content-center">
            {{ $pinjamans->links() }}
        </div> 
    </div>
</div>
@endsection