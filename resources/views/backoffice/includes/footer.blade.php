<!-- jQuery 2.2.3 -->
<script src="{{ asset('backoffice/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backoffice/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('backoffice/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Pace -->
<script src="{{ asset('backoffice/plugins/pace/pace.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('backoffice/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backoffice/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('backoffice/plugins/morris/morris.min.js') }}"></script> -->
<!-- Sparkline -->
<script src="{{ asset('backoffice/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('backoffice/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('backoffice/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backoffice/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('backoffice/plugins/daterangepicker/daterangepicker.js') }}"></script> -->
<!-- datepicker -->
<script src="{{ asset('backoffice/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('backoffice/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('backoffice/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backoffice/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backoffice/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('backoffice/dist/js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backoffice/dist/js/demo.js') }}"></script>
<!-- Backoffice app.js -->
<script src="{{ asset('site/backoffice/js/app.js') }}"></script>
@yield('tail')
@yield('js_bottom')
</body>
</html>
