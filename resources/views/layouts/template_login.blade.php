<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css">

    <title>@yield('title')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: white;
        }
        ::placeholder {
            font-size: 16px;
        }
    </style>
</head>
<body>

    @if ($errors->any())
        <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: `
                        <ul style="text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    `,
                    confirmButtonText: 'OK'
                });
            };
        </script>
        @endif
        @if (session('alert'))
            <script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('alert') }}',
                        confirmButtonText: 'OK'
                    });
                };
            </script>
        @endif

    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: white;">
        <header>
            <nav class="navbar navbar-light bg-light fixed-top">
                <div class="container d-flex justify-content-center"> <!-- Menggunakan flexbox untuk pengaturan posisi -->
                    <a class="navbar-brand" href="{{ route('intro') }}">
                        <img src="/assets/img/Thrivian.org.png" alt="" width="180" height="40" style="display: block; margin: 0 auto;">
                    </a>
                </div>
            </nav>
        </header>

        <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: white; margin-top: 70px;">
            <div class="col-md-6 mx-auto" id="loginForm">

                <div class="row align-items-center">

                    <div class="header-text mb-4 text-center">
                        <h2>@yield('title')</h2>
                    </div>

						@yield('content')

						<div class="my-4 ms-0 ms-md-1 text-sm text-start" style="padding-left: 22%;">
                        ---------------- or continue with ----------------
                    </div>
                    <div class="input-group mb-3 mx-auto" style="width: 400px">
                        <a class="btn btn-lg btn-light w-100 fs-6 border-dark" href="{{route('google.redirect')}}" style="border-radius: 30px;"><img src="/assets/img/logo-google.png" style="width:20px" class="me-2"><small>Log In with Google</small></a>
                    </div>

                    <div class="input-group mb-3 mx-auto" style="width: 400px">
                        <a class="btn btn-lg btn-light w-100 fs-6 border-dark" style="border-radius: 30px;"><img src="/assets/img/apple-logo.png" style="width:20px" class="me-2"><small>Sign Up with Apple</small></a>
                    </div>
                    <footer>
                        <div class="d-flex justify-content-center text-align-center ">
                            <span class= "small fs-9" style="text-align: center; text-decoration: none;">
                                <a href="about_us.html" class="text-black">About Us</a> • 
                                <a href="privacy_terms.html" class="text-black">Privacy & Policy</a> • 
                                <a href="more.html" class="text-black">More</a>
                                <p class=" fs-9">Thrivian.org © 2024</p>
                            </span>
                      </footer>
                </div>
            </div>
        </div>
        </div>
    </div>
      </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('showSignUp').addEventListener('click', function () {
                document.getElementById('loginForm').style.display = 'none';
                document.getElementById('signUpForm').style.display = 'block';
            });

            document.getElementById('showLogin').addEventListener('click', function () {
                document.getElementById('loginForm').style.display = 'block';
                document.getElementById('signUpForm').style.display = 'none';
            });

            const passwordInput = document.getElementById('passwordInput');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                // Toggle eye icon
                togglePassword.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>

</body>
</html>