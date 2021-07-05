 <!-- /.content-wrapper -->
 <footer class="main-footer">
     <div class="float-right d-none d-sm-block">
         <b>Version</b> 1.1.0
     </div>
     <strong>Copyright &copy; <?= date("Y") ?> <a href="javascript:void(0)">Muzaki Karomah</a>.</strong> All rights reserved.
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- Select2 -->
 <script src="<?= BASE_URL ?>assets/plugins/select2/js/select2.full.min.js"></script>
 <!-- Bootstrap4 Duallistbox -->
 <script src="<?= BASE_URL ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
 <!-- InputMask -->
 <script src="<?= BASE_URL ?>assets/plugins/moment/moment.min.js"></script>
 <script src="<?= BASE_URL ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
 <!-- date-range-picker -->
 <script src="<?= BASE_URL ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- bootstrap color picker -->
 <script src="<?= BASE_URL ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?= BASE_URL ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Bootstrap Switch -->
 <script src="<?= BASE_URL ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- BS-Stepper -->
 <script src="<?= BASE_URL ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
 <!-- dropzonejs -->
 <script src="<?= BASE_URL ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= BASE_URL ?>assets/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= BASE_URL ?>assets/dist/js/demo.js"></script>
 <!-- SweetAlert2 -->
 <script src="<?= BASE_URL ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
 <!-- Toastr -->
 <script src="<?= BASE_URL ?>assets/plugins/toastr/toastr.min.js"></script>
 <!-- Page specific script -->
 <script>
     const BASE_URL = "<?= BASE_URL ?>";
     $(function() {
         var a = $("#sidebar_nav li a");
         $.each(a, function(i, val) {
             if (val.className == "nav-link active") {
                 var parent = val.parentElement.parentElement.parentElement;
                 var previus = val.parentElement.parentElement.previousElementSibling;
                 if (parent != undefined) {
                     parent.className = "nav-item menu-open";
                 }
                 if (previus != undefined) {
                     previus.className = "nav-link active";
                 }
             }
         });

         //Initialize Select2 Elements
         $('.select2').select2()

         //Initialize Select2 Elements
         $('.select2bs4').select2({
             theme: 'bootstrap4'
         })

         //Datemask dd/mm/yyyy
         $('#datemask').inputmask('dd/mm/yyyy', {
             'placeholder': 'dd/mm/yyyy'
         })
         //Datemask2 mm/dd/yyyy
         $('#datemask2').inputmask('mm/dd/yyyy', {
             'placeholder': 'mm/dd/yyyy'
         })
         //Money Euro
         $('[data-mask]').inputmask()

         //Date picker
         $('#reservationdate').datetimepicker({
             format: 'L'
         });

         //Date and time picker
         $('#reservationdatetime').datetimepicker({
             icons: {
                 time: 'far fa-clock'
             }
         });

         //Date range picker
         $('#reservation').daterangepicker()
         //Date range picker with time picker
         $('#reservationtime').daterangepicker({
             timePicker: true,
             timePickerIncrement: 30,
             locale: {
                 format: 'MM/DD/YYYY hh:mm A'
             }
         })
         //Date range as a button
         $('#daterange-btn').daterangepicker({
                 ranges: {
                     'Today': [moment(), moment()],
                     'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                     'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                     'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                     'This Month': [moment().startOf('month'), moment().endOf('month')],
                     'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                 },
                 startDate: moment().subtract(29, 'days'),
                 endDate: moment()
             },
             function(start, end) {
                 $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
             }
         )

         //Timepicker
         $('#timepicker').datetimepicker({
             format: 'LT'
         })

         //Bootstrap Duallistbox
         $('.duallistbox').bootstrapDualListbox()

         //Colorpicker
         $('.my-colorpicker1').colorpicker()
         //color picker with addon
         $('.my-colorpicker2').colorpicker()

         $('.my-colorpicker2').on('colorpickerChange', function(event) {
             $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
         })

         $("input[data-bootstrap-switch]").each(function() {
             $(this).bootstrapSwitch('state', $(this).prop('checked'));
         })

     })

     toastr.options = {
         "closeButton": true,
         "debug": false,
         "newestOnTop": false,
         "progressBar": false,
         "positionClass": "toast-bottom-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }

     function showToast(type, message) {
         switch (type) {
             case "success":
                 toastr["success"](message, "Berhasil!");
                 break;
             case "error":
                 toastr["error"](message, "<span style='font-size:20px'><b>Gagal!</b></span>");
                 break;
         }
     }

     function logout() {
         Swal.fire({
             title: 'Yakin Logout?',
             text: "Apakah Anda Yakin Mau Logout?",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Lanjut',
             cancelButtonText: 'Batal'
         }).then((result) => {
             if (result.isConfirmed) {
                 window.location.href = BASE_URL + "admin/logout.php";
             }
         })
     }

     toastr.options = {
         "closeButton": true,
         "debug": false,
         "newestOnTop": false,
         "progressBar": false,
         "positionClass": "toast-bottom-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }

     function showToast(type, message) {
         switch (type) {
             case "success":
                 toastr["success"](message, "<span style='font-size:20px'><b>Berhasil!</b></span>");
                 break;
             case "error":
                 toastr["error"](message, "<span style='font-size:20px'><b>Gagal!</b></span>");
                 break;
         }
     }

     function deletechecked() {
         if (confirm("Apakah anda yakin menghapus data ini?")) {
             return true;
         } else {
             return false;
         }
     }


     // BS-Stepper Init
 </script>
 <?php if (isset($flashdata)) { ?>
     <script type="text/javascript">
         showToast('<?= $flashdata['type'] ?>', "<?= $flashdata['message'] ?>");
         <?php if ($flashdata['message'] == "Hapus Data Berhasil") { ?>
             window.history.pushState({}, 'Title', window.location.href.split("?")[0]);
         <?php } else { ?>

         <?php } ?>
     </script>
 <?php } ?>

 </body>

 </html>