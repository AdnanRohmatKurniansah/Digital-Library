@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data user</h1>
        </div>

        <a class="btn btn-primary mb-3" href="/dashboard/user/create">Tambah user</a>
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
                                    <th>Nama lengkap</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>      
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="/dashboard/user/{{ $user->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')" type="submit">
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