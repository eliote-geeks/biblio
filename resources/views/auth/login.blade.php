<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codescandy.com/geeks-bootstrap-5/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jun 2022 16:18:20 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Geeks is a fully responsive and yet modern premium bootstrap 5 template & snippets. Geek is feature-rich components and beautifully designed pages that help you create the best possible website and web application projects. Bootstrap Snippet " />
    <meta name="keywords"
        content="Geeks UI, bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />




    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../assets/fonts/feather/feather.css" rel="stylesheet">
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
    <link href="../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="../assets/libs/prismjs/themes/prism-okaidia.min.css" rel="stylesheet">
    <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    <link href="../assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet">
    <link href="../assets/libs/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>Sign in | </title>
    <style>
      /* Ajoutez du style CSS pour le fond d'image et l'effet de superposition sombre */
      body {
          background-image: url('../assets/images/background/img4.jpg');
          background-size: contain;
          background-position: relative;
          background-color: rgba(0, 0, 0, 0.5);
          position: relative;
      }
  
      .overlay {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5); /* Couleur de superposition sombre */
      }
  </style>
</head>

<body>
    <!-- Page content -->

    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">

            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow ">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="../index.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4"
                                    alt=""></a>
                            <h1 class="mb-1 fw-bold">Sign in</h1>
                            <span>Don’t have an account? <a href="{{ route('register') }}" class="ms-1">Sign
                                    up</a></span>

                            <div class='text-danger'>
                                <x-validation-errors class="mb-4" />
                            </div>
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ session('status') }}
                                </div>
                            @endif


                        </div>
                        <!-- Form -->
                        <form method='POST' action="{{ route('login') }}">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Email address here" required>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="**************" required>
                            </div>
                            <!-- Checkbox -->
                            <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberme">
                                    <label class="form-check-label " for="rememberme">Remember me</label>
                                </div>
                                <!-- <div>
                  <a href="forget-password.html">Forgot your password?</a>
                </div> -->
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary ">Sign in</button>
                                </div>
                            </div>
                            <hr class="my-4">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- <img src="../assets/images/background/img1.jpg" alt="" srcset=""> --}}
    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/odometer/odometer.min.js"></script>
    <script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
    <script src="../assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="../assets/libs/prismjs/prism.js"></script>
    <script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="../assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="../assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script src="../assets/libs/fullcalendar/main.min.js"></script>
    <script src="../assets/libs/%40lottiefiles/lottie-player/dist/lottie-player.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/libs/nouislider/dist/nouislider.min.js"></script>
    <script src="../assets/libs/wnumb/wNumb.min.js"></script>
    <script src="../assets/libs/glightbox/dist/js/glightbox.min.js"></script>



    <!-- CDN File for moment -->
    <script src='../../../cdn.jsdelivr.net/npm/moment%402.29.1/min/moment.min.js'></script>




    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>
</body>


<!-- Mirrored from codescandy.com/geeks-bootstrap-5/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jun 2022 16:18:20 GMT -->

</html>
