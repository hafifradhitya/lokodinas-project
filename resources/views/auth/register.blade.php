<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard PRO - Premium Bootstrap 4 Admin Template</title>

    <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ url('assets/css/argon.css') }}" type="text/css">
</head>

<body class="bg-default" style="overflow: hidden;">
    <style>
        .font-weight-700 {
            font-weight: 700;
        }

        .text-muted {
            color: #6c757d;
        }

        .text-success {
            color: #28a745;
        }

        .text-danger {
            color: #dc3545;
        }

        .text-warning {
            color: #ffc107;
        }

        .text-info {
            color: #17a2b8;
        }
    </style>
    <div class="main-content">
        <div class="header bg-gradient-primary py-7 py-lg-4 pt-lg-4">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-8">
                                <img src="{{ asset('foto_identitas/favpertmin.png')}}" alt="Your Icon" class="mb-3" style="width: 50px; height: 50px;">
                                <div class="card bg-secondary border-0">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <div class="text-center text-muted mb-1">
                                            <h1>sign up</h1>
                                            <span>Create an New account</span>
                                        </div>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="username" name="username" type="text" required autofocus autocomplete="username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Email" name="email" type="email" required autocomplete="username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" required autofocus autocomplete="new-password" onkeyup="checkPasswordStrength(this.value)">
                                                </div>
                                                <div class="text-muted font-italic mt-2">
                                                <small>Password strength: <span id="strengthText"></span></small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="password_confirmation" name="password_confirmation" type="password">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary mt-2">Create account</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

    <script src="{{ url('assets/js/argon.js') }}"></script>

    <script src="{{ url('assets/js/demo.min.js') }}"></script>

    <script>
        function checkPasswordStrength(password) {
            let strengthText = document.getElementById('strengthText');
            let strength = 0;

            if (password.length >= 8) strength += 1;
            if (password.match(/[a-z]+/)) strength += 1;
            if (password.match(/[A-Z]+/)) strength += 1;
            if (password.match(/[0-9]+/)) strength += 1;
            if (password.match(/[\W]+/)) strength += 1;

            switch (strength) {
                case 1:
                    strengthText.innerHTML = '<span class="text-danger font-weight-700">Very Weak</span>';
                    break;
                case 2:
                    strengthText.innerHTML = '<span class="text-danger font-weight-700">Weak</span>';
                    break;
                case 3:
                    strengthText.innerHTML = '<span class="text-warning font-weight-700">Moderate</span>';
                    break;
                case 4:
                    strengthText.innerHTML = '<span class="text-info font-weight-700">Strong</span>';
                    break;
                case 5:
                    strengthText.innerHTML = '<span class="text-success font-weight-700">Very Strong</span>';
                    break;
                default:
                    strengthText.innerHTML = '';
            }
        }
    </script>
</body>

</html>