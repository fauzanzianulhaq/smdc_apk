@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('title', 'SMDC - Sahabat Masyarakat Desa Cileunyi')

<style>
    .button-container {
        text-align: center;
    }

    .button {
        margin-bottom: 20px; /* Menambahkan margin ke bawah tombol */
    }
</style>

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-white">SMDC</h4>
                    {{-- <p class="italic mt-0 text-white">Pengaduan Masyarakat</p> --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse button-container" id="navbarNav">
                    @if(Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-center ms-auto">
                        <li class="nav-item">
                            <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pekat.formRegister') }}" class="btn btn-outline-purple">Daftar</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <h2 class="medium text-white mt-3">Layanan Pengaduan Masyarakat</h2>
        <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>
{{-- Section Card Pengaduan --}}
<div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif

            <div class="card mb-3 ">Tulis Laporan Disini</div>
            <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>
{{-- Section Hitung Pengaduan --}}
<div class="pengaduan mt-5">
    <div class="bg-purple">
        <div class="text-center">
            <h5 class="medium text-white mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-white">10</h2>
        </div>
    </div>
</div>
{{-- Footer --}}
<div class="mt-5">
    {{-- <hr> --}}
    {{-- <div class="text-center">
        <p class="italic text-secondary">pekat (pengaduan masyarakat)</p>
    </div> --}}
</div>
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<main id="main">

    <!-- ======= About Section ======= -->
   <!-- End About Section -->

    
      </div> 
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" >
    <div class="footer-top" style="background-color: #6a70fc;">
      <div class="container" >
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-info">
            <h4>Lanjutan</h4>
            <p>Pengaduan yang masuk pada aplikasi ini nantinya akan diteruskan ke pihak berwenang atau instansi
               terkait untuk ditindaklanjuti dan direspon secepat mungkin. Dalam hal ini, aplikasi web sahabat masyarakat
                memiliki beberapa fitur utama, diantaranya:</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Data Pengaduan</h4>
            <p>Fitur ini memungkinkan untuk mengajukan pengaduan dan mengumpulkan data terkait pengaduan tersebut. 
              Biasanya, data yang diambil adalah nama pengadu, kontak informasi, jenis masalah atau keluhan yang dihadapi, dan 
              informasi tambahan yang relevan.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Formulir Pengaduan</h4>
           <p>Fitur ini memungkinkan masyarakat untuk melaporkan keluhan atau pengaduan melalui
             formulir yang tersedia. Formulir tersebut akan memuat informasi terkait jenis pengaduan,
              lokasi kejadian, dan deskripsi masalah.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak</h4>
            <p>
              Fauzan Zianul Haq <br>
              Bandung, 535022<br>
              Indonesia <br>
              <strong>Telepon: </strong>08748372849<br>
              <strong>Email: </strong>fauzanbandung@gmail.com<br>
            </p>

            

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        @Copyright 
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="public/vendor/aos/aos.js"></script>
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="public/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/js/main.js"></script>

@endsection

@section('js')
    @if (Session::has('pesan'))
    <script>
        $('#loginModal').modal('show');

    </script>
    @endif
@endsection

