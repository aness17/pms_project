<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PremSy</title>

    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"> -->

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link href="{{ asset('vendors/select2/package/dist/css/select2.min.css')}}" rel="stylesheet">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/btn2.png') }}" />
</head>

<body>
    <div class="container-scroller d-flex">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-header text-center py-2">
                <div class="d-flex justify-content-between align-items-center px-2">
                    <img src="{{ asset('images/btn_bnw.png') }}" alt="logo" class="sidebar-logo" style="max-width:120px;">
                    <button class="navbar-toggler" align-self-center id="sidebarToggle" data-toggle="minimize">
                        <span class="mdi mdi-menu text-white"></span>
                    </button>
                </div>

                <div class="mt-3 sidebar-profile text-white">
                    <img src="{{ asset('images/profile.png') }}" alt="profile" class="rounded-circle" width="100">
                    <h6 class="mt-2 mb-0 fw-bold">M. Rafly Rivaldi</h6>
                    <small>CXD</small>
                </div>
            </div>

            <ul class="nav mt-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('notification')}}">
                        <i class="mdi mdi-bell-outline menu-icon"></i>
                        <span class="menu-title">Notifications</span>
                        <div class="badge bg-danger badge-pill">100</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('audit_trail')}}">
                        <i class="mdi mdi-security menu-icon"></i>
                        <span class="menu-title">Audit Trail</span>
                    </a>
                </li>
                <hr class="text-white" style="margin:1rem;">
                <li class="nav-item sidebar-category mt-2">
                    <p>Kuesioner</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('kuisioner')}}">
                        <i class="mdi mdi mdi-comment-question-outline menu-icon"></i>
                        <span class="menu-title">Kuesioner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('response')}}">
                        <i class="mdi mdi mdi-clipboard-outline menu-icon"></i>
                        <span class="menu-title">Response</span>
                    </a>
                </li>

                <li class="nav-item sidebar-category mt-2">
                    <p>Master Data</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">User Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../docs/documentation.html">
                        <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
                        <span class="menu-title">Role Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../docs/documentation.html">
                        <i class="mdi mdi-domain menu-icon"></i>
                        <span class="menu-title">Outlet Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penilaian')}}">
                        <i class="mdi mdi mdi-wunderlist menu-icon"></i>
                        <span class="menu-title">Parameter Penilaian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../docs/documentation.html">
                        <i class="mdi mdi-note-text menu-icon"></i>
                        <span class="menu-title">Kertas Kerja</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3 position-relative">
                        <a href="#" class="nav-link position-relative">
                            <i class="mdi mdi-bell-outline fs-4"></i>
                            <span class="position-absolute start-75 translate-middle mt-2 p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/profile.png') }}" alt="profile" class="rounded-circle" width="35" height="35">
                            <span class="ms-2 fw-semibold">M. Rafly Rivaldi</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="mdi mdi-account me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="mdi mdi-settings me-2"></i> Settings</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Logout <i class="mdi mdi-logout"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                @yield('content')
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("minimized");
        });
    </script>
    <!-- base:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- DataTables core -->
    <script src="{{ asset('node_modules/datatables.net/js/dataTables.min.js') }}"></script>
    <!-- DataTables Bootstrap 4 integration -->
    <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Optional: DataTables Buttons (export Excel, PDF, Print) -->
    <script src="{{ asset('node_modules/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('node_modules/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('node_modules/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('node_modules/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('vendors/select2/package/dist/js/select2.min.js')}}"></script>

</body>
@stack('scripts')

</html>