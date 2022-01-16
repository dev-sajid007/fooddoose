@extends('merchant.category.index')

@section('category_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Category Edit</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{ route('merchant.category.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input class="form-control" type="text" name="name"
                                               placeholder="Enter Category Name">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">
                                    <p>{{ $errors->first('name') }}</p>
                                </span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Restaurant Select</label>
                                        <select class="form-control" name="restaurant_id">
                                            <option selected disabled>Choose One</option>
                                            @if (!empty($restaurants))
                                                @foreach ($restaurants as $k => $restaurant)
                                                    <option value="{{ $restaurant->restaurant_id }}">{{ $restaurant->restaurant_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @if ($errors->has('restaurant_id'))
                                        <span class="text-danger">
                                    <p>{{ $errors->first('restaurant_id') }}</p>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit"
                                    class="justify-content-end float-end btn btn-outline-success mt-4">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
