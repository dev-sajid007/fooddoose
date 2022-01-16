<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('merchant.include.css_link')
    <title>Food Doose Dashboard</title>
</head>

<body>
    <!--###########################   main navigation  ########################################### -->
    @include('merchant.layout.header')

    <!--###########################    side navigation offcanvas ########################################### -->
    @include('merchant.layout.sidebar')

    <!--###########################    main content body ########################################### -->
    <main class="mt-5 pt-5">
        <div class="container-fluid">
            @yield('dashboard_content')
        </div>
    </main>
    
    @include('merchant.include.js_link')
    
</body>

</html>