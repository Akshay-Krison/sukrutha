                </div>
                <!-- container-fluid" -->
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        <script src="{{ asset('asset/admin/js/jquery.slim.min.js') }}"></script>
        <script src="{{ asset('asset/admin/js/popper.min.js') }}"></script>
        <script src="{{ asset('asset/admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('asset/admin/js/bootstrap-select.js') }}"></script>
        <script src="{{ asset('asset/admin/js/sidebar.js') }}"></script>
        <script src="{{ asset('asset/admin/js/custom.js') }}"></script>
        <script type="text/javascript">
            window.BASE_URL = '{{ url('') }}';
        </script>
        @stack('javascript')