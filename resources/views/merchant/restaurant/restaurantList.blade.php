@extends('merchant.restaurant.index')

@section('restaurant_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold">Restaurant List</h5>
                </div>
                <div class="card-header float-right">
                    <a href="{{ route('merchant.restaurant.create') }}"
                        class="btn btn-outline-primary justify-content-end float-end">
                        + Add New
                    </a>
                    {{-- <button class="btn btn-outline-primary justify-content-end float-end" type="button"
                            data-toggle="modal"
                            data-target="#exampleModalCenter">+ Add New
                    </button> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-table" class="table  data-table table-hover">
                            <thead class="table-header-style">
                                <tr>
                                    <th>#SL</th>
                                    <th>Restaurant Name</th>
                                    <th>Restaurant Code</th>
                                    <th>Contact Number</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="order-table-body">
                                @if (!empty($restaurants))
                                    @foreach ($restaurants as $k => $restaurant)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $restaurant->restaurant_name }}</td>
                                            <td>{{ $restaurant->restaurant_code }}</td>
                                            <td>{{ $restaurant->contact_no }}</td>
                                            <td>{{ $restaurant->address }}</td>
                                            <td class="text-{{ $restaurant->status == 1 ? 'success' : 'danger' }}">
                                                {!! $restaurant->status == 1 ? 'ACTIVE' : 'INACTIVE' !!}</td>
                                            <td>
                                                <a href="{{ route('merchant.restaurant.edit', $restaurant->restaurant_id) }}" class="btn btn-outline-secondary"><i
                                                        class="bi bi-pencil"></i></a>
                                                @if ($restaurant->status == 0)
                                                    <a href="{{ route('merchant.restaurant.status', $restaurant->restaurant_id) }}"
                                                        class="btn btn-outline-success ms-2" data-toggle="tooltip"
                                                        data-placement="top" title="Active"><i
                                                            class="bi bi-check-square"></i></a>
                                                @else
                                                    <a href="{{ route('merchant.restaurant.status', $restaurant->restaurant_id) }}"
                                                        class="btn btn-outline-warning ms-2" data-toggle="tooltip"
                                                        data-placement="top" title="Inactive"><i
                                                            class="bi bi-slash-square"></i></a>
                                                @endif
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