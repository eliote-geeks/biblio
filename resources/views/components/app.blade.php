<!DOCTYPE html>
<html lang="en">



<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Geeks is a fully responsive and yet modern premium bootstrap 5 template & snippets. Geek is feature-rich components and beautifully designed pages that help you create the best possible website and web application projects. Bootstrap Snippet " />
<meta name="keywords" content="Geeks UI, bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />




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
    <title>Geeks - Library</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-default">
	<div class="container-fluid px-0">
		<a class="navbar-brand" href="/"
			><img src="assets/images/brand/logo/logo.svg" alt=""
		/></a>
		<!-- Mobile view nav wrap -->
		
		<!-- Button -->
		<button
			class="navbar-toggler collapsed"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbar-default"
			aria-controls="navbar-default"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="icon-bar top-bar mt-0"></span>
			<span class="icon-bar middle-bar"></span>
			<span class="icon-bar bottom-bar"></span>
		</button>
		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="navbar-default">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarBrowse"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
						data-bs-display="static"
					>
						Browse
					</a>
					<ul
						class="dropdown-menu dropdown-menu-arrow"
						aria-labelledby="navbarBrowse"
					>
					@foreach (\App\Models\Category::all() as $cat)
										
						<li>
							<a
								href="{{ route('category.show',$cat) }}"
								class="dropdown-item"
							>
								{{ $cat->name }}
							</a>
						</li>
						@endforeach
					</ul>
				</li>
		
			</ul>
			<form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
				<span class="position-absolute ps-3 search-icon">
					<i class="fe fe-search"></i>
				</span>
				<input
					type="search"
					class="form-control ps-6"
					placeholder="Search Courses"
				/>
			</form>
			<ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">
			

				<li class="dropdown ms-2 d-inline-block">
					<a
						class="rounded-circle"
						href="#"
						data-bs-toggle="dropdown"
						data-bs-display="static"
						aria-expanded="false"
					>
						<div class="avatar avatar-md avatar-indicators avatar-online">
							<img
								alt="avatar"
								@auth
								src="{{ Auth::user()->profile_photo_url }}"
								@endauth

								@guest 
								src="assets/images/brand/logo/logo.svg"
								@endguest
								class="rounded-circle"
							/>
						</div>
					</a>
					@auth
					<div class="dropdown-menu dropdown-menu-end">
						<div class="dropdown-item">
							<div class="d-flex">
								<div class="avatar avatar-md avatar-indicators avatar-online">
									<img
										alt="avatar"
										src="{{ Auth::user()->profile_photo_url }}"
										class="rounded-circle"
									/>
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
								<a
									class="dropdown-item"
									href="{{ route('profileUser') }}"
								>
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
										<a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" role="button">Sign Out</a>
									</div>
								</form>
							</li>
						</ul>
					</div>
					@endauth

					@guest 
					<div class="dropdown-menu dropdown-menu-end">
						
						<ul class="list-unstyled">
							<li>
								<a class="dropdown-item" href="{{ route('login') }}">
									<i class="fe fe-power me-2"></i>Login
								</a>
							</li>
						</ul>
					</div>
					@endguest
				</li>
			</ul>
		</div>
	</div>
</nav>

{{$slot}}

<div class="footer">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span>© {{ date('Y') }} Geeks. All Rights Reserved.</span>
            </div>
              <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="javascript:;">Privacy</a>
                    <a class="nav-link" href="javascript:;">Terms </a>
                    <a class="nav-link" href="javascript:;">Feedback</a>
                    <a class="nav-link" href="javascript:;">Support</a>
                </nav>
            </div>
        </div>
    </div>
</div>


    <!-- Scripts -->
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
<script src='../../cdn.jsdelivr.net/npm/moment%402.29.1/min/moment.min.js'></script>




<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>

</body>



</html>


