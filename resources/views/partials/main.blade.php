@extends('partials.raw')

@section('head')
    @yield('head')
@endsection

@section('template-content')
    @include('partials.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('partials.sidebar')
        <!-- partial -->
        <div class="main-panel">
            @yield('content')
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            @include('partials.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
@endsection

@section('js')
    @yield('js')
@endsection