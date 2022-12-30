<x-layouts.base>
    @include('components.layout.frontend.navbar')

    {{ $slot }}

    @include('components.layout.frontend.footer')

    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div>
</x-layouts.base>
