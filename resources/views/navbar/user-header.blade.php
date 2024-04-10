<div class="row align-items-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <!-- Bg -->
        <div class="pt-16 rounded-top-md"
            style="
                    background: url(../assets/images/background/profile-bg.jpg) no-repeat;
                    background-size: cover;
                ">
        </div>
        <div
            class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
            <div class="d-flex align-items-center">
                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                    <img src="{{ auth()->user()->profile_photo_url }}"
                        class="avatar-xl rounded-circle border border-4 border-white" alt="" />
                </div>
                <div class="lh-1">
                    <h2 class="mb-0">
                        {{ Auth::user()->name }}
                    </h2>
                    <p class="mb-0 d-block">{{ '@' . Auth::user()->name }}</p>
                </div>
            </div>
            <div>
                @if(Auth::user()->user_type == 'App\Models\Admin')
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm d-none d-md-block">Go
                    to
                    Dashboard</a>
                @endif
            </div>
        </div>
    </div>
</div>