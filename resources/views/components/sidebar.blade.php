<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">Digital Library</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">Digital Library</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Feature</li>
        <li class="dropdown {{ Request::is('dashboard/buku*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Managemen Buku</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('dashboard/buku') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/buku">Data buku</a></li>
            <li class="{{ Request::is('dashboard/buku/kategori') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/buku/kategori">Data kategori buku</a></li>
          </ul>
        </li>
        @if (Auth::user()->role == 'administrator')
          <li class="{{ Request::is('dashboard/user*') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/user"><i class="fas fa-user"></i> <span>Data user</span></a></li>
        @endif
        <li class="{{ Request::is('dashboard/peminjaman*') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/peminjaman"><i class="fas fa-bookmark"></i> <span>Data peminjaman</span></a></li>
        <li class="{{ Request::is('dashboard/denda*') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/denda"><i class="fas fa-money-check"></i> <span>Data denda</span></a></li>
      </ul>
  </div>