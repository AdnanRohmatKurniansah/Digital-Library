@extends('layouts.main')

@section('content')
<div class="detail-buku">
    <div class="container max-w-screen-xl" style="margin-top: 50px; margin-bottom: 50px">
        <div class="info row">
            <div class="col-md-6 mb-5">
                <img src="{{ asset('storage/' . $buku->sampul) }}" class="rounded-lg img-fluid" style="min-height: 400px; max-height: 400px"/>
            </div>
            <div class="col-md-6">
                <h2 class="mb-3">{{ $buku->judul }}</h2>
                <div class="row">
                    <div class="col">
                        <ul class="list-unstyled fs-6">
                            <li class="mb-2"><span class="fw-bold">Kategori: </span>{{ implode(', ', $buku->kategori_bukus->pluck('nama')->toArray()) }}</li>
                            <li class="mb-2"><span class="fw-bold">Penulis: </span>{{ $buku->penulis }}</li>
                            <li class="mb-2"><span class="fw-bold">Penerbit: </span>{{ $buku->penerbit }}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="list-unstyled fs-6">
                            <li class="mb-2"><span class="fw-bold">Tahun terbit:</span> {{ $buku->tahun_terbit }}</li>
                            <li class="mb-2"><span class="fw-bold">Jumlah:</span> {{ $buku->jumlah }}</li>
                        </ul>
                    </div>
                </div>
                <p class="mt-3"><span class="fw-bold">Deskripsi:</span> {{ $buku->deskripsi }}</p>
                <div class="d-flex gap-4">
                    @php
                        $existBuku = \App\Models\Koleksi::where('id_buku', $buku->id)->exists();
                    @endphp
                    @if (!$existBuku)
                        <form action="/koleksi" method="post">
                            @csrf
                            <input type="hidden" name="id_buku" value="{{ $buku->id }}">
                            <button class="btn mt-5 btn-dark btn-sm" type="submit">Tambah ke koleksi</button>
                        </form>
                    @else
                        <div class="fav mt-5">
                            <button class="btn btn-dark btn-sm" type="button"><i class="fa fa-star text-warning"></i>Favorit</button>
                        </div>
                    @endif
                    <form action="/pinjam" method="post">
                        @csrf
                        <input type="hidden" name="id_buku" value="{{ $buku->id }}">
                        <button class="btn mt-5 btn-neutral btn-sm" type="submit">Pinjam</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="ulasan row" style="margin-top: 50px">
            <div class="col-md-6 mb-5">
                <h3 class="mb-5">Ulasan</h3>
                @if ($ulasans->count())
                @foreach ($ulasans as $ulasan)
                <div class="card p-5 mb-3">
                    <p>{{ $ulasan->ulasan }}</p>
                        <div class="flex">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $ulasan->rating)
                                    <i class="fa fa-star text-warning"></i>
                                @else
                                    <i class="fa fa-star text-muted"></i>
                                @endif
                            @endfor 
                        </div>
                    <footer class="blockquote-footer mt-1"><cite title="Source Title">{{ $ulasan->user->nama_lengkap }}</cite></footer>
                </div>
                @endforeach
                @else
                <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <h4>Tidak ada ulasan untuk sekarang</h4>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <h3 class="mb-2">Berikan ulasan anda</h3>
                <form action="/ulasan" method="post">
                    @csrf
                    <input type="hidden" name="id_buku" value="{{ $buku->id }}">
                    <div class="form-group">
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                            <input type="radio" id="star1" name="rating" value="1" checked />
                            <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="ulasan" class="form-control @error('ulasan') is-invalid @enderror" name="ulasan" rows="5" cols="5" placeholder="Ulasan..." required>{{ old('ulasan') }}</textarea>
                        @error('ulasan')  
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm mt-3 btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection