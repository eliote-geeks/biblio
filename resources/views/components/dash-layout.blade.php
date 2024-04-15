<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codescandy.com/geeks-bootstrap-5/pages/dashboard/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jun 2022 16:16:31 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Geeks is a fully responsive and yet modern premium bootstrap 5 template & snippets. Geek is feature-rich components and beautifully designed pages that help you create the best possible website and web application projects. Bootstrap Snippet " />
    <meta name="keywords"
        content="Geeks UI, bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">
    <!-- Libs CSS -->
    <link href="assets/fonts/feather/feather.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="assets/libs/prismjs/themes/prism-okaidia.min.css" rel="stylesheet">
    <link href="assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    <link href="assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet">
    <link href="assets/libs/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <title>Dashboard | Geeks - Admin Dashboard </title>
</head>

<body>
    <!-- Wrapper -->
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <nav class="navbar-vertical navbar navbar-dark bg-dark">
            <div class="vh-100" data-simplebar>
                <!-- Brand logo -->
                <a class="navbar-brand" href="../../index.html">
                    <img src="assets/images/brand/logo/logo-inverse.svg" alt="" />
                </a>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('dashboard')) active @endif"
                            href="{{ route('dashboard') }}">
                            <i class="nav-icon fe fe-home me-2"></i> Dashboard
                        </a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link  collapsed @if (request()->routeIs(['category.index', 'book.index'])) active @endif " href="#"
                            data-bs-toggle="collapse" data-bs-target="#navCourses" aria-expanded="false"
                            aria-controls="navCourses">
                            <i class="nav-icon fe fe-book me-2"></i> Books
                        </a>
                        <div id="navCourses" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @if (request()->routeIs('category.index')) active @endif "
                                        href="{{ route('category.index') }}">
                                        All Category
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if (request()->routeIs('book.index')) active @endif"
                                        href="{{ route('book.index') }}">
                                        All Books
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link " href="admin-course-category-single.html">
                                        Category Single
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link   collapsed @if (request()->routeIs('student.index')) active @endif " href="#"
                            data-bs-toggle="collapse" data-bs-target="#navProfile" aria-expanded="false"
                            aria-controls="navProfile">
                            <i class="nav-icon fe fe-user me-2"></i> User
                        </a>
                        <div id="navProfile" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="admin-instructor.html">
                                        Instructor
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('student.index') }}">Students</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Nav item -->
                    <li class="nav-item ">
                        <a class="nav-link   collapsed @if (request()->routeIs('ebook.index')) active @endif  " href="#"
                            data-bs-toggle="collapse" data-bs-target="#navCMS" aria-expanded="false"
                            aria-controls="navCMS">
                            <i class="nav-icon fe fe-book-open me-2"></i> Ebooks
                        </a>
                        <div id="navCMS" class="collapse  " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link   active  " href="{{ route('ebook.index') }}">
                                        All Ebooks
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item ">
                        <a class="nav-link   collapsed @if (request()->routeIs('order.index')) active @endif  "
                            href="#" data-bs-toggle="collapse" data-bs-target="#navProject"
                            aria-expanded="false" aria-controls="navProject">
                            <i class="nav-icon fe fe-file me-2"></i> Orders
                        </a>
                        <div id="navProject" class="collapse  " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('order.index') }}">
                                        List of orders
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="project-list.html">
                                        List
                                    </a>
                                </li> --}}


                            </ul>
                        </div>
                    </li>






                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                            data-bs-target="#navAuthentication" aria-expanded="false"
                            aria-controls="navAuthentication">
                            <i class="nav-icon fe fe-lock me-2"></i> Authentication
                        </a>
                        <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="../sign-in.html">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  " href="../sign-up.html">Sign Up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../forget-password.html">
                                        Forget Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  " href="notification-history.html">
                                        Notifications
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  " href="../404-error.html"> 404 Error</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <!-- Nav item -->
                    <li class="nav-item">
                        <div class="nav-divider"></div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <div class="navbar-heading">Apps</div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link " href="chat-app.html">
                            <i class="nav-icon fe fe-message-square me-2"></i> Chat

                        </a>
                    </li>

                    <!-- Nav item -->

                    <li class="nav-item">
                        <div class="nav-divider"></div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <div class="navbar-heading">Components</div>
                    </li>
                    <!-- Nav item -->

                    <!-- Nav item -->

                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                            data-bs-target="#navSiteSetting" aria-expanded="false" aria-controls="navSiteSetting">
                            <i class="nav-icon fe fe-settings me-2"></i> Site Setting
                        </a>
                        <div id="navSiteSetting" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="setting-general.html">
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="setting-google.html">
                                        Google
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="setting-social.html">
                                        Social
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="setting-social-login.html">
                                        Social Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="setting-payment.html">
                                        Payment
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="setting-smpt.html">
                                        SMPT
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                </ul>
                <!-- Card -->
                {{-- <div class="card bg-dark-primary shadow-none text-center mx-4 my-8">
                    <div class="card-body py-6">
                        <img src="assets/images/background/giftbox.png" alt="" />
                        <div class="mt-4">
                            <h5 class="text-white">Unlimited Access</h5>
                            <p class="text-white-50 fs-6">
                                Upgrade your plan from a Free trial, to select ‘Business Plan’. Start Now
                            </p>
                            <a href="#" class="btn btn-white btn-sm mt-2">Upgrade Now</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </nav>
        <!-- Page Content -->
        <div id="page-content">
            <div class="header">
                <!-- navbar -->
                <nav class="navbar-default navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#">
                        <i class="fe fe-menu"></i>
                    </a>
                    <div class="ms-lg-3 d-none d-md-none d-lg-block">
                        <!-- Form -->
                        <form class="d-flex align-items-center">
                            <span class="position-absolute ps-3 search-icon">
                                <i class="fe fe-search"></i>
                            </span>
                            <input type="search" class="form-control form-control-sm ps-6"
                                placeholder="Search Entire Dashboard" />
                        </form>
                    </div>
                    <!--Navbar nav -->
                    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">

                        <!-- List -->
                        <li class="dropdown ms-2">
                            <a class="rounded-circle" href="#" role="button" id="dropdownUser"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ Auth::user()->profile_photo_url }}"
                                        class="rounded-circle" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                <div class="dropdown-item">
                                    <div class="d-flex">
                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                            <img alt="avatar" src="{{ Auth::user()->profile_photo_url }}"
                                                class="rounded-circle" />
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                            <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <ul class="list-unstyled">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('profileUser') }}">
                                            <i class="fe fe-user me-2"></i>Profile
                                        </a>
                                    </li>

                                </ul>
                                <div class="dropdown-divider"></div>
                                <ul class="list-unstyled">
                                    <li>
                                        <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="nav-item">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                                    role="button">Sign Out</a>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <main>
                {{ $slot }}

            </main>


            <!-- Script -->
            <!-- Libs JS -->
            <script src="assets/libs/jquery/dist/jquery.min.js"></script>
            <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/odometer/odometer.min.js"></script>
            <script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
            <script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
            <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
            <script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
            <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
            <script src="assets/libs/quill/dist/quill.min.js"></script>
            <script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
            <script src="assets/libs/dragula/dist/dragula.min.js"></script>
            <script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
            <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
            <script src="assets/libs/jQuery.print/jQuery.print.js"></script>
            <script src="assets/libs/prismjs/prism.js"></script>
            <script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
            <script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
            <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
            <script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
            <script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
            <script src="assets/libs/typed.js/lib/typed.min.js"></script>
            <script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
            <script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
            <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
            <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
            <script src="assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
            <script src="assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
            <script src="assets/libs/fullcalendar/main.min.js"></script>
            <script src="assets/libs/%40lottiefiles/lottie-player/dist/lottie-player.js"></script>
            <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>
            <script src="assets/libs/nouislider/dist/nouislider.min.js"></script>
            <script src="assets/libs/wnumb/wNumb.min.js"></script>
            <script src="assets/libs/glightbox/dist/js/glightbox.min.js"></script>



            <!-- CDN File for moment -->
            <script src='../../../../cdn.jsdelivr.net/npm/moment%402.29.1/min/moment.min.js'></script>




            <!-- Theme JS -->
            <script src="assets/js/theme.min.js"></script>

</body>


<!-- Mirrored from codescandy.com/geeks-bootstrap-5/pages/dashboard/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jun 2022 16:18:19 GMT -->

</html>
