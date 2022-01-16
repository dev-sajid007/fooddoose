<nav class="navbar-light">
  <ul class="navbar-nav sidebar-parent text-dark mt-3 ms-2">
      {{-- user section --}}
     <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="user" data-bs-toggle="collapse" href="#users">
        <span class="me-2"><i class="bi bi-people-fill"></i></span>
        <span>Users </span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="users">
        <ul class="navbar-nav ps-3 ">
          <li class="sidebar-sub-list">
            <a href="{{route('show.user')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>All Users List</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{route('merchant.user')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Merchant Users List</span>
            </a>
          </li>

           <li class="sidebar-sub-list">
            <a href="{{route('rider.user')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Rider Users List</span>
            </a>
          </li>
          <!-- <li class="sidebar-sub-list">-->
          <!--  <a href="{{route('customer.user')}}" class="nav-link px-3 sidebar-sub-link">-->
          <!--    <i class="bi bi-dash "></i>-->
          <!--    <span>Customer Users List</span>-->
          <!--  </a>-->
          <!--</li>-->
          
          
             <li class="sidebar-sub-list">
            <a href="{{url('admin/manage-customers')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Customer Users List</span>
            </a>
          </li>
        
        
        </ul>
      </div>
    </li>
    <!-- Merchants item -->
    <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="merchant" data-bs-toggle="collapse" href="#dashboard">
        <span class="me-2"><i class="bi bi-grid-1x2-fill"></i></span>
        <span>Merchants</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="dashboard">
        <ul class="navbar-nav ps-3 ">
          <li class="sidebar-sub-list">
            <a href="{{url('admin/merchant/all-merchant')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>All Merchants</span>
            </a>
          </li>
          
          <li class="sidebar-sub-list">
            <a href="{{url('admin/merchant/create')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Add Merchants</span>
            </a>
          </li>
          
          <li class="sidebar-sub-list">
            <a href="{{url('admin/merchant/pending-merchant')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Pending Merchants</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/merchant/rejected-merchant')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Rejected Merchants</span>
            </a>
          </li>
        
        </ul>
      </div>
    </li>
     {{-- restaurant --}}
    <li class="sidebar-list">
    <a class="nav-link px-3 sidebar-link" data-name="rest" data-bs-toggle="collapse" href="#rest">
      <span class="me-2"><i class="bi bi-clipboard-data"></i></span>
      <span>Restaurant</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="rest">
      <ul class="navbar-nav ps-3">
          <li class="sidebar-sub-list">
            <a href="{{url('admin/restaurant/all-restaurant')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span> Restaurants List</span>
            </a>
          </li>

          <li class="sidebar-sub-list">
            <a href="{{url('admin/restaurant/pending-restaurant')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Pending Restaurants List</span>
            </a>
          </li>

           <li class="sidebar-sub-list">
            <a href="{{url('admin/schedule/all-schedule')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Restaurants Schedules</span>
            </a>
          </li>
       
        
      </ul>
    </div>
  </li>
    <!-- Orders item -->
    <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="orders" data-bs-toggle="collapse" href="#Orders">
        <span class="me-2"><i class="bi bi-clipboard-data"></i></span>
        <span>Orders</span>
        <span class="right-icon ms-auto">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Orders">
      <ul class="navbar-nav ps-3">
        <li class="sidebar-sub-list">
          <a href="{{ route('show.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Order List</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('created.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Created Order List</span>
          </a>
        </li>
         <li class="sidebar-sub-list">
          <a href="{{ route('pending.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Pending Order List</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('waiting.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Waiting Order List</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('confirm.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Confirm Order List</span>
          </a>
        </li>
          
        
        <li class="sidebar-sub-list">
          <a href="{{ route('process.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Process Order List</span>
          </a>
        </li>
       
        <li class="sidebar-sub-list">
          <a href="{{ route('deliver.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Order Delivered</span>
          </a>
        </li>
       
        <li class="sidebar-sub-list">
          <a href="{{ route('return.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Order Returning</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('reject.order') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Rejected Order</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
 
  <!-- Delivery Main-->
  <li class="sidebar-list">
    <a class="nav-link px-3 sidebar-link" data-name="delivery" data-bs-toggle="collapse" href="#delivery">
      <span class="me-2"><i class="bi bi-people-fill"></i></span>
      <span>Delivery Man</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="delivery">
      <ul class="navbar-nav ps-3">
        <li class="sidebar-sub-list">
          <a href="{{ route('show.rider') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Manage Delivery Man</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('show_pending') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Pending Delivery Man</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('show_banned') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Rejected Delivery Man</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('show.rider') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>All Delivery Man</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- Account  -->
  <li class="sidebar-list">
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
        {{-- <li class="sidebar-sub-list">
          <a href="#" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Account Overview</span>
          </a>
        </li> --}}
       {{--  <li class="sidebar-sub-list">
          <a href="#" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Make Payment</span>
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
            <span>Unpaid Parcel</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="#" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Paid Parcel</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="#" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Payment History</span>
          </a>
        </li> --}}
        <li class="sidebar-sub-list">
          <a href="{{ route('show.income') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Income</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('show.expense') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Expenses</span>
          </a>
        </li>
  

        <li class="sidebar-sub-list">
          <a href="{{ route('show.employee') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Employee Management</span>
          </a>

        </li>
        <li class="sidebar-sub-list">
          <a href="{{ route('show.salary') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Employee  Salary</span>
          </a></li>
          <!--   <li class="sidebar-sub-list">
            <a href="#" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Make Salary</span>
            </a>
          </li> -->
        </ul>
      </div>
    </li>
    <!--  Delivery area-->
    <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="area" data-bs-toggle="collapse" href="#delivery-area">
        <span class="me-2"><i class="bi bi-geo-alt"></i></span>
        <span>Delivery Area</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="delivery-area">
        <ul class="navbar-nav ps-3">
          <li class="sidebar-sub-list">
            <a href="{{url('admin/district')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>District Managment</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/area')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>View All Area</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <!--  coupon-->
   {{--  <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="coupon" data-bs-toggle="collapse" href="#coupon">
        <span class="me-2"><i class="bi bi-file-earmark-code-fill"></i></span>
        <span>Coupon</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="coupon">
        <ul class="navbar-nav ps-3">
          <li class="sidebar-sub-list">
            <a href="#" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Add Coupon</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="#" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>All Coupon</span>
            </a>
          </li>
        </ul>
      </div>
    </li> --}}
  {{--   <!--  support-->
    <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="support" data-bs-toggle="collapse" href="#support">
        <span class="me-2"><i class="bi bi-question-diamond"></i></span>
        <span>Support</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>

      </span>
    </a>
    <div class="collapse" id="notice">
      <ul class="navbar-nav ps-3">
        <li class="sidebar-sub-list">
          <a href="#" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Add Notice</span>
          </a>
        </li>
        <li class="sidebar-sub-list">
          <a href="#" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Today Notice</span>
          </a>
        </li>

        <li class="sidebar-sub-list">
          <a href="{{ route('show.notice') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>All Notice</span>

       <li class="sidebar-sub-list">
          <a href="{{ route('show.notice') }}" class="nav-link px-3 sidebar-sub-link">
            <i class="bi bi-dash "></i>
            <span>Notice Management</span>

          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- role managment -->
  <li class="sidebar-list">
    <a class="nav-link px-3 sidebar-link" data-name="role-managment" data-bs-toggle="collapse" href="#role_managment">
      <span class="me-2"><i class="bi bi-gear"></i></span>
      <span>Admin Role</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>

      </a>
      <div class="collapse" id="support">
        <ul class="navbar-nav ps-3">
          <li class="sidebar-sub-list">
            <a href="#" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Support Request</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="#" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Completed Support</span>
            </a>
          </li>
        </ul>
      </div>
    </li> --}}
    <!--  Notice board-->
    <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="notice" data-bs-toggle="collapse" href="#notice">
        <span class="me-2"><i class="bi bi-clipboard-check"></i></span>
        <span>Notice Board</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>

        </span>
      </a>
      <div class="collapse" id="notice">
        <ul class="navbar-nav ps-3">
          <li class="sidebar-sub-list">
            <a href="{{ route('show.notice') }}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Notice Management</span>
            </a>
          </li>
           <li class="sidebar-sub-list">
            <a href="{{ route('show.today.notice') }}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Today Notice</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{ route('show.inactive.notice') }}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Inactive Notice</span>
            </a>
          </li>
         
          
        </ul>
      </div>
    </li>
    <!-- role managment -->
    <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="role-managment" data-bs-toggle="collapse" href="#role_managment">
        <span class="me-2"><i class="bi bi-gear"></i></span>
        <span>Stuff Managment</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="role_managment">
        <ul class="navbar-nav ps-3">
          {{-- <li class="sidebar-sub-list">
            <a href="{{url('admin/role')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Role Managment</span>
            </a>
          </li> --}}
          <li class="sidebar-sub-list">
            <a href="{{url('admin/staff')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Staff Managment</span>
            </a>
          </li>
          
        </ul>
      </div>
    </li>
    <!--  Setting-->
    <li class="sidebar-list">
      <a class="nav-link px-3 sidebar-link" data-name="setting" data-bs-toggle="collapse" href="#Setting">
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
            <a href="{{url('admin/shop-setting')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Website Setting</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/admin-dashboard-setting')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Admin Dashboard Setting</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/footer-pages')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Footer Page</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/about-us')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>About Us</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/manage-slider')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Slider</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/team-member')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Team Member</span>
            </a>
          </li>
          <li class="sidebar-sub-list">
            <a href="{{url('admin/manage-social-links')}}" class="nav-link px-3 sidebar-sub-link">
              <i class="bi bi-dash "></i>
              <span>Social Link</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>