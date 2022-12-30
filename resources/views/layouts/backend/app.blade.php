<x-layouts.base>
    <div class="main-wrapper main-wrapper-1">
        {{-- Navbar --}}
        @include('components.layout.backend.navbar')

        {{-- Main content --}}
        {{ $slot }}

        {{-- Footer --}}
        @include('components.layout.backend.footer')
    </div>
</x-layouts.base>
