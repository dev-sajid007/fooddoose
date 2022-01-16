<div class="offcanvas offcanvas-start sidebar-nav bg-light" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-light">
            <ul class="navbar-nav sidebar-parent text-dark mt-3 ms-2">
                <!-- Merchants item -->
                <li class="sidebar-list">
                    <a class="nav-link px-3 sidebar-link"
                        href="{{route('rider.dashboard')}}">
                        <span class="me-2"><i class="bi bi-grid-1x2-fill"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
               
              

                <!-- Food item -->

         


                <!-- Order Item -->
                <li class="sidebar-list">
                    <a class="nav-link px-3 sidebar-link" data-name="delivery" data-bs-toggle="collapse"
                        href="#delivery">
                        <span class="me-2"><i class="bi bi-people-fill"></i></span>
                        <span>Order</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="delivery">
                        <ul class="navbar-nav ps-3">
                            <li class="sidebar-sub-list">
                                <a href="{{route('rider.pending-order.list')}}" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Pending Order List</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="{{route('rider.all-order.list')}}" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Order List</span>
                                </a>
                            </li>
                          {{--   <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Order Progress</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Order Delivered</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Order Hold</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Order Returning</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Rejected Order</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <!-- Account  -->
                {{-- <li class="sidebar-list">
                    <a class="nav-link px-3 sidebar-link" data-name="account" data-bs-toggle="collapse" href="#account">
                        <span class="me-2"><i class="bi bi-person-badge"></i></span>
                        <span>Accounts</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="account">
                        <ul class="navbar-nav ps-3">
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Account Overview</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Request Payment</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Add Invoice</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>All Invoice</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Payment History</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Income</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Expenses</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Check all due payment</span>
                                </a>
                            </li>
                            <li class="sidebar-sub-list">
                                <a href="#" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Check all received payment</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
 --}}
          
                <!--  Setting-->
                <li class="sidebar-list">
                    <a class="nav-link px-3 sidebar-link" data-name="setting" data-bs-toggle="collapse"
                        href="#Setting">
                        <span class="me-2"><i class="bi bi-gear"></i></span>
                        <span>Setting</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="Setting">
                        <ul class="navbar-nav ps-3">
                            <li class="sidebar-sub-list">
                                <a href="{{ route('rider.show.profile') }}" class="nav-link px-3 sidebar-sub-link">
                                    <i class="bi bi-dash "></i>
                                    <span>Profile settings</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
