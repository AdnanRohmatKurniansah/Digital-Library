@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buat peminjaman baru</h1>
        </div>

        <div class="section-body">
            <div class="card col-md-9">
                <form action="/dashboard/peminjaman" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_user">Peminjam</label>
                            <select class="form-control @error('id_user') is-invalid @enderror" name="id_user">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            @error('id_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>            
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_buku">Judul buku</label>
                            <select class="form-control @error('id_buku') is-invalid @enderror" name="id_buku">
                                @foreach ($bukus as $buku)
                                    <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                                @endforeach
                            </select>
                            @error('id_buku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>            
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_kembali">Tgl kembali</label>
                            <input id="tgl_kembali" value="{{ old('tgl_kembali') }}" type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali" tabindex="1" required autofocus>
                            @error('tgl_kembali')  
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