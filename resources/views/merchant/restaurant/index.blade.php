@extends('merchant.index')

@section('dashboard_content')
    @yield('restaurant_content')
    @push('scripts')
        <script src="{{ asset('assets/merchant_assets/js/imageRead.js') }}"></script>
    @endpush
@endsection
