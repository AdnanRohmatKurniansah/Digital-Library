@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit buku</h1>
        </div>

        <div class="section-body">
            <div class="card col-md-9">
                <form action="/dashboard/buku/{{ $buku->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul">Judul buku</label>
                            <input id="judul" value="{{ old('judul', $buku->judul) }}" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" tabindex="1" required autofocus>
                            @error('judul')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"  required>{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                            @error('deskripsi')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_kategories">Kategori buku</label>
                            @php
                                $selectedId_Kategori = $buku->kategori_bukus->pluck('id')->toArray();
                            @endphp
                            <div class="row">
                                <div class="col">
                                  @foreach ($kategori_bukus->take(10) as $kategori)
                                  <div class="form-check">
                                    <input class="form-check-input @error('id_kategories') is-invalid @enderror" type="checkbox" name="id_kategories[]" value="{{ $kategori->id }}" @checked(in_array($kategori->id, $selectedId_Kategori))>
                                    <label class="form-check-label">
                                      {{ $kategori->nama }}
                                    </label>
                                    @error('id_kategories')  
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  @endforeach
                                </div>
                                <div class="col">
                                  @foreach ($kategori_bukus->skip(10) as $kategori)
                                    <div class="form-check">
                                    <input class="form-check-input @error('id_kategories') is-invalid @enderror" type="checkbox" name="id_kategories[]" value="{{ $kategori->id }}" @checked(in_array($kategori->id, $selectedId_Kategori))>
                                    <label class="form-check-label">
                                        {{ $kategori->nama  }}
                                    </label>
                                    @error('id_kategories')  
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input id="penulis" value="{{ old('penulis', $buku->penulis) }}" type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" tabindex="1" required autofocus>
                            @error('penulis')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input id="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" tabindex="1" required autofocus>
                            @error('penerbit')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun terbit</label>
                            <input id="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" type="number" min="1" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" tabindex="1" required autofocus>
                            @error('tahun_terbit')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah buku</label>
                            <input id="jumlah" value="{{ old('jumlah', $buku->jumlah) }}" type="number" min="1" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" tabindex="1" required autofocus>
                            @error('jumlah')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sampul">Sampul</label>
                            @if ($buku->sampul)
                                <img src="{{ asset('storage/' . $buku->sampul) }}" class="sampul-preview sampul-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="sampul-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input id="sampul" value="{{ old('sampul') }}" type="file" class="form-control @error('sampul') is-invalid @enderror" name="sampul" tabindex="1" onchange="previewSampul()">
                            @error('sampul')  
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

<script>
    function previewSampul() {
      const sampul = document.querySelector('#sampul');
      const sampulPreview = document.querySelector('.sampul-preview');
      sampulPreview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(sampul.files[0]);
      oFReader.onload = function(oFREvent) {
        sampulPreview.src = oFREvent.target.result;
      }
    }
</script>


@endsection