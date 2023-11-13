<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Web Pengajuan Kartu Tenant</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing-page.css') }}">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/2a604648c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/icon/css/all.css') }}">
</head>

<body>
    <header>
        <a class="logo"><img src="{{ asset('assets/images/landing-page/logo-bdi.png') }}" alt=""></a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="fas fa-bars"></label>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#features">alur</a>
            <a href="#about">syarat</a>
            <a href="https://bdidenpasar.kemenperin.go.id/virtual_tour/">virtual tour</a>
            <a href="#contact">kontak</a>
        </nav>
        @if (Auth::guard('user')->user())
            <a class="button" href="{{ route('dashboard.admins') }}">Login</a>
        @elseif(Auth::guard('tenant')->user())
            <a class="button" href="{{ route('home.tenants') }}">Login</a>
        @else
            <a class="button" href="{{ route('login') }}">Login</a>
        @endif
        {{-- <a href="/login" class="button">login</a> --}}
    </header>

    <!-- HOME -->
    <section class="home" id="home">
        <div class="content">
            <span>SISTEM INFORMASI PENGAJUAN KARTU TENANT</span>
            <h3>Balai Diklat Industri</h3>
            <div class="asset">
                <img src="{{ asset('assets/images/landing-page/asset-garis.png') }}" alt="">
            </div>
            <p>Selamat datang di sistem informasi pengajuan karu tenant balai diklat industri denpasar. Silahkan klik tombol dibawah ini untuk melakukan login ke dalam sistem</p>
            @if (Auth::guard('user')->user())
                <a class="btn" href="{{ route('dashboard.admins') }}">Login</a>
            @elseif(Auth::guard('tenant')->user())
                <a class="btn" href="{{ route('home.tenants') }}">Login</a>
            @else
                <a class="btn" href="{{ route('login') }}">Login</a>
            @endif
        </div>
        <div class="image">
            <img src="{{ asset('assets/images/landing-page/asset-home.png') }}" alt="">
        </div>
    </section>
    <!-- HOME -->


    <!-- TATA CARA -->
    <section class="features" id="features">
        <div class="heading">
            <h1> Tata Cara Pengajuan </h1>
            <div class = box-container>
                <div class = card>
                  <div class = image>
                    <img src ="{{ asset('assets/images/landing-page/asset-1.png') }}">
                  </div>
                  <div class = "test">
                    <h3>1</h3>
                    <p>terdaftar sebagai tenant BDI</p>
                  </div>
                </div>
                <div class = card>
                    <div class = image>
                        <img src ="{{ asset('assets/images/landing-page/asset-2.png') }}">
                    </div>
                    <div class = "test">
                      <h3>2</h3>
                      <p>Lakukan login</p>
                    </div>
                  </div>
                  <div class = card>
                    <div class = image>
                        <img src ="{{ asset('assets/images/landing-page/asset-3.png') }}">
                    </div>
                    <div class = "test">
                      <h3>3</h3>
                      <p>Lengkapi data tenant</p>
                    </div>
                  </div>
                  <div class = card>
                    <div class = image>
                        <img src ="{{ asset('assets/images/landing-page/asset-4.png') }}">
                    </div>
                    <div class = "test">
                      <h3>4</h3>
                      <p>Mengisi form registrasi data anggota tenant</p>
                    </div>
                  </div>
                  <div class = card>
                    <div class = image>
                        <img src ="{{ asset('assets/images/landing-page/asset-5.png') }}">
                    </div>
                    <div class = "test">
                      <h3>5</h3>
                      <p>Menunggu Validasi dari admin</p>
                    </div>
                  </div>
                  <div class = card>
                    <div class = image>
                        <img src ="{{ asset('assets/images/landing-page/asset-6.png') }}">
                    </div>
                    <div class = "test">
                      <h3>6</h3>
                      <p>apabila validasi berhasil maka kartu tenant dapat dicetak</p>
                    </div>
                  </div>
            </div>
        </div>
    </section>
  <!-- TATA CARA -->

    <!-- S&K -->
    <section class="about" id="about">
        <h1 class="heading"> Syarat Dan Ketentuan</h1>
        <div class="column">
            <div class="image">
                <img src="{{ asset('assets/images/landing-page/asset-syarat.png') }}" alt="">
            </div>
            <div class="content">
                <h3>Syarat dan Ketentuan Pendaftaran</h3>
                <p>Klik tombol berikut ini untuk melihat syarat pengajuan dan dokumen pendaftaran tenant.</p>
                <div class="buttons">
                    <a href="{{ url('exportlaporan') }}" target="_blank" class="btn"></i> cek syarat </a>
                </div>
            </div>
        </div>
    </section>
    <!-- S&K -->


    <!-- KONTAK -->
    <section class="contact" id="contact">
        <div class="contact-in">
            <div class="contact-map"><iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63103.78503015279!2d115.2144503!3d-8.6928249!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f8dc19eff4d%3A0x81ed76786e90eb40!2sBalai%20Diklat%20Industri%20Denpasar!5e0!3m2!1sid!2sid!4v1667137737424!5m2!1sid!2sid"
                    width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            <div class="contact-form">
                <h1>Kontak Kami</h1>
                <p>Alamat : Jalan WR. Supratman No. 302 Tohpati 80237, Denpasar, bali.</p>
                <p>Telepon : (0361) 46545</p>
                <p>Email : bdidps@kemenperin.go.id</p>
                <div class="img-contact">
                    {{-- <span style="border: 0px solid rgb(255, 255, 255); border-radius: 1em; padding: 0.5em;"> --}}
                    <a href="https://instagram.com/bdi_denpasar?igshid=YmMyMTA2M2Y=" target="_blank">
                        <i class="fa-brands fa-instagram fa-3x"></i></a>
                    {{-- </span> --}}
                    {{-- <span style=" border-radius: 1em; padding: 0.5em;"> --}}
                    <a href="https://www.facebook.com/balaidiklatindustridenpasar" target="_blank">
                        <i class="fa-brands fa-facebook fa-3x"></i></a>
                    {{-- </span> --}}
                    {{-- <span style="border: 0px solid rgb(255, 255, 255); border-radius: 1px; padding: 0.5em;"> --}}
                    <a href="https://www.tiktok.com/@bdi_denpasar?_t=8X0cJA2tJaM&_r=1" target="_blank">
                        <i class="fa-brands fa-tiktok fa-3x"></i></a>
                    {{-- </span> --}}
                    {{-- <span style=" border-radius: 1px; padding: 0.5em;"> --}}
                    <a href="https://youtube.com/channel/UClbTIluO2WXoS6ABnZqtc9g" target="_blank">
                        <i class="fa-brands fa-youtube fa-3x"></i></a>
                    {{-- </span> --}}
                </div>
            </div>
    </section>
    <!-- KONTAK -->

    <!-- FOOTER -->
    <footer>
        <div class="footer">
            <h1>Copyright © Anak Magang PNB 2022/2023</h1>
        </div>
    </footer>
    <!-- FOOTER -->

    <!-- NAV SCROLL -->
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
</body>

</html>
