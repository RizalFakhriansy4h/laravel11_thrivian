<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Introduction Thrivian</title>
    <style>
        .nav-item:hover .nav-link {
        text-decoration: underline;
        }

        .profile-info {
        display: none;
        position: absolute;
        top: 40px;
        right: 0;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        z-index: 1;
        }

        .nav-item .profile:hover .profile-info {
        display: block;
        }

        .profile-info a {
        text-decoration: none;
        color: #333;
        display: block;
        }

        .profile-info a:hover {
        text-decoration: underline;
        }
        .profile-info p {
        margin: 5px 0;
        color: #333;
        }

        .icon.user.outline {
        color: black;
        }
        #banner-home {
            position: relative;
            height: 60vh;
            width: 100%;
            background: url('/assets/img/comunity_new_banner.png') no-repeat center center/cover;
        }

        #banner-home::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4); /* Mengatur kegelapan, sesuaikan nilainya */
            z-index: 1;
        }

    #banner-home * {
        position: relative;
        z-index: 2;
    }

    #banner-home .banner-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 2rem;
    }
    #banner2 {
        padding: 4rem 0;
    }
    #register-section {
    position: relative;
    background: url('/assets/img/comunity_new_banner.png') no-repeat center center/cover;
    color: white;
    text-align: center;
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}

#register-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4); /* Adjust opacity to make it darker or lighter */
    z-index: -1;
}
#banner-home,
#banner2,
#banner3,
#banner4,
#register-section {
    animation: fadeUpAnimation 1s ease-in-out forwards;
}

@keyframes fadeUpAnimation {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

        #footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
        }
        #footer .footer-col {
            margin-bottom: 1rem;
        }
        #footer .footer-col h6 {
            font-weight: bold;
        }
        #footer .footer-col ul {
            list-style: none;
            padding: 0;
        }
        #footer .footer-col ul li {
            margin-bottom: 0.5rem;
        }
        #footer .social-icons i {
            font-size: 1.5rem;
            margin-right: 0.5rem;
            color: #015AAA;
        }
        #footer .app-buttons img {
            height: 40px;
            margin-right: 0.5rem;
        }
        #footer .footer-bottom {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
            margin-top: 1rem;
            text-align: center;
        }
        #footer .footer-logo {
            max-width: 90px;
            height: auto;
        }
        @media (max-width: 768px) {
            #banner-home {
                height: auto;
                padding: 2rem 0;
            }
            #banner-home .banner-content {
                position: static;
                transform: none;
                padding: 2rem;
            }
            #banner2 .text-content, #banner3 .text-content, #banner4 .text-content {
                padding: 0 1rem;
                display: flex;
                justify-content: center;
                
            }
            #register-section {
                height: auto;
                padding: 4rem 0;
            }
            #footer .footer-bottom {
                text-align: center;
            }
            #footer .footer-col {
                text-align: center;
            }
            #footer .footer-logo {
                margin-bottom: 1rem;
            }
            .container, .container-fluid {
                padding-right: 15px;
                padding-left: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Logo Thrivian yang berada diatas secara fixed -->
    <header>
        <nav class="navbar navbar-light bg-light fixed-top mb-4">
            <div class="container d-flex justify-content-center"> 
                <a class="navbar-brand" href="{{route('intro')}}">
                    <img src="/assets/img/Thrivian Logo_OK.png" alt="" width="50" height="50" style="display: block; margin: 0 auto;">
                </a>
            </div>
        </nav>
    </header>

    <!-- Banner utama yang berisi selamat datang dan tombol Sign In -->
    <div class="container-fluid p-0" style="margin-top: 60px;">
        <section id="banner-home" class="mt-5">
            <div class="banner-content">
                <h4 class="text-light fw-600 mb-4" style="font-size: 28px">Selamat Datang di Thrivian!</h4>
                <p class="pa-5 text-light fw-500 mb-5">Bukan Sekedar Komunitas biasa, Ini tempat yang Mendukung Mimpi dan Mendorongmu Maju,
                    Dapatkan Dukungan dan Motivasi yang Tak Terbatas dalam Perjalananmu Mencapai Tujuan
                    Mari terhubung dan temukan lebih banyak hal yang menginspirasi di dunia sosial, bisnis, kesehatan, pendidikan, teknologi dan masih banyak lagi.
                </p>
                <div class="d-flex flex-column flex-md-row justify-content-center">
                    <a href="{{route('login')}}" class="button px-5 py-3 rounded-pill" style=" background-color: #fff; color: #015AAA;">
                       <strong> Sign Up Now !</strong>
                    </a>
                </div>
            </div>
        </section>

        <!-- Banner 2 -->
        <section id="banner2" class="d-flex align-items-center justify-content-center text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8" style="color: #015AAA;">
                        <h2 class="fw-bold">Bosan Berkarya Sendirian? Merasa Terjebak dalam Rutinitas?</h2>
                        <p>Di sini, kamu akan menemukan komunitas yang mengerti kebutuhanmu dan siap mendukungmu dalam mencapai mimpi-mimpimu.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Banner 3 -->
        <section id="banner3" class="d-flex">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-12">
                        <img src="/assets/img/banner-tiga.png" alt="Community Image" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </section>

        <!-- Banner 4 -->
        <section id="banner4" class="d-flex">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-12">
                        <img src="/assets/img/Frame 756.png" alt="Community Image" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </section>

        <!-- Banner penutup -->
        <section id="register-section">
            <div class="container d-flex flex-column align-items-center">
                <div class="row align-items-center">
                    <div class="col text-content text-center">
                        <h2 class="fw-bold">Belum bergabung dengan Thrivian?</h2>
                        <h3 class="mb-5 fw-normal">Jangan lewatkan kesempatan untuk terhubung dengan ribuan orang yang memiliki minat dan tujuan serupa. Daftar sekarang dan mulai <br>petualangan baru Anda bersama kami!</h3>
                        <a href="{{route('login')}}" class="button px-5 py-3 rounded-pill" style=" background-color: #fff; color:#015AAA;">
                            <strong>Make Your Journey Now !</strong>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer id="footer">
        <div class="container" style="color: #015AAA;">
            <div class="row text-center text-md-start">
                <div class="col-md-12 d-flex justify-content-center justify-content-md-start align-items-center mb-3">
                    <img src="/assets/img/Thrivian Logo_OK.png" alt="logo-thrivian" class="footer-logo">
                </div>
                <hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
                <div class="col-md-3 footer-col">
                    <h6 class="pb-3">Thrivian.org</h6>
                    <ul>
                        <li>Tentang Kami</li>
                        <li>Kontak Kami</li>
                        <li>Merchandise</li>
                        <li>Blog</li>
                    </ul>
                </div>
                <div class="col-md-3 footer-col">
                    <h6 class="pb-3">Layanan Kami</h6>
                    <ul>
                        <li>Community</li>
                        <li>Event</li>
                        <li>E-Learning</li>
                        <li>Bantuan</li>
                    </ul>
                </div>
                <div class="col-md-3 footer-col">
                    <h6 class="pb-3">Lainnya</h6>
                    <ul>
                        <li>Syarat dan Ketentuan</li>
                        <li>Keijakam Privasi</li>
                    </ul>
                </div>
                <div class="col-md-3 footer-col">
                    <h6 class="mb-3">Ikuti Kami</h6>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center pt-5">
                <p>Thrivian.org @ 2024. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Fungsi untuk animasi fade up
  window.addEventListener('load', function() {
    const animatedElements = document.querySelectorAll('#banner-home .banner-content, #banner2, #banner3, #banner4, #register-section');

    function animateOnScroll() {
      animatedElements.forEach(function(element) {
        const elementPosition = element.getBoundingClientRect().top;
        const viewportHeight = window.innerHeight;

        if (elementPosition < viewportHeight) {
          element.classList.add('animate');
        }
      });
    }

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); 
  });
</script>
</body>
</html>