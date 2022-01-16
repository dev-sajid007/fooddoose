@extends('merchant.index')

@section('dashboard_content')
    @yield('restaurant_content')
    @push('scripts')
        <script></script>
    @endpush
@endsection
