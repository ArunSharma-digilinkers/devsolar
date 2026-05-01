@include('layouts.admin-header')

{{-- Sidebar --}}
@include('layouts.admin-sidebar')

<div class="admin-wrapper">

    {{-- Navbar --}}
    @include('layouts.admin-navigation')

    {{-- Content --}}
    <div class="admin-main-content">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('layouts.admin-footer')

</div>