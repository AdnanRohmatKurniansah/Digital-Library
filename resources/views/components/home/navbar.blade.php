<nav class="navbar navbar-expand-lg navbar-light bg-light px-0 py-3" style="border-bottom: 1px solid whitesmoke">
  <div class="container-xl max-w-screen-xl">
    <a class="navbar-brand" href="/">
      <h3>Digital Library</h3>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mx-lg-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/buku">Buku</a>
        </li>
      </ul>

      @if (auth()->check())
        <div class="dropdown mr-5">
          <button class="btn bg-transparent border-0 shadow-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->nama_lengkap }}
          </button>
          <ul class="dropdown-menu">Home
            <li><a class="dropdown-item" href="/pinjaman">Pinjaman</a></li>
            <li><a class="dropdown-item" href="/koleksi">Koleksi</a></li>
            <li><form action="/auth/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">
                Logout
              </button>
            </form></li>
          </ul>      
        </div>
      @else 
        <div class="navbar-nav ms-lg-4">
          <a class="nav-item nav-link" href="/auth/login">Login</a>
        </div>
        <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
          <a href="/auth/register" class="btn btn-sm btn-neutral w-full w-lg-auto">
            Register
          </a>
        </div>
      @endif
    </div>
  </div>
</nav>