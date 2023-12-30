@extends('layouts.main')

@section('content')
<div class="home">
    <div class="hero py-24">
      <div class="container max-w-screen-xl">
        <div class="row align-items-center gap-10">
          <div class="col-12 col-lg-5 mb-10 mb-lg-0">
            <h3 class="ls-tight font-bolder display-5 mb-5">
                Selamat Datang di Perpustakaan Digital.
            </h3>
            <p class="lead mb-10">
                Temukan dunia pengetahuan di ujung jari Anda. Perpustakaan digital kami menawarkan akses instan ke berbagai koleksi, membawa pengalaman membaca ke level berikutnya.
            </p>
            <div class="mx-n2">
                <a href="/buku" class="btn btn-md btn-dark shadow-sm mx-2 px-lg-8">
                    Jelajahi 
                </a>
            </div>
          </div>
          <div class="col-12 col-lg-6 ">
            <div class="w-xl-9/10 position-relative">
              <span class="d-none d-lg-block position-absolute top-0 start-0 transform translate-x-n32 translate-y-n16 w-2/3 h-2/3 bg-warning opacity-20 rounded-circle filter blur-50"></span>
              <span class="d-none d-xl-block position-absolute bottom-0 end-0 transform translate-x-16 translate-y-16 w-32 h-32 bg-warning opacity-60 rounded-circle filter blur-50"></span>
              <img alt="..." src="https://images.unsplash.com/photo-1549383028-df014fa3a325?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGxpYnJhcnl8ZW58MHx8MHx8fDI%3D" class="shadow-4 rounded-4 position-relative overlap-10" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fitur py-24">
      <div class="container max-w-screen-xl">
        <div class="row justify-content-center text-md-center mb-24">
          <div class="col-lg-7">
            <h1 class="ls-tight font-bolder mb-5">
              Jelajahi Fitur-Fitur Unggulan Perpustakaan Digital Kami
            </h1>
            <p class="lead">
              Buka dunia pengetahuan dengan perpustakaan digital kami yang dilengkapi dengan perpustakaan komponen premium, memudahkan Anda menjelajahi ranah digital dengan lancar.
            </p>
          </div>
        </div>
        <div class="row g-16 g-md-24">
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="icon icon-shape icon-lg bg-warning text-white text-lg rounded-circle mb-7">
              <i class="bi bi-search"></i>
            </div>
            <h5 class="h4 font-semibold mb-2">Temuan Tanpa Usaha</h5>
            <p class="lh-relaxed">
              Temukan dan jelajahi berbagai sumber daya digital dengan lancar tanpa kesulitan.
            </p>
          </div>
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="icon icon-shape icon-lg bg-warning text-white text-lg rounded-circle mb-7">
              <i class="bi bi-book"></i>
            </div>
            <h5 class="h4 font-semibold mb-2">Koleksi Digital yang Beragam</h5>
            <p class="lh-relaxed">
              Telusuri koleksi digital kami yang beragam, yang telah dirangkai dengan cermat untuk eksplorasi Anda.
            </p>
          </div>
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="icon icon-shape icon-lg bg-warning text-white text-lg rounded-circle mb-7">
              <i class="bi bi-globe"></i>
            </div>
            <h5 class="h4 font-semibold mb-2">Aksesible dari Mana Saja</h5>
            <p class="lh-relaxed">
              Nikmati kebebasan untuk mengakses perpustakaan digital kami dari mana saja, kapan saja.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="login py-20 py-lg-32">
      <div class="container max-w-screen-xl">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 text-center">
            <h1 class="ls-tight font-bolder mb-5">
              Masuk untuk Akses Penuh
            </h1>
            <p class="lead mb-10">
              Untuk menggunakan fitur-fitur khusus dan meminjam buku, masuklah ke akun perpustakaan digital Anda.
            </p>
            <div class="mx-n2">
              <a href="/auth/login" class="btn btn-md btn-dark shadow-sm mx-2 px-lg-8">
                Login
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="faq py-24">
      <div class="container max-w-screen-xl">
        <h1 class="ls-tight font-bolder text-center mb-10">
          Pertanyaan Umum (FAQ)
        </h1>
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h3 class="accordion-header" id="faqHeading1">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                Apa itu perpustakaan digital?
              </button>
            </h3>
            <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Perpustakaan digital adalah platform online yang menyediakan akses instan ke berbagai koleksi buku digital, jurnal, dan sumber daya pendidikan lainnya. Pengguna dapat menjelajahi dan membaca materi secara elektronik.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header" id="faqHeading2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                Bagaimana cara saya melakukan pencarian buku?
              </button>
            </h3>
            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Untuk mencari buku, masuk ke halaman list buku, gunakan kotak pencarian di bagian kanan atas halaman. Anda dapat memasukkan judul buku untuk menemukan buku yang Anda cari.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header" id="faqHeading3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                Bagaimana saya dapat mengakses perpustakaan digital dari perangkat seluler?
              </button>
            </h3>
            <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Perpustakaan digital kami dapat diakses melalui perangkat seluler. Pastikan Anda terhubung ke internet dan buka situs web perpustakaan dari browser di ponsel atau tablet Anda.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection