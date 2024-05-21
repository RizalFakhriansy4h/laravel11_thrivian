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
            background: url('/assets/img/intro-banner.png') no-repeat center center/cover;
        }
        #banner-home .banner-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 2rem;
        }
        #banner2, #banner3, #banner4, #register-section {
            padding: 5rem 0;
        }
        #banner3 {
            background-color: #3EABD9;
            color: white;
        }
        #banner3 .text-content {
            padding-left: 7rem;
        }
        #register-section {
            background-color: #3EABD9;
            color: white;
            text-align: center;
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
            max-width: 100px;
            height: auto;
        }
        @media (max-width: 767.98px) {
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
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container d-flex justify-content-center"> 
                <a class="navbar-brand" href="{{ route('intro') }}">
                    <img src="/assets/img/Thrivian.org.png" alt="" width="180" height="40" style="display: block; margin: 0 auto;">
                </a>
            </div>
        </nav>
    </header>

    <div class="container-fluid p-0">
        <section id="banner-home">
            <div class="banner-content">
                <h1 class="text-dark fw-600 mb-4" style="font-size: 48px">Selamat Datang di Thrivian!</h1>
                <p class="pa-5 text-dark fw-500 mb-5">Bukan Sekedar Komunitas biasa, Ini tempat yang Mendukung Mimpi dan Mendorongmu Maju,
                    Dapatkan Dukungan dan Motivasi yang Tak Terbatas dalam Perjalananmu Mencapai Tujuan
                    Mari terhubung dan temukan lebih banyak hal yang menginspirasi di dunia sosial, bisnis, kesehatan, pendidikan, teknologi dan masih banyak lagi.
                </p>
                <div class="d-flex flex-column flex-md-row justify-content-center">
                    <a href="#" class="button mb-2 mb-md-0 px-3 py-3 me-md-4" style="border-radius: 15px; border: 2px solid black; background-color: transparent; color: black;">
                        <span><i class="bi bi-download me-1"></i></span> Download for Mobile
                    </a>
                    <a href="{{ route('login') }}" class="button px-3 py-3" style="border-radius: 15px; border: 2px solid black; background-color: #13005A; color: #fff;">
                        Log In with your Browser
                    </a>
                </div>
            </div>
        </section>

        <section id="banner2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-content">
                        <h2 class="fw-bold">Bosan Berkarya Sendirian? <br>Merasa Terjebak dalam Rutinitas?</h2>
                        <p>Di sini, kamu akan menemukan komunitas yang <br>mengerti kebutuhanmu dan siap mendukungmu dalam <br>mencapai mimpi-mimpimu.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="/assets/img/banner2-introduction.png" alt="Community Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section id="banner3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="/assets/img/banner3-introduction.png" alt="Community Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 text-content">
                        <h2 class="fw-bold">Temukan peluang, inspirasi, dan <br>alat yang Anda butuhkan untuk <br>kesuksesan dalam dunia bisnis.</h2>
                    </div>
                </div>
            </div>
        </section>

        <section id="banner4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-content">
                        <h2 class="fw-bold ms-3">Jalin hubungan baru, dan <br>terlibat dalam komunitas yang <br>peduli dan bersemangat.</h2>
                    </div>
                    <div class="col-md-6">
                        <img src="/assets/img/banner4-introduction.png" alt="Community Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section id="register-section">
            <div class="container d-flex flex-column align-items-center">
                <div class="row align-items-center">
                    <div class="col text-content text-center">
                        <h2 class="fw-bold mb-5">Belum bergabung dengan Thrivian?</h2>
                        <p class="mb-5">Jangan lewatkan kesempatan untuk terhubung dengan ribuan orang yang memiliki minat dan tujuan serupa. Daftar sekarang dan mulai <br>petualangan baru Anda bersama kami!</p>
                        <a href="{{ route('register') }}" class="button px-5 py-3" style="border-radius: 15px; border: 2px solid black; background-color: #13005A; color: #fff;">
                            Daftar Sekarang!
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer id="footer">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-12 d-flex justify-content-center justify-content-md-start align-items-center mb-3">
                    <img src="/assets/img/Thrivian.org.png" alt="logo-thrivian" class="footer-logo">
                </div>
                <hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
                <div class="col-md-3 footer-col">
                    <h6>Column One</h6>
                    <ul>
                        <li>Twenty One</li>
                        <li>Thirty Two</li>
                        <li>Fourty Three</li>
                        <li>Fifty Four</li>
                    </ul>
                </div>
                <div class="col-md-3 footer-col">
                    <h6>Column Two</h6>
                    <ul>
                        <li>Sixty Five</li>
                        <li>Seventy Six</li>
                        <li>Eighty Seven</li>
                        <li>Ninety Eight</li>
                    </ul>
                </div>
                <div class="col-md-3 footer-col">
                    <h6>Column Three</h6>
                    <ul>
                        <li>One Two</li>
                        <li>Three Four</li>
                        <li>Five Six</li>
                        <li>Seven Eight</li>
                    </ul>
                </div>
                <div class="col-md-3 footer-col">
                    <h6 class="mb-3">Column Four</h6>
                    <div class="app-buttons">
                        <img src="/assets/img/app-store.png" alt="App Store">
                        <img src="/assets/img/g-play.png" alt="Google Play">
                    </div>
                    <h6 class="py-3">Join Us</h6>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p>Thrivian.org @ 2024. All rights reserved.</p>
                <p class="p-footer">
                    <a href="#">Eleven</a> |
                    <a href="#">Twelve</a> |
                    <a href="#">Thirteen</a>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
