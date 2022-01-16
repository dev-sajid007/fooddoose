@extends('merchant.index')

@section('dashboard_content')
    @yield('food_content')
    @push('scripts')
        <script src="{{ asset('assets/merchant_assets/js/imageRead.js') }}"></script>

        <script>
            $(document).ready(function () {
                // $('#summernote').summernote();
                $(".discountInput").hide();
                $('.js-example-basic-multiple').select2({
                    placeholder: "Choose One",
                });
            });

            $('#restaurant_id').change(function () {
                let id = $(this).val();
                $.ajax({
                    type: 'get',
                    url: `{{ route('merchant.get-category', '') }}/${id}`,
                    success: function (response) {
                        console.log(response.data)
                    }
                });
            })

            $('#isDiscountSelected').click(function () {
                if ($(this).prop('checked')) {
                    $(".discountInput").show();
                } else {
                    $(".discountInput").hide();
                }
            });
        </script>

    @endpush
@endsection
