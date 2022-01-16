@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Edit Restaurant Page</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <a href="{{url('admin/restaurant/all-restaurant')}}" class="btn btn-danger float-end  mx-auto" >
        All Restaurant
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
                   @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                        </ul>
                   </div>
                 @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('success')}}</strong>
                  
                </div>
                @endif

                  @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{session('error')}}</strong>
                  
                </div>
                @endif
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="fw-bold"> expense Page Section</h5>
            </div> -->
            <div class="card-body">
                <form method="post"  enctype="multipart/form-data" action="{{ route('restaurant.update',$user->id) }}">
                
                    @csrf
                    <div class="row pb-5" >
                         <h5 style="margin-top:25px;color:green">Restaurant Information</h5>
                         <hr style="border:solid 3px red;">

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" >Restaurant Name</label>
                                <input name="restaurant_name" value="{{ $user->restaurant->restaurant_name }}"  type="text"  class="form-control form-control-sm" placeholder=" Restaurant Name ">
                                <div class="alert-message text-danger" id="expenseError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Restaurant Code</label>
                                <input name="restaurant_code" value="{{ $user->restaurant->restaurant_code }}"  type="text" class="form-control form-control-sm" placeholder=" Restaurant Code ">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Restaurant Address</label>
                                <input name="address" value="{{ $user->restaurant->address }}"  type="text" class="form-control form-control-sm" placeholder=" Restaurant Address ">
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Tin Number</label>
                                <input name="tin" value="{{ $user->restaurant->tin }}"  type="text" class="form-control form-control-sm" placeholder=" Tin Number ">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Since</label>
                                <input name="since" value="{{ $user->restaurant->since }}"  type="text" class="form-control form-control-sm" placeholder=" Since ">
                            </div>
                        </div>

                          <div class="col-md-6">
                            <div class="form-group">
                               <label class="form-label"  >Status</label>
                            <select name="status"class="form-control form-control-sm" placeholder="status">
                            <option value="">Select Status</option>
                            <option value="1"{{($user->restaurant->status=="1")?"selected":""}}>Active</option>
                            <option value="2"{{($user->restaurant->status=="2")?"selected":""}}>Inactive</option>
                            
                            </select>
                            </div>
                        </div>


                       
                        
                    </div>
                 
            
                <div class="modal-footer">
                  
                    <button type="submit" id="store_expense_submit_button" class="btn btn-primary btn-block">Update Restarurant</button>
                    
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection