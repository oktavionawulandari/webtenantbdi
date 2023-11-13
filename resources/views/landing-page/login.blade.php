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
    <link rel="stylesheet" href="{{ asset('assets/css/login-page.css') }}">
</head>

<body>
    <header>
        <a class="logo"><img src="{{ asset('assets/images/landing-page/logo-bdi.png') }}" style="margin-right: 78rem"
                alt=""></a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="fas fa-bars"></label>

        <nav class="navbar">
            <a href="/" class="button">home</a>
        </nav>

    </header>

    <section class="login" id="login">
        <div class="content">
            <h3>LOGIN</h3>
            <div class="asset">
                <img src="{{ asset('assets/images/landing-page/asset-garis.png') }}" alt="">
            </div>
            <form class="input" action="{{ route('post.login') }}" method="POST">
                @csrf
                <p>Username</p>
                <input class="form__email" type="username" name="username" placeholder="Masukkan Username"
                    value="{{ old('username') }}"
                    @error('username')
                            is-invalid
                        @enderror
                    id="username" />
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <p>Password</p>
                <input class="form__password" type="password"
                    @error('password')
                            is-invalid
                        @enderror
                    name="password" id="password" placeholder="Masukkan Password" />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="div">
                    <button type="submit" class="btn">login</button>
                </div>

        </div>
        <div class="image">
            <img src="{{ asset('assets/images/landing-page/asset-login.png') }}" alt="">
        </div>
    </section>

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
</head>

</html>
