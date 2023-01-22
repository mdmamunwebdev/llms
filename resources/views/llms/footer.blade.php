@extends('llms.master')

@section('footer')

    <!-- JAVASCRIPT -->
    <script src="{{ asset("/") }}llms/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="{{ asset("/") }}llms/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard init -->
    <script src="{{ asset("/") }}llms/assets/js/pages/dashboard.init.js"></script>

    <!-- Required datatable js -->
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset("/") }}llms/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{ asset("/") }}llms/assets/js/pages/datatables.init.js"></script>

    <!-- form repeater js -->
    <script src="{{ asset("/") }}llms/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

    <script src="{{ asset("/") }}llms/assets/js/pages/form-repeater.int.js"></script>

    <script src="{{ asset("/") }}llms/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script src="{{ asset("/") }}llms/assets/libs/select2/js/select2.min.js"></script>

    <script src="{{ asset("/") }}llms/assets/js/pages/job-list.init.js"></script>

    <!-- App js -->
    <script src="{{ asset("/") }}llms/assets/js/app.js"></script>

    <script>

        let repeaterValue = 0;
        $(document).ready(function() {

            let  breadcrumbLink = document.querySelectorAll('.breadcrumb-item')[1];
            breadcrumbLink.style.setProperty('--bs-breadcrumb-divider', 'LLMS');

            $('#data-repeater-add').click(function () {

                $('#custom-repeater').append(
                    "<div id='custom-inner-repeater-"+repeaterValue+"'  class='inner mb-3 row'  style='display: none'> <div class='col-md-10 col-8'> <input type='text' class='inner form-control' name='phone[]' placeholder='Enter your phone no...'/> </div> <div class='col-md-2 col-4'> <div class='d-grid'> <div  data-bs-toggle='tooltip' data-bs-placement='top"+repeaterValue+"' title='Cencel'> <div  onclick='cancelBtn()'  class='btn btn-sm btn-soft-secondary inner' id='cancelBtn-"+repeaterValue+"'><i id='icon' class='dripicons-cross' style='pointer-events: none;' ></i></div></div></div></div></div>"
                );

                $("#custom-inner-repeater-"+repeaterValue).show('slow')
                repeaterValue++;
            });

        });

        function cancelBtn() {
            let cId = event.target.id;

            $("#"+cId).parent().parent().parent().parent().hide('slow', function(){
                $("#"+cId).parent().parent().parent().parent().remove();
            });
        }

        // Student Image Update
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

    </script>
    </body>
    </html>

@endsection
