@extends('merchant.index')

@section('dashboard_content')

    @include('merchant.layout.chart')

    <div class="row my-5 g-5">
        <div class="col-xl-6 mb-3">
            <div class="">
                <h5 class="fw-bold">RECENT ORDERS REQUESTED</h5>

            </div>

            <div class="table-responsive mt-4">
                <table class="table table-hover">
                    <thead class="order-request-table">
                        <tr>
                            <th>Food Item</th>
                            <th>Price</th>
                            <th>Product ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img width="35px" class="me-3" src="./images/pizza.jpg" alt="">
                                Fried Egg Sandwich
                            </td>
                            <td>$11.23</td>
                            <td>235193138</td>
                        </tr>
                        <tr>
                            <td>
                                <img width="35px" class="me-3" src="./images/pizza.jpg" alt="">
                                Fried Egg Sandwich
                            </td>
                            <td>$11.23</td>
                            <td>235193138</td>
                        </tr>
                        <tr>
                            <td>
                                <img width="35px" class="me-3" src="./images/pizza.jpg" alt="">
                                Fried Egg Sandwich
                            </td>
                            <td>$11.23</td>
                            <td>235193138</td>
                        </tr>
                        <tr>
                            <td>
                                <img width="35px" class="me-3" src="./images/pizza.jpg" alt="">
                                Fried Egg Sandwich
                            </td>
                            <td>$11.23</td>
                            <td>235193138</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--################# week view ###33#######33  -->
        <div class="col-xl-6 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold">MONTHLY REVENUE</h5>
                <div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected value="0">January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                        <option value="4">May</option>
                        <option value="5">Jun</option>
                        <option value="6">July</option>
                        <option value="7">August</option>
                        <option value="8">September</option>
                        <option value="9">October</option>
                        <option value="10">November</option>
                        <option value="11">December</option>
                    </select>
                </div>
            </div>

            <!--################# week view progress bar ###33#######33  -->
            <div class="mt-5">
                <div class="my-3">
                    <p class="fw-bold mb-2 text-muted"><small>Week 1</small></p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%; background: #f46f22;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
                <div class="my-3">
                    <p class="fw-bold mb-2 text-muted"><small>Week 2</small></p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 50%; background: #f46f22;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                </div>
                <div class="my-3">
                    <p class="fw-bold mb-2 text-muted"><small>Week 3</small></p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%; background: #f46f22;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                </div>
                <div class="my-3">
                    <p class="fw-bold mb-2 text-muted"><small>Week 4</small></p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 40%; background: #f46f22;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">40%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  ################# Trending Order  ########################## -->

    <div class="row">
        <div class="col-12">
            <h5 class="fw-bold my-5">TRENDING ORDERS</h5>
        </div>
        <div class=" col-md-6 col-xl-3 mb-3">
            <div class="card">
                <img src="./images/food-5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold">Meat Stew</h6>
                        <p class="fw-bold text-success"><small>$25.00</small></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted">Orders <span class="text-danger">15</span></p>
                        <p class="text-muted">Income <span class="text-danger">$175</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-6 col-xl-3 mb-3">
            <div class="card">
                <img src="./images/food-4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold">Meat Stew</h6>
                        <p class="fw-bold text-success"><small>$25.00</small></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted">Orders <span class="text-danger">15</span></p>
                        <p class="text-muted">Income <span class="text-danger">$175</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-6 col-xl-3 mb-3">
            <div class="card">
                <img src="./images/food-5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold">Meat Stew</h6>
                        <p class="fw-bold text-success"><small>$25.00</small></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted">Orders <span class="text-danger">15</span></p>
                        <p class="text-muted">Income <span class="text-danger">$175</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-6 col-xl-3 mb-3">
            <div class="card">
                <img src="./images/food-4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold">Meat Stew</h6>
                        <p class="fw-bold text-success"><small>$25.00</small></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted">Orders <span class="text-danger">15</span></p>
                        <p class="text-muted">Income <span class="text-danger">$175</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ################### data table ############################## -->
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold"> RECENTLY PLACED ORDERS</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-table" class="table  data-table table-hover">
                            <thead class="table-header-style">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Name</th>
                                    <th>Customer Name</th>
                                    <th>Location</th>
                                    <th>Order Status</th>
                                    <th>Delivered Time</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="order-table-body">
                                <tr>
                                    <td>01</td>
                                    <td>French Fries</td>
                                    <td>Jhon Leo</td>
                                    <td>New Town</td>
                                    <td>pending</td>
                                    <td>10:050</td>
                                    <td>$10</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--###########################    main content body ########################################### -->
@endsection
