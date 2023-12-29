@extends('layouts.auth')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
          <div class="card-header"><h4>Register</h4></div>
          <div class="card-body">
            <form method="POST" action="/auth/register">
              @csrf
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama_lengkap">Nama lengkap</label>
                      <input id="nama_lengkap" value="{{ old('nama_lengkap') }}" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" tabindex="1" required autofocus>
                      @error('nama_lengkap')  
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input id="username" type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1" required autofocus>
                      @error('username')  
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
                        @error('email')  
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input id="alamat" type="text" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" name="alamat" tabindex="1" required autofocus>
                        @error('alamat')  
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                @error('password')  
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  Register
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="mb-5 text-muted text-center">
          Sudah punya akun? <a href="/auth/login">Login</a>
        </div>
      </div>
    </div>
  </div>
@endsection