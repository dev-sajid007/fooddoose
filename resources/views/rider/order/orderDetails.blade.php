@extends('rider.order.index')

@push('styles')
    <link href="{{ asset('assets/rider_assets/css/order-details-style.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('order_content')
    <div class="page-content page-container" id="page-content">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header" style="background: #f46f22">
                        <div class="row">
                            <div class="col-md-6 p-2 pb-0">
                                <h6 class="fw-bold text-white">#45358 - 18 Dec 2021 12:10AM</h6>
                            </div>
                            <div class="col-md-6 p-2 pb-0">
                                <button type="submit"
                                        class="justify-content-end float-end btn-sm btn-info">Print
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Restaurant Information
                                        <hr>
                                    </h6>
                                    <p>Restaurant Name <br>
                                        +8801777552649 <br>
                                        restaurant@gmail.com
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Client Information
                                        <hr>
                                    </h6>
                                    <p>CLient Name <br>
                                        +8801777552649 <br>
                                        restaurant@gmail.com <br>
                                        Delivery Address
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Order
                                        <hr>
                                    </h6>
                                    <table class="border col-md-12 mb-5">
                                        <tbody>
                                        <tr>
                                            <td class="p-3">1 x Item name</td>
                                            <td>1pcs</td>
                                            <td>৳15.0</td>
                                            <td>৳145.0</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 pt-0">1 x Item name</td>
                                            <td>1pcs</td>
                                            <td>৳15.0</td>
                                            <td>৳145.0</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Comment
                                        <hr>
                                    </h6>
                                    <p class="form-control">dsugfg udsgfhgdsyf</p>
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col-md-12">
                                    <h6>Delivery & Payment Details
                                        <hr>
                                    </h6>
                                    <table class="border col-md-12 mb-5">
                                        <tbody>
                                        <tr>
                                            <td>1 x Item name</td>
                                            <td>1pcs</td>
                                            <td>৳15.0</td>
                                            <td>৳145.0</td>
                                        </tr>
                                        <tr>
                                            <td>1 x Item name</td>
                                            <td>1pcs</td>
                                            <td>৳15.0</td>
                                            <td>৳145.0</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn-sm btn-primary m-3">Accept</button>
                            <button class="btn-sm btn-danger">Reject</button>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="timeline p-4 block mb-4">
                    <div class="modal-header">
                        <h5>Order Status History</h5>
                    </div>
                    <div class="tl-item active">
                        <div class="tl-dot b-warning"></div>
                        <div class="tl-content">
                            <div class="">
                                <h6>
                                    Pending
                                </h6>
                            </div>
                            <div class="">
                                Status from: Admin
                            </div>
                            <div class="tl-date text-muted mt-1">13 june 18</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-primary"></div>
                        <div class="tl-content">
                            <div class="">Do you know how Google search works.</div>
                            <div class="tl-date text-muted mt-1">45 minutes ago</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-danger"></div>
                        <div class="tl-content">
                            <div class="">Thanks to <a href="#" data-abc="true">@apple</a>, for iphone 7</div>
                            <div class="tl-date text-muted mt-1">1 day ago</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-danger"></div>
                        <div class="tl-content">
                            <div class="">Order placed <a href="#" data-abc="true">@eBay</a> you will get your
                                products
                            </div>
                            <div class="tl-date text-muted mt-1">1 Week ago</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-warning"></div>
                        <div class="tl-content">
                            <div class="">Learn how to use <a href="#" data-abc="true">Google Analytics</a> to
                                discover vital information about your readers.
                            </div>
                            <div class="tl-date text-muted mt-1">3 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
