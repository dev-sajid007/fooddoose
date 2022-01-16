@extends('merchant.index')

@section('dashboard_content')
    @yield('food_content')
    @push('scripts')
        <script src="{{ asset('assets/merchant_assets/js/imageRead.js') }}"></script>
    @endpush
@endsection
