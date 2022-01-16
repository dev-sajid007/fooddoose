@extends('rider.order.index')
@section('order_content')
<div class="row">
     @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('success')}}</strong>
                  <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                </div>
                @endif
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bold">All Order List</h5>
            </div>
           {{--  <div class="card-header float-right">
                <button class="btn btn-outline-primary justify-content-end float-end" type="button"
                data-toggle="modal"
                data-target="#exampleModalCenter">+ Add New
                </button>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="order-table" class="table  data-table table-hover">
                        <div class="card-header float-right">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group w-75">
                                        <label for="exampleInputEmail1">Order Date</label>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group w-75">
                                        <label for="exampleInputEmail1">Filter</label>
                                        <select class="form-control text-capitalize">
                                            <option selected disabled>Select One</option>
                                            @if (!empty($orders))
                                            @foreach ($orders->unique('status') as $k => $order)
                                            <option value="{{$order->status}}">{{$order->status}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-hover table-xs">
                                <thead class="table-header-style">
                                    <tr>
                                        <th>#SL</th>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Contact Number</th>
                                        <th>Items</th>
                                        <th>Delivery Address</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="order-table-body">
                                    @if (!empty($orders))
                                    @foreach ($orders as $k => $order)
                                    <tr>
                                        <td>{{ $k + 1 }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->contact_no }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->delivery_address }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <button type="button" style="background:#f46f22;color:white" class="btn  float-end mx-auto" data-bs-toggle="modal" data-bs-target="#change-status-{{ $order->id }}"><i class="bi bi-pencil"></i>
                                                </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>






@foreach ($orders as$order)
        <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="change-status-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-small" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f46f22;color:white">
                <h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
                
            </div>
            <form method="post"  enctype="multipart/form-data" action="{{ route('rider.change-order.list',$order->id) }}">
                <div class="modal-body">
                    
                    @csrf
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label"  >Change Order Status</label>
                                <select name="status"class="form-control" id="status" placeholder="status">
                                    <option value="">Select Order Status</option>
                                    <option value="deliver">Deliver</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" style="background:#f46f22;color:white" id="order_update_submit_button" class="btn  ">Change Order Status</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    
                </div>
                
                <!-- </div> -->
                
            </form>
        </div>
    </div>
</div>

@endforeach
        @endsection