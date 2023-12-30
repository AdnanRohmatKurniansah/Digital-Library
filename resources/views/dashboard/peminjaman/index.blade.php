@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data peminjaman</h1>
        </div>

        <a class="btn btn-primary mb-3" href="/dashboard/peminjaman/pinjam">Buat peminjaman baru</a>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                            <thead>                                 
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama peminjam</th>
                                    <th>Judul buku</th>
                                    <th>Tgl peminjaman</th>
                                    <th>Tgl kembali</th>
                                    <th>Dikembalikan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>      
                                @foreach ($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->user->nama_lengkap }}</td>
                                    <td>{{ $peminjaman->buku->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_peminjaman)->format('d Y M h:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d Y M h:i') }}</td>
                                    <td>{{ $peminjaman->dikembalikan != null ? \Carbon\Carbon::parse($peminjaman->dikembalikan) : '-' }}</td>
                                    <td><span class="badge text-white bg-{{ $peminjaman->status == 'dipinjam' ? 'warning' : 'primary' }}">{{ $peminjaman->status }}</span></td>
                                    <td>
                                        @if ($peminjaman->status != 'dikembalikan')
                                        <div class="d-flex">
                                            <form action="/dashboard/peminjaman/{{ $peminjaman->id }}" method="post">
                                                @method('put')
                                                @csrf
                                                <button class="btn btn-success" onclick="return confirm('Ingin mengembalikan buku?')" type="submit">
                                                    <i class="fas fa-undo-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @else 
                                        <button class="btn btn-success" disabled type="button">
                                            Sudah dikembalikan
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach                           
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection