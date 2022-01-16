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
                        <table id="order-table" class="table  data-table table-hover">
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
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('item_images/' . $food->image) }}" alt="image"
                                                    width="60" height="60" />
                                            </td>
                                            <td>{{ $food->restaurant->name }}</td>
                                            <td>{{ $food->name }}</td>
                                            <td>{{ $food->food_code }}</td>
                                            <td>{{ $food->category->name }}</td>
                                            <td>{{ $food->price }}</td>
                                            <td class="text-{{ $food->status == 1 ? 'success' : 'danger' }}">
                                                {!! $food->status == 1 ? 'ACTIVE' : 'INACTIVE' !!}</td>
                                            {{-- <td>
                                                <a href="#" class="btn btn-outline-info"><i class="bi bi-eye"></i></a>

                                                <a href="#" class="btn btn-outline-secondary ms-2"><i
                                                        class="bi bi-pencil"></i></a>

                                                @if ($food->status == 0)
                                                    <a href="" class="btn btn-outline-success ms-2" data-toggle="tooltip"
                                                        data-placement="top" title="Active"><i
                                                            class="bi bi-check-square"></i></a>
                                                @else
                                                    <a href="" class="btn btn-outline-warning ms-2" data-toggle="tooltip"
                                                        data-placement="top" title="Inactive"><i
                                                            class="bi bi-slash-square"></i></a>
                                                @endif
                                            </td> --}}
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a href="#" class="btn btn-outline-info" title="Show"><i
                                                                class="bi bi-eye"></i></a>

                                                        <a href="#" class="btn btn-outline-secondary ms-2" title="Edit"><i
                                                                class="bi bi-pencil"></i></a>

                                                        @if ($food->status == 0)
                                                            <a href="" class="btn btn-outline-success ms-2"
                                                                data-toggle="tooltip" data-placement="top" title="Active"><i
                                                                    class="bi bi-check-square"></i></a>
                                                        @else
                                                            <a href="" class="btn btn-outline-warning ms-2"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Inactive"><i class="bi bi-slash-square"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
