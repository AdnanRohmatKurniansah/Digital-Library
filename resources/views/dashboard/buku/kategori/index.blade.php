@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data kategori buku</h1>
        </div>

        <a class="btn btn-primary mb-3" href="/dashboard/buku/kategori/create">Tambah kategori</a>
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
                                    <th>Nama kategori</th>
                                    <th>Dibuat</th>
                                    <th>Diupdate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>      
                                @foreach ($kategories as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->nama }}</td>
                                    <td>{{ $kategori->created_at->format('d M Y h:i') }}</td>
                                    <td>{{ $kategori->updated_at->format('d M Y h:i') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/dashboard/buku/kategori/{{ $kategori->id }}/edit" class="btn btn-success mr-2"><i class="fas fa-pen"></i></a>
                                            <form action="/dashboard/buku/kategori/{{ $kategori->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus kategori?')" type="submit">
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