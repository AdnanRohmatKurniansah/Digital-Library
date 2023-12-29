@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data buku</h1>
        </div>

        <a class="btn btn-primary mb-3" href="/dashboard/buku/create">Tambah buku</a>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                            <thead>                                 
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Jumlah</th>
                                    <th>Ditambahkan</th>
                                    <th>Diupdate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>      
                                @foreach ($bukus as $buku)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ implode(', ', $buku->kategori_bukus->pluck('nama')->toArray()) }}</td>
                                    <td>{{ $buku->penulis }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>{{ $buku->jumlah }}</td>
                                    <td>{{ $buku->created_at->format('d M Y h:i') }}</td>
                                    <td>{{ $buku->updated_at->format('d M Y h:i') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/dashboard/buku/{{ $buku->id }}/edit" class="btn btn-success mr-2"><i class="fas fa-pen"></i></a>
                                            <form action="/dashboard/buku/{{ $buku->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus buku ini?')" type="submit">
                                                  <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
            </div>
        </div>
    </section>
@endsection