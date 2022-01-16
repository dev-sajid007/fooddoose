@extends('merchant.food.index')

@section('food_content')
    <div class="row">
        <div class="col-md-7 mb-3 ms-4  ">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Food Item Details</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h6>Item Name</h6>
                                <p>{{$food->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6>Restaurant Name</h6>
                                <p>{{$food->restaurant->restaurant_name}}</p>
                            </div>
                            <div class="col-6">
                                <h6>Category Name</h6>
                                <p>{{$food->category->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6>Quantity</h6>
                                <p>{{$food->quantity}} pc</p>
                            </div>
                            <div class="col-6">
                                <h6>Price</h6>
                                <p>{{$food->price}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h6>Extra Item</h6>
                                @if (!empty($food->extra_foods))
                                    <tr>
                                        @foreach ($food->extra_foods as $k => $extra)
                                            <p class="badge rounded bg-info text-dark fs-6">{{$extra->name}}</p>
                                        @endforeach
                                    </tr>
                                @endif
                            </div>
                        </div>
                        @if($food->discount_type)
                            <div class="row">
                                <div class="col-6">
                                    <h6>Discount Type</h6>
                                    <p>{{$food->discount_type}}pc</p>
                                </div>
                                <div class="col-6">
                                    <h6>Discount Price</h6>
                                    <p>{{$food->discount_price}}</p>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <h6>Short Description</h6>
                                <p>{{$food->short_description}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Long Description</h6>
                                <p>{{$food->long_description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-10 mb-3 ms-4">
                <div class="card">
                    <div class="card-header" style="background: #f46f22">
                        <h5 class="fw-bold text-white">Food Image</h5>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <img  src="{{$food->image ? asset('images/item_images/' . $food->image) : 'https://martialartsplusinc.com/wp-content/uploads/2017/04/default-image-620x600.jpg' }}"
                                        class="rounded mx-auto d-block w-75">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('merchant.food.index') }}"
           class="btn btn-outline-danger">
            Back
        </a>
    </div>
    @include('merchant.extends.extraCreate')
@endsection
