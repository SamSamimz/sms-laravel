@include('partials.header')
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('components.sidebar')
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('components.topbar')

                @yield('content')
                
            </div>
        </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</div>
    <!-- Footer -->
        <footer class="py-3 bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SMS - Laravel <a target="__blank" href="https://www.facebook.com/samimislam.samim.980">Sam Samim</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
@include('partials.footer')