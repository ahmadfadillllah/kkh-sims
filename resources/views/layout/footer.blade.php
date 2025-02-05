<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col-sm-6 my-1">
                {{-- <p class="m-0">Copyright with &copy; by IT Team <a href="https://ahmadfadillah.my.id"
                        target="_blank"> PT. SIMS JAYA KALTIM</a></p> --}}
            </div>
            <div class="col-sm-6 ms-auto my-1">
                <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                    <li class="list-inline-item"><a href="{{ route('dashboards.index') }}">v1.0.0</a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>
@include('layout.theme')

<!-- [Page Specific JS] start -->
<script src="{{ asset('dashboard') }}/assets/js/plugins/apexcharts.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/jsvectormap.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/world.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/world-merc.js"></script>

<script src="{{ asset('dashboard') }}/assets/js/plugins/popper.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/simplebar.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/fonts/custom-font.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/pcoded.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/feather.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/pages/custom-chart.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/sweetalert2.all.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/pages/ac-alert.js"></script>
{{-- <script src="{{ asset('dashboard') }}/assets/js/pages/w-chart.js"></script> --}}

<!-- datatable Js -->
<script src="{{ asset('dashboard') }}/assets/js/jquery-3.6.0.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/dataTables.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/flatpickr.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/script-tambahan.js"></script>


