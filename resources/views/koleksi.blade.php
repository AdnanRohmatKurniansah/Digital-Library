@extends('layouts.main')

@section('content')
<div class="koleksiku">
    <div class="container max-w-screen-xl" style="margin-top: 50px; margin-bottom: 50px">
        <div class="row pt-5">
            @if ($koleksis->count())
            @foreach ($koleksis as $koleksi)
                <div class="col-md-3 mb-5">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $koleksi->buku->sampul) }}" class="card-img-top" style="min-height: 230px; max-height: 230px" alt="...">
                        <div class="card-body">
                            <span class="card-title fw-bold">Judul: {{ $koleksi->buku->judul }}</span>
                            <p class="card-text">Kategori: {{ implode(', ', $koleksi->buku->kategori_bukus->pluck('nama')->toArray()) }}</p>
                            <p class="card-text">Tahun terbit: {{ $koleksi->buku->tahun_terbit }}</p>
                            <div class="d-flex mt-3 gap-4">
                                <a href="/buku/{{ $koleksi->id_buku }}" class="btn btn-sm btn-dark">Detail buku</a>
                                <form action="/koleksi/{{ $koleksi->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Hapus dari koleksi anda?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                <h3>Anda tidak punya koleksi buku sama sekali</h3>
            </div>
            @endif
        </div>
        <div class="d-flex mt-5 justify-content-center">
            {{ $koleksis->links() }}
        </div> 
    </div>
</div>
@endsection