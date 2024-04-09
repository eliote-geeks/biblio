<div class="pt-5 pb-5">
    <div class="container">
        <!-- User info -->
        @include('navbar.user-header')
        <!-- Content -->
        <div class="row mt-0 mt-md-4">
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Side navbar -->

                @include('navbar.user-nav')

            </div>

            {{ $slot }}

        </div>
    </div>
</div>

