@extends('merchant.order.index')
@section('order_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold">Order List</h5>
                </div>

                <div class="card-header float-right">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group w-75">
                                <label for="exampleInputEmail1">Order Date</label>
                                <input class="form-control" type="date" id="order_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group w-75">
                                <label for="exampleInputEmail1">Filter</label>
                                <select id="status" class="form-control text-capitalize">
                                    <option selected disabled value="">Select One</option>
                                    <option value="created">Created</option>
                                    <option value="accept">Accept</option>
                                    <option value="pending">Pending</option>
                                    <option value="process">Process</option>
                                    <option value="hold">Hold</option>
                                    <option value="reject">Reject</option>
                                    <option value="deliver">Deliver</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order_id" class="table table-hover">
                            <thead class="table-header-style">
                                <tr>
                                    <th>#SL</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Contact Number</th>
                                    <th>Foods</th>
                                    <th>Delivery Address</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (!empty($orders))
                                    @foreach ($orders as $k => $order)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $order->order_no }}</td>
                                            <td>{{ $order->user_id }}</td>
                                            <td>{{ $order->contact_no }}</td>
                                            <td>{{ $order->contact_no }}</td>
                                            <td>{{ $order->delivery_address }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuLink">
                                                        <a href="{{ route('merchant.order.show', 1) }}"
                                                            class="btn btn-outline-info p-2 ms-3" title="Show"><i
                                                                class="bi bi-eye"></i></a>
                                                        <a href="#" class="btn btn-outline-secondary p-2 ms-2"
                                                            title="Edit"><i class="bi bi-pencil"></i></a>
                                                        @if ($order->status == 0)
                                                            <a href="" class="btn btn-outline-success p-2 ms-2"
                                                                data-toggle="tooltip" data-placement="top" title="Active"><i
                                                                    class="bi bi-check-square"></i></a>
                                                        @else
                                                            <a href="" class="btn btn-outline-warning p-2 ms-2"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Inactive"><i class="bi bi-slash-square"></i></a>
                                                        @endif
                                                    </ul>
                                                </div> --}}
                                {{-- </td>
                                        </tr>
                                    @endforeach
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $(function() {
                var table = $('#order_id').DataTable({
                    processing: true,
                    searching: false,
                    responsive: true,
                    dom: "Blfrtip",
                    order: [[ 2, "desc" ]],
                    buttons: ["copy", "csv", "excel", "pdf", "print"],
                    ajax: {
                        url: "{{ route('merchant.order.index') }}",
                        data: function(d) {
                            d.status = $('#status').val(),
                            d.created_at = $('#order_date').val(),
                            d.search = $('input[type="search"]').val()
                        }
                    },

                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'order_no',
                            name: 'order_no'
                        },
                        {
                            data: 'customer_name',
                            name: 'customer_name'
                        },
                        {
                            data: 'contact_no',
                            name: 'contact_no'
                        },
                        {
                            data: 'order_foods.length',
                            render: function(dataField) {
                                return (
                                    `<div class='fw-bold'>
                                        ${dataField } &nbsp; items
                                    </div>`
                                )
                            }
                        },
                        {
                            data: 'delivery_address',
                            name: 'delivery_address'
                        },
                        {
                            data: 'created_at',
                            render: function(dataField) {
                                return (
                                    `<div>
                                        ${ moment(dataField).format('DD-MMM-YYYY') }
                                    </div>`
                                )
                            }
                        },
                        {
                            data: 'total',
                            name: 'total'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'id',
                            render: function(dataField, type, row, meta) {
                                return (
                                    `<div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuLink">
                                            <a href="{{ route('merchant.order.show', '') }}/${dataField}"
                                                class="btn btn-outline-info w-75 m-2 ms-4" title="Show"><i
                                                    class="bi bi-eye"></i> Show</a>
                                        </ul>
                                    </div>`
                                )
                            }
                        }
                    ],
                    order: [
                        [0, 'desc']
                    ],
                })
                $('#status').change(function() {
                    table.ajax.reload();
                });
                $('#order_date').change(function() {
                    table.ajax.reload();
                });
            });
        </script>
    @endpush
    {{-- @push('scripts')
        <script type="text/javascript">
            $(function() {
                var table = $('#order_id').DataTable({
                    processing: true,
                    searching: false,
                    responsive: true,
                    dom: "Blfrtip",
                    order: [[ 2, "desc" ]],
                    buttons: ["copy", "csv", "excel", "pdf", "print"],
                    ajax: {
                        url: "{{ route('merchant.order.index') }}",
                        data: function(d) {
                            d.status = $('#status').val(),
                            d.created_at = $('#order_date').val(),
                            d.search = $('input[type="search"]').val()
                        }
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'order_no',
                            name: 'order_no'
                        },
                        {
                            data: 'user_id',
                            name: 'user_id'
                        },
                        {
                            data: 'contact_no',
                            name: 'contact_no'
                        },
                        {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'delivery_address',
                            name: 'delivery_address'
                        },
                        {
                            data: 'created_at',
                            render: function(dataField, type, row, meta) {
                                return (
                                    `<div>
                                        ${ moment(dataField).format('DD-MMM-YYYY') }
                                    </div>`
                                )
                            }
                        },
                        {
                            data: 'total',
                            name: 'total'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'id',
                            render: function(dataField, type, row, meta) {
                                return (
                                    `<div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuLink">
                                            <a href="{{ route('merchant.order.show', '') }}/${dataField}"
                                                class="btn btn-outline-info w-75 m-2 ms-4" title="Show"><i
                                                    class="bi bi-eye"></i> Show</a>

                                            <a href='${dataField}' class="btn btn-outline-success w-75 m-2 ms-4"
                                            data-toggle="tooltip" data-placement="top" title="Active"><i
                                                class="bi bi-check-square"></i> Accept</a>

                                            <a href='${dataField}' class="btn btn-outline-danger w-75 m-2 ms-4"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Inactive"><i class="bi bi-slash-square"></i> Reject</a>

                                        </ul>
                                    </div>`
                                )
                            }
                        }
                    ]
                })
                $('#status').change(function() {
                    table.ajax.reload();
                });
                $('#order_date').change(function() {
                    table.ajax.reload();
                });
            });
        </script>
    @endpush --}}
@endsection
