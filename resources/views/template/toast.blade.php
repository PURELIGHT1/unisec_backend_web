 @if(Session::has('success'))
 <script>
     toastr.success("{{ Session::get('success') }}", "Berhasil")
 </script>
 @endif

 @if(Session::has('error'))
 <script>
     toastr.error("{{ Session::get('error') }}", "Berhasil")
 </script>
 @endif

 @if(Session::has('warning'))
 <script>
     toastr.warning("{{ Session::get('warning') }}", "Berhasil")
 </script>
 @endif

 @if(Session::has('info'))
 <script>
     toastr.info("{{ Session::get('info') }}", "Berhasil")
 </script>
 @endif