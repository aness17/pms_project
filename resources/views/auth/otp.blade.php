<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PremSy</title>
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/btn2.png') }}" />
</head>

<body>
  <div class="container-scroller d-flex" style="background-color:#125EFA !important; min-height:100vh;">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background:transparent !important;">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 30px;">
              <div class="brand-logo text-center mb-2">
                <img src="{{ asset('images/btn_new_color.png') }}" alt="logo" style="max-width: 150px;"><br>
                <small style="font-family: Poppins; font-size: 20px; color: #474141ff;">
                  Premise Monitoring System
                </small>
              </div>

              @if(session('message'))
              <div class="alert alert-success">{{ session('message') }}</div>
              @endif

              @if(!empty($message))
              <div class="alert alert-success">{{ $message }}</div>
              @endif

              {{-- FORM OTP --}}
              <form class="pt-3" action="{{ route('otp.verify') }}" method="POST">
                @csrf
                <div class="text-center mb-2">
                  <small style="font-family: Poppins; font-size: 15px; color: #777777;">
                    Kode OTP telah dikirimkan ke
                    <span style="font-weight: 600;">{{ $email }}</span>,
                    mohon masukkan kode yang diterima pada kolom di bawah.
                  </small>
                </div>

                <div class="form-group mb-2">
                  <input type="hidden" name="email" value="{{ $email }}">
                  <input type="text" name="otp" class="form-control form-control-lg" placeholder="Kode OTP" required>
                </div>

                <div class="text-center mb-2">
                  <small style="font-family: Poppins; font-size: 14px; color: #777777;">
                    Kode OTP akan kadaluwarsa dalam <br>
                    <b id="countdown" style="font-size:16px; color:#333;">00:00</b>
                  </small>
                </div>

                <div class="form-group mb-2">
                  <button type="submit" class="btn btn-primary btn-lg w-100" style="border-radius: 30px;">
                    VERIFIKASI OTP
                  </button>
                </div>
              </form>

              <div class="text-center">
                <small style="font-family: Poppins; font-size: 14px; color: #777777;">
                  <span id="resend-text">Tunggu <b id="resend-timer">30</b> detik untuk mengirim ulang OTP</span> <br>

                  <!-- form POST untuk resend -->
                  <form id="resend-form" method="POST" action="{{ route('resend.otp') }}" style="display:none;">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                  </form>

                  <a href="#" id="resend-link" style="display:none; font-size:14px; color:#125EFA;"
                    onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
                    Kirim Ulang OTP
                  </a>
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

  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('js/jquery.cookie.js') }}"></script>

  <script>
    // waktu awal diisi dari server (seconds)
    let countdownTime = @json(isset($expiresIn) ? (int) $expiresIn : 300);
    let countdownEl = document.getElementById("countdown");

    function updateCountdown() {
      if (countdownTime <= 0) {
        countdownEl.textContent = "00:00";
        return;
      }
      let minutes = Math.floor(countdownTime / 60);
      let seconds = countdownTime % 60;
      countdownEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      countdownTime--;
    }

    updateCountdown();
    let otpTimer = setInterval(() => {
      updateCountdown();
      if (countdownTime < 0) clearInterval(otpTimer);
    }, 1000);

    // resend timer (30 detik)
    let resendTime = 30;
    let resendTimerEl = document.getElementById("resend-timer");
    let resendText = document.getElementById("resend-text");
    let resendLink = document.getElementById("resend-link");

    let resendTimer = setInterval(() => {
      resendTimerEl.textContent = resendTime;
      resendTime--;

      if (resendTime < 0) {
        clearInterval(resendTimer);
        resendText.style.display = "none";
        resendLink.style.display = "inline";
      }
    }, 1000);
  </script>
</body>

</html>