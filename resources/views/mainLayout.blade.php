@include('layouts.header')

<!-- Page Wrapper -->
<div id="wrapper">

    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('layouts.topbar')

            @yield('content')

        </div>
            <!-- End of Main Content -->

        @include('layouts.dashboard-footer')

    </div>
        <!-- End of Content Wrapper -->

</div>
    <!-- End of Page Wrapper -->           


@include('layouts.footer')