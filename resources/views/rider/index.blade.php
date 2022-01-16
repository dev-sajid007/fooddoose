<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('assets/rider_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

    <link href="{{ asset('assets/rider_assets/plugin/summernote/summernote.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/rider_assets/plugin/sweetalert/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/rider_assets/plugin/datatable/datatables.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/rider_assets/plugin/toaster/jquery.toast.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" /> -->
    <link href="{{ asset('assets/rider_assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    @stack('styles')

    <title>Food Doose Dashboard</title>
    <style>
        body {
            overflow-x: hidden !important;
        }

    </style>
</head>

<body>
    <!--###########################   main navigation  ########################################### -->
    @include('rider.layout.header')

    <!--###########################    side navigation offcanvas ########################################### -->
    @include('rider.layout.sidebar')

    <!--###########################    main content body ########################################### -->
    <main class="mt-5 pt-5">
        <div class="container-fluid">
            @yield('dashboard_content')
        </div>
    </main>

{{--    <script src="{{ asset('assets/rider_assets/js/jquery-3.5.1.js') }}"></script>--}}
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{ asset('assets/rider_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/rider_assets/plugin/chatjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/rider_assets/plugin/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/rider_assets/plugin//sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/rider_assets/plugin/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/rider_assets/plugin/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/rider_assets/js/script.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">--}}
{{--    </script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        @if (Session::has('message_success'))
            toastr.options = {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('message_success') }}");
        @endif
    </script>
    @stack('scripts')
</body>

</html>
