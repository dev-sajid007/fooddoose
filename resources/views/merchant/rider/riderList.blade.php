@extends('merchant.rider.index')

@section('rider_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold">All Riders</h5>
                </div>
                <div class="card-header float-right">
                    <a class="btn btn-outline-primary justify-content-end float-end"
                       href="{{ route('merchant.rider.create') }}">+ Add New
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-table" class="table data-table table-hover">
                            <thead class="table-header-style">
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Profile Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="order-table-body">
                            @if (!empty($users))
                                @foreach ($users as $k => $user)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                <img src="{{ asset('images/profile_images/' . $user->photo) }}" alt="image"
                                                     width="60" height="60"/>
                                            </td>
                                            <td class="text-{{ $user->status == 1 ? 'success' : 'danger' }}">
                                                {!! $user->status == 1 ? 'ACTIVE' : 'INACTIVE' !!}</td>
                                            <td>
                                                @if ($user->status == 0)
                                                    <a href="{{ route('merchant.rider-status', $user->id) }}"
                                                       class="btn btn-outline-success p-2 ms-2"
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="Active"><i
                                                            class="bi bi-check-square"></i></a>
                                                @else
                                                    <a href="{{ route('merchant.rider-status', $user->id) }}"
                                                       class="btn btn-outline-danger p-2 ms-2"
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="Inactive"><i class="bi bi-slash-square"></i></a>
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
