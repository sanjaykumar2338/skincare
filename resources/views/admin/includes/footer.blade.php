<!-- jQuery -->
<script src="{{url('/asset/customer/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('/asset/customer/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('/asset/customer/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('/asset/customer/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('/asset/customer/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('/asset/customer/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/asset/customer/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('/asset/customer/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('/asset/customer/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('/asset/customer/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('/asset/customer/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/asset/customer/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/asset/customer/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/asset/customer/dist/js/pages/dashboard.js')}}"></script>

<script src="{{url('/asset/customer/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('/asset/customer/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{url('/asset/chat/js/chat.js')}}?v={{time()}}"></script> 
<style type="text/css">
  #example2_filter,#example3_filter{
    float: right;
  }
</style>
<script>
  $(function () {    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength":8
    });
  });

  $(function () {    
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength":5,
      "scrollX": true
    });
  });
</script>
<script>
$("#search_fld").on("keyup", function() {
  var value = $(this).val().toLowerCase().trim();
  var v = value.split("%");
  $(".list li").each(function(j,k) {
    var s = true;
    $.each(v, function(i, x) {
      if (s) {
        s = $(k).text().toLowerCase().indexOf(x) > -1;
      }
    });
    $(this).toggle(s);
  });
});
</script>
</body>
</html>
