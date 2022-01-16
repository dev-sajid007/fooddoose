@extends('merchant.food.index')

@section('food_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Food Item Create</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{ route('merchant.food.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Item Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Enter Item Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Restaurant Name</label>
                                        <select class="form-control" name="restaurant_id">
                                            <option selected disabled>Choose One</option>
                                            @if (!empty($restaurants))
                                                @foreach ($restaurants as $k => $restaurant)
                                                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <select class="form-control" name="category_id">
                                            <option selected disabled>Choose One</option>
                                            @if (!empty($restaurants))
                                                @foreach ($restaurants as $k => $restaurant)
                                                    @foreach ($restaurant->categories as $k => $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Quantity</label>
                                        <input class="form-control" type="number" name="quantity" placeholder="0pc">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input class="form-control" type="number" name="price" placeholder="0.00">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="form-group mt-3">
                                                <label for="exampleInputEmail1">Extra</label>
                                                <select class="form-control js-example-basic-multiple" name="extra_item[]"
                                                    multiple="multiple">
                                                    @if (!empty($extras))
                                                        @foreach ($extras as $k => $extra)
                                                            <option value="{{ $extra->id }}">{{ $extra->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                {{-- <select class="form-control"> --}}
                                                {{-- <option selected disabled value="">Choose One</option> --}}
                                                {{-- @if (!empty($extras)) --}}
                                                {{-- @foreach ($extras as $k => $extra) --}}
                                                {{-- <option value="{{$extra->id}}">{{$extra->name}}</option> --}}
                                                {{-- @endforeach --}}
                                                {{-- @endif --}}
                                                {{-- </select> --}}
                                            </div>
                                        </div>
                                        <div class="col-3 mt-3">
                                            <button type="button" class="btn btn-outline-primary mt-4" data-toggle="modal"
                                                data-target="#exampleModalCenter">+ Add New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input class="form-check-input" type="checkbox" value="selected" name="is_discount" id="isDiscountSelected">
                                        <label class="form-check-label" for="isDiscountSelected">
                                            Discount
                                        </label>
                                    </div>
                                    <div class="form-group mt-3 discountInput">
                                        <label for="exampleInputEmail1">Discount Type</label>
                                        <select class="form-control" name="discount_type">
                                            <option selected disabled>Choose One</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 discountInput">
                                        <label for="exampleInputEmail1">Discount Price</label>
                                        <input class="form-control" type="number" name="discount_price"
                                            placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input class="form-control" type="file" name="image" accept=".jpg, .png, .gif"
                                            onchange="readURL(this, 'photoView');">
                                        <b id="photoViewAlert" class="text-danger hide">
                                            Maximum allowed size is 5 MB
                                        </b>
                                        <img id="photoView" alt="image" class="mt-2 img-fluid img-thumbnail hide">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Short Description</label>
                                        <input class="form-control" type="text" name="short_description"
                                            placeholder="Enter Short Description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Long Description</label>
                                        <textarea id="summernote" name="long_description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="justify-content-end float-end btn btn-outline-success mt-4">Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('merchant.extends.extraCreate')
    @push('scripts')
        <script>
            $(document).ready(function() {
                // $('#summernote').summernote();
                $(".discountInput").hide();
                $('.js-example-basic-multiple').select2({
                    placeholder: "Choose One",
                });
            });

            $('#isDiscountSelected').click(function() {
                if ($(this).prop('checked')) {
                    $(".discountInput").show();
                } else {
                    $(".discountInput").hide();
                }
            });
        </script>
    @endpush
@endsection
