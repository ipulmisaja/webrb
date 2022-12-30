<x-layouts.base>
    <section class="section">
        <div class="container mt-5 text-center">
            <img src="{{ secure_asset('vendor/onepage/img/favicon.png') }}" alt="logo" width="12%" class="mb-2">
            <div class="row text-left">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <span class="h6 font-weight-bold">Backend Website Reformasi Birokrasi</span>
                        </div>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.base>
