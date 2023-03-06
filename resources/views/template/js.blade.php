 <!-- Main scripts -->
 <script src="{{ asset('vendors/bundle.js') }}">
 </script>

 <!-- Fullcalendar -->
 <script src="{{ asset('/') }}vendors/fullcalendar/moment.min.js"></script>
 <script src="{{ asset('/') }}vendors/fullcalendar/fullcalendar.min.js"></script>
 <script src="{{ asset('/') }}assets/js/examples/fullcalendar.js"></script>

 <!-- Clockpicker -->
 <script src="{{ asset('/') }}vendors/clockpicker/bootstrap-clockpicker.min.js"></script>
 <script src="{{ asset('/') }}assets/js/examples/clockpicker.js"></script>

 <!-- Datepicker -->
 <script src="{{ asset('/') }}vendors/datepicker/daterangepicker.js"></script>
 <script src="{{ asset('/') }}assets/js/examples/datepicker.js"></script>

 <script src="{{ asset('/') }}assets/js/examples/pages/calendar.js"></script>

 <!-- DataTable -->
 <script src="{{ asset('/') }}vendors/dataTable/datatables.min.js"></script>
 <script src="{{ asset('/') }}assets/js/examples/datatable.js"></script>

 <!-- Dashboard scripts -->
 <script src="{{ asset('/') }}assets/js/examples/pages/dashboard.js"></script>

 <!-- App scripts -->
 <script src="{{ asset('/') }}assets/js/app.min.js"></script>

 <!-- Prism -->
 <script src="{{ asset('/') }}vendors/prism/prism.js"></script>


 <!-- Lightbox -->
 <script src="{{ asset('/') }}vendors/lightbox/jquery.magnific-popup.min.js"></script>
 <script src="{{ asset('/') }}assets/js/examples/lightbox.js"></script>

 <!-- Toast -->
 <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>

 </body>

 <script>
     $('input[name="tanggal"]').daterangepicker({
         singleDatePicker: true,
         showDropdowns: true
     });

     function klik() {
         $change = 1;
     }
 </script>
 @extends('template.toast')

 </html>