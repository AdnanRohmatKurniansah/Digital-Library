@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah user</h1>
        </div>

        <div class="section-body">
            <div class="card col-md-9">
                <form action="/dashboard/user" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama lengkap</label>
                            <input id="nama_lengkap" value="{{ old('nama_lengkap') }}" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" tabindex="1" required autofocus>
                            @error('nama_lengkap')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" value="{{ old('username') }}" type="text" class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1" required autofocus>
                            @error('username')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
                            @error('email')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" value="{{ old('alamat') }}" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" tabindex="1" required autofocus>
                            @error('alamat')  
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role">
                                <option value="peminjam">Peminjam</option>
                                <option value="petugas">Petugas</option>
                                <option value="administrator">Administrator</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>            
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="1" required autofocus>
                            @error('password')  
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