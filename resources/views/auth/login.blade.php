<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PremSy</title>

    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/btn2.png') }}" />
    <!-- font poppins -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .container-scroller {
            background-color: #125EFA !important;
            min-height: 100vh;
        }

        .content-wrapper {
            background: transparent !important;
        }

        .logo-brand,
        img {
            max-width: 150px;
        }

        .logo-brand,
        small {
            font-weight: 500;
            font-size: 20px;
            color: #6c6c6c;
        }

        .rounded-30 {
            border-radius: 30px !important;
        }

        .error-mandatory {
            font-size: 70%;
            font-style: italic;
            color: rgb(232, 83, 71);
            font-weight: 500;
            margin-left: 1.25rem;
        }

        .alert {
            font-size: 80%;
            font-weight: 500;
            text-align: center;
            padding: 0.5rem;
        }

        .error {
            border: 1px solid rgb(232, 83, 71);
        }

        .eyestyle {
            color: rgb(100, 100, 100);
            position: absolute;
            top: 50%;
            right: 40px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded-30">
                            <div class="brand-logo text-center mb-2">
                                <img src="{{ asset('images/btn_new_color.png') }}" alt="logo"><br>
                                <small>
                                    Premise Monitoring System
                                </small>
                            </div>
                            {{-- FORM LOGIN --}}
                            <form class="pt-3" action="{{ route('login.process') }}" method="POST">
                                @csrf
                                <div class="form-group row mb-1">
                                    <div class="col-12">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="UserAD" autocomplete="off" />
                                    </div>
                                    <div class="col-12">
                                        <span class="error-mandatory" id="error-username"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <div class="col-12 position-relative">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="password" autocomplete="off" />
                                        <div id="showhide">
                                            <i class="mdi mdi-eye-off eyestyle" id="iconPassowrd"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="error-mandatory" id="error-password"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary w-100 rounded-30">
                                        LOGIN
                                    </button>
                                </div>
                            </form>

                            {{-- ERROR MESSAGE --}}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                <!-- User terkunci. Lapor kepada sistem administrator untuk melanjutkan -->
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- base:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("form").on("submit", function(event) {
                if (!checkValidation()) {
                    event.preventDefault()
                }
            });

            $("#showhide").click(function() {
                var inputPass = document.getElementById("password");
                var typePass = inputPass.getAttribute("type") === "password" ? "text" : "password";
                inputPass.setAttribute("type", typePass);

                var iconPass = document.getElementById("iconPassowrd");
                var typeIconPass = iconPass.getAttribute("class") === "mdi mdi-eye-off eyestyle" ? "mdi mdi-eye eyestyle" : "mdi mdi-eye-off eyestyle";
                iconPass.setAttribute("class", typeIconPass);
            });
        });

        function checkValidation() {
            let isValid = true;
            var firstInvalid = null;

            let usernameInput = $("input[name='username']");
            let passwordInput = $("input[name='password']");

            if (usernameInput.val().trim() === "") {
                $("#error-username").text("UserAD is required");
                usernameInput.addClass("error");
                isValid = false;
                // if (!firstInvalid) firstInvalid = useradInput;
            } else {
                usernameInput.removeClass("error");
                $("#error-userad").text("");
            }

            if (passwordInput.val().trim() === "") {
                $("#error-password").text("Password is required");
                passwordInput.addClass("error");
                isValid = false;
                // if (!firstInvalid) firstInvalid = passwordInput;
            } else {
                passwordInput.removeClass("error");
                $("#error-password").text("");
            }

            // if (firstInvalid) {
            //     firstInvalid.focus();
            // }

            return isValid;
        }
    </script>
</body>

</html>