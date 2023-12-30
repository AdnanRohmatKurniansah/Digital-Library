@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data denda</h1>
        </div>
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
                                    <th>Dikembalikan</th>
                                    <th>Nominal</th>
                                    <th>Dibayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>      
                                @foreach ($dendas as $denda)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $denda->peminjaman->user->nama_lengkap }}</td>
                                    <td>{{ $denda->peminjaman->buku->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($denda->peminjaman->dikembalikan) }}</td>
                                    <td>Rp. {{ number_format($denda->nominal, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($denda->dibayar, 0, ',', '.') }}</td>
                                    <td><span class="badge text-white bg-{{ $denda->status == 'lunas' ? 'success' : 'danger' }}">{{ $denda->status }}</span></td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $denda->id }}">Bayar</button>
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

    @foreach ($dendas as $denda)
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $denda->id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title">Bayar denda</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/dashboard/denda/{{ $denda->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <input id="dibayar" placeholder="Nominal..." value="{{ old('dibayar') }}" type="number" class="form-control @error('dibayar') is-invalid @enderror" name="dibayar" tabindex="1" required autofocus>
                        @error('dibayar')  
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer br">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    @endforeach

@endsection