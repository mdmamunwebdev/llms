<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>LLMS |  Admin &  @yield("title")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="llms abdullah al mamun" name="author" />
    <!-- App favicon -->
{{--    <link rel="shortcut icon" href="{{ asset("/") }}llms/assets/images/favicon.ico">--}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("/") }}llms/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("/") }}llms/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("/") }}llms/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset("/") }}llms/assets/images/favicon/site.webmanifest">


    <link href="{{ asset("/") }}llms/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

    <link href="{{ asset("/") }}llms/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset("/") }}llms/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/") }}llms/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset("/") }}llms/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset("/") }}llms/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset("/") }}llms/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset("/") }}llms/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!--LLMS Css-->
    <link rel="stylesheet" href="{{ asset("/") }}llms/assets/css/llms.css">

</head>
<body data-sidebar="dark" data-layout-mode="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset("/") }}llms/assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset("/") }}llms/assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset("/") }}llms/assets/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset("/") }}llms/assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <!-- App Language-->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="{{ asset("/") }}llms/assets/images/flags/us.jpg" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                                    <img src="{{ asset("/") }}llms/assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                    <img src="{{ asset("/") }}llms/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                    <img src="{{ asset("/") }}llms/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                    <img src="{{ asset("/") }}llms/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                    <img src="{{ asset("/") }}llms/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>

                        <!-- App FullScreen-->
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <!-- App Notification-->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small" key="t-view-all"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="assets/images/users/avatar-3.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">James Lemire</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="assets/images/users/avatar-4.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Salena Layfield</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- App User Info-->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset("/") }}llms/assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                                <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('llmsLogout').submit();">
                                <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                 <span key="t-logout">Logout</span>
                                </a>
                                <form action="{{ route("logout") }}" method="post" id="llmsLogout">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">LLMS | Options</li>

                            <li>
                                <a href="{{ route("dashboard") }}" class="waves-effect">
                                    <i class="bx bx-home"></i>
                                    <span key="t-chat">Home</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user-circle"></i>
                                    <span key="t-dashboards">Users</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);" key="t-blog" class="has-arrow waves-effect">Students</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{ route("manage.students") }}" key="t-light-sidebar">Manage Students</a></li>
                                            <li><a href="{{ route("add.students") }}" key="t-compact-sidebar">Add Student</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><span class="badge rounded-pill text-bg-success float-end" key="t-new">New</span> <span key="t-jobs">Staffs</span></a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-book"></i>
                                    <span key="t-dashboards">Books</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route("manage.books") }}" key="t-blog">Manage Book</a></li>
                                    <li><a href="{{ route("add.books") }}" key="t-blog">Add Book</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="waves-effect">
                                    <i class="bx bx-bell bx-tada"></i>
                                    <span key="t-chat">Notifications</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route("book.issue") }}" class="waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-chat">Issue/Return</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route("settings") }}" class="waves-effect">
                                    <i class="bx bx-cog"></i>
                                    <span key="t-dashboards">Settings</span>
                                </a>
                            </li>

                            <li>
                                <a href="" class="waves-effect" onclick="event.preventDefault(); document.getElementById('llmsLogout').submit();">
                                    <i class="bx bx-power-off"></i>
                                    <span key="t-chat">Logout</span>
                                </a>
                                <form action="{{ route("logout") }}" method="post" id="llmsLogout">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">@yield("page-title")</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">@yield("menues")</a></li>
                                            <li class="breadcrumb-item active">@yield("sub-menu")</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield("main-content")

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © LLMS.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Abdullah Al Mamun
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay">
            hey how are you
        </div>

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

    <!-- App Cunstom js Code -->
    <script>

        let repeaterValue = 0;
        $(document).ready(function() {

            let  breadcrumbLink = document.querySelectorAll('.breadcrumb-item')[1];
            breadcrumbLink.style.setProperty('--bs-breadcrumb-divider', 'LLMS');

            @if( isset($student) )

                $('#data-repeater-add').click(function () {

                    $('#custom-repeater').append(
                        "<div id='custom-inner-repeater-"+repeaterValue+"'  class='inner mb-3 row'  style='display: none'> <div class='col-md-10 col-8'> <input type='text' class='inner form-control' name='phone[]' placeholder='Enter your phone no...'/> </div> <div class='col-md-2 col-4'> <div class='d-grid'> <div  data-bs-toggle='tooltip' data-bs-placement='top"+repeaterValue+"' title='Cencel'> <div  onclick='cancelBtn()'  class='btn btn-sm btn-soft-secondary inner' id='cancelBtn-"+repeaterValue+"'><i id='icon' class='dripicons-cross' style='pointer-events: none;' ></i></div></div></div></div></div>"
                    );

                    $("#custom-inner-repeater-"+repeaterValue).show('slow')
                    repeaterValue++;
                });

            @elseif( isset($book) )

                $('#data-repeater-add').click(function () {

                    $('#custom-repeater').append(
                        "<div id='custom-inner-repeater-"+repeaterValue+"'  class='inner mb-3 row'  style='display: none'> <div class='col-md-10 col-8'> <input type='text' class='inner form-control text-capitalize' name='author[]' placeholder='Author Name'/> </div> <div class='col-md-2 col-4'> <div class='d-grid'> <div  data-bs-toggle='tooltip' data-bs-placement='top"+repeaterValue+"' title='Cencel'> <div  onclick='cancelBtn()'  class='btn btn-sm btn-soft-secondary inner' id='cancelBtn-"+repeaterValue+"'><i id='icon' class='dripicons-cross' style='pointer-events: none;' ></i></div></div></div></div></div>"
                    );

                    $("#custom-inner-repeater-"+repeaterValue).show('slow')
                    repeaterValue++;
                });

            @endif

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


        // App Alert
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

        const alert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible bg-success bg-soft text-success" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }

        @if( Session::get('stdMessage') )
            let message =  '{{ Session::get('stdMessage') }}';

            alert(message, 'success')         // Calling function for app alert showing
            setTimeout( appAlertHide, 10000); // Calling function for app alert stoping
        @endif

        function appAlertHide(){
            document.getElementById('liveAlertPlaceholder').style.display = 'none';
        }

        $("#department").change(function () {

            // $.get('book/issue/return/analysis/'+dept,  function(data){
            //     // Display the returned data in browser
            //     $("#result").html(data);
            //
            // })

            let dept = $(this).val();
            $.ajax({
                type: "GET",
                url : "{{ url('book/issue/return/analysis/') }}",
                data: { dept: dept },
                dataType: "JSON",
                success: function (response) {
                    $("#allBook").text(response.allBook);
                    $("#bookAvailableACal").text(response.bookAvailableACal+" %");
                    $("#lostBookCal").text(response.lostBookCal+" %");
                    $("#bookingCal").text(response.bookingCal+" %");
                    // $("#fineCal").text(response.fineCal);
                },
            })
        });

    </script>
</body>
</html>


