<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title') | {{ env('APP_NAME','Select & Rent') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('/')}}assets/images/favicon.ico">
        <!-- Plugin css -->
        <link href="{{asset('/')}}assets/libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap css -->
        <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{asset('/')}}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        <!-- icons -->
        <link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- Head js -->
        <script src="{{asset('/')}}assets/js/head.js"></script>
        
        <link href="{{asset('/')}}assets/css/admin.css" rel="stylesheet" type="text/css" />

        <!-- company dashboard css -->
        <link href="{{asset('/')}}assets/css/company-dashboard.css" rel="stylesheet" type="text/css" id="app-style"/>
        
        {{-- For Delete Confirmation  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    </head>
    <body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="dark" data-leftbar-size='default' data-sidebar-user='false'>
        @include('admin.layouts.navbar')
        @include('admin.layouts.leftbar')
        <div id="wrapper">
            <div class="content-page">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- To check status --}}
                @if(session('status'))
                <div class="alert alert-success" id="div1">{{ session('status') }}</div>
                @endif
                @if(session('statusDanger'))
                <div class="alert alert-danger" id="div1">{{ session('statusDanger') }}</div>
                @endif
                
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row justify-content-center">
                            @include('admin.layouts.rightbar')
                            @yield('content')
                            @include('admin.layouts.footer')
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightbar-overlay"></div>
        </div>
        <!-- Vendor js -->
        <script src="{{asset('/')}}assets/js/vendor.min.js"></script>
        <!-- plugin js -->
        <script src="{{asset('/')}}assets/libs/moment/min/moment.min.js"></script>
        <script src="{{asset('/')}}assets/libs/fullcalendar/main.min.js"></script>
        <!-- Calendar init -->
        <script src="{{asset('/')}}assets/js/pages/calendar.init.js"></script>
        <!-- App js -->
        <script src="{{asset('/')}}assets/js/app.min.js"></script>
        <script src="{{asset('/')}}assets/js/admin.js"></script>
        <!-- Permissions -->
        <script src="{{asset('/')}}assets/js/admin/permissions.js"></script>
        <!-- notifications -->
        <script src="{{asset('/')}}assets/js/admin/notifications.js"></script>
        <script type="text/javascript">
            // For Delete Confirmation
            $(".btn-delete").click(function(){
                return confirm("Are you sure?");
            });
            // For Approving the company
            $(".btn-aprove-company").click(function(){
                return confirm("Are you sure to Confirm?");
            });
            // For Delete Confirmation For Activity Logs Only
            $(".btn-delete-logs").click(function(){
                return confirm("Are you sure ?");
            });
            // hide status
            $(document).ready(function(){  
                $("#div1").delay(6000).fadeOut(1500); 
            });
        </script>
        @if(auth()->check() && auth()->user()->role == 'company')
        <script>
            window.baseUrl = "{{ url('/company') }}";
        </script>
        @else
        <script>
            window.baseUrl = "{{ url('/admin') }}";
        </script>
        @endif
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

    </body>
</html>