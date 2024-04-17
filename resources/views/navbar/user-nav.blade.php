<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
    <!-- Menu -->
    <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
    <!-- Button -->
    <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light"
        type="button" data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="fe fe-menu"></span>
    </button>
    <!-- Collapse navbar -->
    <div class="collapse navbar-collapse" id="sidenav">
        <div class="navbar-nav flex-column">
            <span class="navbar-header">Subscription</span>
            <!-- List -->
            <ul class="list-unstyled ms-n2 mb-4">
                <!-- Nav item -->
                <li class="nav-item {{ Request::routeIs('myBooks') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('myBooks') }}"><i
                            class="fe fe-calendar nav-icon"></i>My
                        Books</a>
                </li>

            </ul>
            <span class="navbar-header">Account Settings</span>
            <!-- List -->
            <ul class="list-unstyled ms-n2 mb-0">
                <!-- Nav item -->
                <li class="nav-item {{ Request::routeIs('profileUser') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profileUser') }}"><i
                            class="fe fe-settings nav-icon"></i>Edit Profile</a>
                </li>
                <!-- Nav item -->
                <li class="nav-item {{ Request::routeIs('user.security') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.security') }}"><i
                            class="fe fe-user nav-icon"></i>Security</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="notifications.html"><i
                            class="fe fe-bell nav-icon"></i>Notifications</a>
                </li> --}}
                
                <!-- Nav item -->
                <li class="nav-item {{ Request::routeIs('user.delete') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.delete') }}"><i
                            class="fe fe-trash nav-icon"></i>Delete
                        Profile</a>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
						@csrf
						<div class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
										this.closest('form').submit(); " role="button">
								<i class="fe fe-power me-2"></i>

								{{ __('Log Out') }}
							</a>
						</div>
					</form>
                </li>
            </ul>
        </div>
    </div>
</nav>