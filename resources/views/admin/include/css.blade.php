<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="icon" type="image/x-icon" href="{{asset('frontend_upload_asset/upload_assets/images/favicon/'.$admin_dashboard_setting->favicon)}}">
<link rel="stylesheet" href="{{asset('/assets/admin_assets/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<link rel="stylesheet" href="{{asset('/assets/admin_assets/plugin/summernote/css/summernote.css')}}">
<!-- izi toastr -->
<link rel="stylesheet" href="{{asset('/assets/admin_assets/plugin/izi_toastr/toastr.min.css')}}">
<!-- end -->
<link rel="stylesheet" href="{{asset('/assets/admin_assets/plugin/sweetalert/sweetalert2.min.css')}}">

<link rel="stylesheet" href="{{asset('/assets/admin_assets/plugin/datatable/datatables.min.css')}}" />
<!-- export button -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<!-- end -->
        {!! Toastr::message() !!}

<!-- <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" /> -->
<link rel="stylesheet" href="{{asset('/assets/admin_assets/css/style.css')}}" />
<title>{{$admin_dashboard_setting->dashboard_name}}</title>
@yield('css')
<style>
body {
overflow-x: hidden !important;
}
</style>