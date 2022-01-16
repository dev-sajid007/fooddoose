@extends('merchant.order.index')

@push('styles')
{{--    <link href="{{ asset('assets/merchant_assets/css/order-details-style.css') }}" rel="stylesheet" type="text/css" />--}}
    <link href="{{ asset('assets/merchant_assets/css/invoice.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('order_content')
    <style>
        .barcode {
            font-family: 'Libre Barcode 39';
            font-size: 50px;
            color: black;
        }
    </style>


    <div class="page-content ms-5" id="page-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header" style="background: lightgray">
                        <div class="row">
                            <div class="col-md-6 p-2 pb-0">
                                <h6 class="fw-bold text-dark">#{{ $order->order_no }} - {{ $order->created_at->format('Y M d h:i A') }}</h6>
                            </div>
                            <div class="col-md-6 p-2 pb-0">
                                <a type="button" id="printInvoice" class="justify-content-end float-end text-decoration-none btn btn-info ms-2">Print</a>
                                @if ($order->status == 'created')
                                    <a type="button" href="{{ route('merchant.order-status', $order->id) }}" class="justify-content-end float-end text-decoration-none btn btn-success ms-2">Accept</a>
                                    <a type="button" class="justify-content-end float-end text-decoration-none btn btn-danger">Reject</a>
                                @endif
                                @if ($order->status == 'accept')
                                    <!-- Modal -->
                                    <a type="button" id="assign" class="justify-content-end float-end text-decoration-none btn btn-warning" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal">Assign
                                    </a>
                                    @include('merchant.order.assignDriverModal')
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="invoice card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 invoice-to">
                                    <h6>Restaurant Information<hr></h6>
                                    <b class="to">{{$order->order_foods[0]->food->restaurant->restaurant_name}}</b>
                                    <div class="address">Phone No: {{ $order->order_foods[0]->food->restaurant->contact_no }}</div>
                                    <div class="address">Address: {{ $order->order_foods[0]->food->restaurant->address }}</div>
                                </div>
                                <div class="col-md-8">
                                    <h6>Client Information<hr></h6>
                                    <div class="row contacts">
                                        <div class="col invoice-to">
                                            <div class="text-gray-light">Order ID : {{$order->order_no}}</div>
                                            <b class="to">{{$order->customer_name}}</b>
                                            <div class="address">Phone No: {{ $order->contact_no }}</div>
                                            <div class="email"><a href="mailto:john@example.com"> {{ $order->email }}</a></div>
                                        </div>
                                        <div class="col invoice-details">
                                            <h1 class="invoice-id"> <div class="barcode">{{$order->order_no}}</div></h1>
                                            <div class="date">Order Date: {{ $order->created_at->format('Y M d') }}</div>
                                            <div class="date">Delivery Address: {{ $order->delivery_address }}</div>
                                            <div class="date">Payment Method: COD</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table>
                                <thead>
                                    <tr>
                                        <th>#Item</th>
                                        <th class="text-left">Quantity</th>
                                        <th class="text-right">Unit Price</th>
                                        <th class="text-right">Total PRICE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><h6 class="fw-bold">Items</h6></tr>
                                    @foreach ($order->order_foods as $k => $order_food)
                                        <tr>
                                            <td class="p-3">{{ $order_food->quantity }} x
                                                {{ $order_food->food->name }}</td>
                                            <td class="p-3">{{ $order_food->quantity }}pcs</td>
                                            <td class="p-3">৳{{ $order_food->price }}</td>
                                            <td class="p-3">
                                                ৳{{ $order_food->price * $order_food->quantity }}</td>
                                        </tr>
                                    @endforeach
                                    @if(count($order->order_extra_foods)>0)
                                        <tr class="mt-5">
                                            <td><h6 class="fw-bold">Extra Items</h6></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        @foreach ($order->order_extra_foods as $k => $order_extra_food)
                                            <tr>
                                                <td class="p-3">{{ $order_extra_food->quantity }} x
                                                    {{ $order_extra_food->extra_food->name }}</td>
                                                <td class="p-3">{{ $order_extra_food->quantity }}pcs</td>
                                                <td class="p-3">৳{{ $order_extra_food->price }}</td>
                                                <td class="p-3">
                                                    ৳{{ $order_extra_food->price * $order_extra_food->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>



                                <tfoot style=" font-size: 13px;" >
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td class="text-start">৳{{ $order->subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Delivery Cost</td>
                                        <td class="text-start">৳{{ $order->delivery_charge }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Grand Total</td>
                                        <td class="text-start">৳{{ $order->subtotal + $order->delivery_charge }}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Comment
                                        <hr>
                                    </h6>
                                    @if ($order->comment)
                                        <p class="form-control">{{ $order->comment }}</p>
                                    @endif
                                </div>
                            </div>
                            {{--                                        <footer>--}}
                            {{--                                            Invoice was created by <a href="https://aleshasolutions.com/">dsafaf</a>.--}}
                            {{--                                        </footer>--}}
{{--                            <div class="row pt-5">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <h6>Delivery Details--}}
{{--                                        <hr>--}}
{{--                                    </h6>--}}
{{--                                    <table class="border col-md-12 mb-5">--}}
{{--                                        <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td class="p-2 ps-4">Delivery Type</td>--}}
{{--                                                <td class="p-2">--}}
{{--                                                    {{ $order->delivery_type == 'home_delivery' ? 'Home Delivery' : 'Take Out' }}--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="p-2 ps-4">Delivery Address</td>--}}
{{--                                                <td class="p-2">{{ $order->delivery_address }}</td>--}}
{{--                                            </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="timeline p-4 pt-0 block mb-4">
                    <div class="modal-header">
                        <h5>Order Status History</h5>
                    </div>
                    @if (in_array($order->status, ['created', 'pending', 'process', 'hold', 'reject', 'deliver']))
                        <div class="tl-item {{ $order->status == 'created' ? 'active' : '' }}">
                            <div class="tl-dot b-warning"></div>
                            <div class="tl-content">
                                <div class="">
                                    <h6 class="text-capitalize">
                                        Created
                                    </h6>
                                </div>
                                <div class="">
                                    Status from: {{ $order->user_id }}
                                </div>
                                <div class="tl-date text-muted mt-1">13 june 18</div>
                            </div>
                        </div>
                    @endif
                    @if (in_array($order->status, ['pending', 'process', 'hold', 'reject', 'deliver']))
                        <div class="tl-item {{ $order->status == 'pending' ? 'active' : '' }}">
                            <div class="tl-dot b-warning"></div>
                            <div class="tl-content">
                                <div class="">
                                    <h6 class="text-capitalize">
                                        Pending
                                    </h6>
                                </div>
                                <div class="">
                                    Status from: {{ $order->user_id }}
                                </div>
                                <div class="tl-date text-muted mt-1">13 june 18</div>
                            </div>
                        </div>
                    @endif
                    @if (in_array($order->status, ['created', 'process', 'hold', 'reject', 'deliver']))
                        <div class="tl-item {{ $order->status == 'process' ? 'active' : '' }}">
                            <div class="tl-dot b-primary"></div>
                            <div class="tl-content">
                                <div class="">Process</div>
                                <div class="">
                                    Status from: Admin
                                </div>
                                <div class="tl-date text-muted mt-1">45 minutes ago</div>
                            </div>
                        </div>
                    @endif
                    @if ($order->status == 'reject')
                        <div class="tl-item {{ $order->status == 'reject' ? 'active' : '' }}">
                            <div class="tl-dot b-danger"></div>
                            <div class="tl-content">
                                <div class="">Reject</div>
                                <div class="">
                                    Status from: Admin
                                </div>
                                <div class="tl-date text-muted mt-1">1 day ago</div>
                            </div>
                        </div>
                    @endif
                    @if ($order->status == 'hold')
                        <div class="tl-item {{ $order->status == 'hold' ? 'active' : '' }}">
                            <div class="tl-dot b-danger"></div>
                            <div class="tl-content">
                                <div class="">Hold
                                </div>
                                <div class="">
                                    Status from: Admin
                                </div>
                                <div class="tl-date text-muted mt-1">1 Week ago</div>
                            </div>
                        </div>
                    @endif
                    @if ($order->status == 'deliver')
                        <div class="tl-item {{ $order->status == 'deliver' ? 'active' : '' }}">
                            <div class="tl-dot b-warning"></div>
                            <div class="tl-content">
                                <div class="">Deliver
                                </div>
                                <div class="">
                                    Status from: Admin
                                </div>
                                <div class="tl-date text-muted mt-1">3 days ago</div>
                            </div>
                        </div>
                    @endif
                    <div class="tl-item"></div>
                </div>
            </div>
        </div>
    </div>
{{--     @include('merchant.order.orderInvoice') --}}

    @push('scripts')
        <script>
            $('#reject').click(() => {
                const id = `{{ $order->id }}`;
                $('#order_id').val(id);
            })

            $('#assign').click(() => {
                $('#form_id').trigger("reset");
                $('.assignDetails').hide();
                const id = `{{ $order->id }}`;
                $('#order_id').val(id);
            })

            $('#printInvoice').click(() => {
                $('.invoice').printThis({
                    debug: false, // show the iframe for debugging
                    importCSS: true, // import parent page css
                    importStyle: true, // import style tags
                    printContainer: true, // print outer container/$.selector
                    loadCSS: "", // path to additional css file - use an array [] for multiple
                    pageTitle: 'Order Invoice', // add title to print page
                    removeInline: false, // remove inline styles from print elements
                    removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
                    printDelay: 333, // variable print delay
                    header: null, // prefix to html
                    footer: null, // postfix to html
                    base: false, // preserve the BASE tag or accept a string for the URL
                    formValues: true, // preserve input/form values
                    canvas: false, // copy canvas content
                    doctypeString: '', // enter a different doctype for older markup
                    removeScripts: false, // remove script tags from print content
                    copyTagClasses: false, // copy classes from the html & body tag
                    beforePrintEvent: null, // function for printEvent in iframe
                    beforePrint: null, // function called before iframe is filled
                    afterPrint: null // function called before iframe is removed
                })
            })
        </script>
    @endpush
@endsection
