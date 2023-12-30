@extends('layouts.main')

@section('content')
<div class="denda">
    <div class="container max-w-screen-xl" style="margin-top: 50px; margin-bottom: 50px">
        <div class="row pt-5">
            @if ($dendas->count())
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul buku</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Tgl kembali</th>
                    <th scope="col">Dikembalikan</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Dibayar</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dendas as $denda)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $denda->peminjaman->buku->judul }}</td>
                      <td>
                        <img width="50px" src="{{ asset('storage/' . $denda->peminjaman->buku->sampul) }}">
                      </td>
                      <td>{{ \Carbon\Carbon::parse($denda->peminjaman->tgl_kembali)->format(' d M Y h:i') }}</td>
                      <td>{{ \Carbon\Carbon::parse($denda->peminjaman->dikembalikan)->format(' d M Y h:i') }}</td>
                      <td>Rp. {{ number_format($denda->nominal, 0, ',', '.') }}</td>
                      <td>Rp. {{ number_format($denda->dibayar, 0, ',', '.') }}</td>
                      <td><span class="badge text-white bg-{{ $denda->status == 'lunas' ? 'success' : 'danger' }}">{{ $denda->status }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                <h3>Anda tidak punya denda</h3>
            </div>
            @endif
        </div>
        <div class="d-flex mt-5 justify-content-center">
            {{ $dendas->links() }}
        </div> 
    </div>
</div>
@endsection