@extends('merchant.category.index')

@section('category_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold">Category List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-table" class="table  data-table table-hover">
                            <thead class="table-header-style">
                            <tr>
                                <th>#SL</th>
                                <th>Restaurant Name</th>
                                <th>Category Name</th>
{{--                                <th>Action</th>--}}
                            </tr>
                            </thead>
                            <tbody class="order-table-body">
                            @if (!empty($restaurants))
                                @foreach ($restaurants as $k => $restaurant)
                                    @if (count($restaurant->categories)>0)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $restaurant->restaurant_name }}</td>
                                            <td>
                                                @foreach ($restaurant->categories as $k => $restaurant_categories)
                                                    <span class="bg-secondary text-white p-2 m-1">
                                                        {{ $restaurant_categories->categories->name}}
                                                    </span>
                                                @endforeach
                                            </td>
{{--                                            <td>--}}
{{--                                                <a href="#" class="btn btn-outline-info"><i class="bi bi-eye"></i></a>--}}
{{--                                                <a href="{{route('merchant.category.edit', $restaurant->restaurant_id)}}" class="btn btn-outline-secondary ms-2"><i class="bi bi-pencil"></i></a>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
