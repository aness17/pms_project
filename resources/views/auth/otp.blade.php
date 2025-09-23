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
  <link rel="shortcut icon" href="{{ asset('images/btn_new_color.png') }}" />
</head>

<body>
  <div class="container-scroller d-flex" style="background-color:#125EFA !important; min-height:100vh;">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background:transparent !important;">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 30px;">
              <div class="brand-logo text-center mb-2">
                <img src="{{ asset('images/btn_new_color.png') }}" alt="logo" style="max-width: 150px;">
              </div>
              {{-- FORM OTP --}}
              <form class="pt-3" action="{{ route('otp.verify') }}" method="POST">
                @csrf
                <div class="text-center mb-2">
                  <small style="font-family: Poppins; font-size: 15px; color: #777777;">
                    Kode OTP telah dikirimkan ke
                    <span style="font-weight: 600;">****.rivaldi@btn.co.id</span>,
                    mohon masukkan kode yang diterima pada kolom di bawah.
                  </small>
                </div>
                <div class="form-group mb-2">
                  <input type="text" name="otp" class="form-control form-control-lg" placeholder="INPUT KODE OTP" required>
                </div>
                <div class="text-center mb-2">
                  <small style="font-family: Poppins; font-size: 14px; color: #777777;">
                    Kode OTP akan kadaluwarsa dalam <br>
                    <b style="font-size:16px; color:#333;">5 menit 59 detik</b>
                  </small>
                </div>
                <div class="form-group mb-2">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    VERIFIKASI OTP
                  </button>
                </div>
              </form>
              <div class="text-center">
                <small style="font-family: Poppins; font-size: 14px; color: #777777;">
                  Tunggu 27 detik untuk mengirim ulang OTP <br>
                  <a href="" style="font-size:14px; color:#125EFA;">Kirim Ulang OTP</b>
                </small>
              </div>

              {{-- ERROR MESSAGE --}}
              @if ($errors->any())
              <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
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
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
</body>

</html>