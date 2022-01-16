@extends('merchant.food.index')

@section('food_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold">Food List</h5>
                </div>
                <div class="card-header float-right">
                    <a class="btn btn-outline-primary justify-content-end float-end"
                       href="{{ route('merchant.food.create') }}">+ Add New
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-table" class="table data-table table-hover">
                            <thead class="table-header-style">
                            <tr>
                                <th>#SL</th>
                                <th>Image</th>
                                <th>Restaurant Name</th>
                                <th>Food Item Name</th>
                                <th>Food Item Code</th>
                                <th>Category Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="order-table-body">
                            @if (!empty($foods))
                                @foreach ($foods as $k => $food)
                                    @if($food->restaurant->user_id == auth()->id())
                                        <tr>
                                            <td>{{ $food->id }}</td>
                                            <td>
                                                <img src="{{ asset('images/item_images/' . $food->image) }}" alt="image"
                                                     width="60" height="60"/>
                                            </td>
                                            <td>{{ $food->restaurant->restaurant_name }}</td>
                                            <td>{{ $food->name }}</td>
                                            <td>{{ $food->food_code }}</td>
                                            <td>{{ $food->category->name }}</td>
                                            <td>{{ $food->price }}</td>
                                            <td class="text-{{ $food->status == 1 ? 'success' : 'danger' }}">
                                                {!! $food->status == 1 ? 'ACTIVE' : 'INACTIVE' !!}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                       id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu rounded-0"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <a href="{{route('merchant.food.show', $food->id)}}"
                                                           class="btn btn-outline-info p-2 ms-3" title="Show"><i
                                                                class="bi bi-eye"></i></a>
                                                        <a href="{{route('merchant.food.edit', $food->id)}}"
                                                           class="btn btn-outline-secondary p-2 ms-2" title="Edit"><i
                                                                class="bi bi-pencil"></i></a>
                                                        @if ($food->status == 0)
                                                            <a href="{{ route('merchant.food.status', $food->id) }}"
                                                               class="btn btn-outline-success p-2 ms-2"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Active"><i
                                                                    class="bi bi-check-square"></i></a>
                                                        @else
                                                            <a href="{{ route('merchant.food.status', $food->id) }}"
                                                               class="btn btn-outline-warning p-2 ms-2"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Inactive"><i class="bi bi-slash-square"></i></a>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
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
