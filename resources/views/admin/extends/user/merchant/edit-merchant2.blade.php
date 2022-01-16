@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Edit Merchant Page</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <a href="{{url('admin/merchant/all-merchant')}}" class="btn btn-danger float-end  mx-auto" >
        All Merchant
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
                <form method="post"  enctype="multipart/form-data" action="{{ route('merchant.update',$user->id) }}">
                
                    @csrf
                    <div class="row pb-5" >
                        <h5 style="color:green">Merchant Information</h5>
                        <hr style="border:solid 3px red;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Name</label>
                                <input name="name" value="{{ $user->name }}"  type="text"  class="form-control form-control-sm" placeholder=" name ">
                                <div class="alert-message text-danger" id="expenseError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Mobile</label>
                                <input name="phone" value="{{ $user->phone }}"  type="text" class="form-control form-control-sm" placeholder=" Mobile ">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Email</label>
                                <input name="email" value="{{ $user->email }}"  type="email" class="form-control form-control-sm" placeholder=" Email ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Address</label>
                                <input name="address" value="{{ $user->address }}" type="text"  class="form-control form-control-sm" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <label class="form-label"  >Status</label>
                            <select name="status"class="form-control form-control-sm" placeholder="status">
                            <option value="">Select Status</option>
                            <option value="1"{{($user->status=="1")?"selected":""}}>Approved</option>
                            <option value="2"{{($user->status=="2")?"selected":""}}>Pending</option>
                            <option value="3"{{($user->status=="3")?"selected":""}}>Banned</option>
                            </select>
                            </div>
                        </div>

                        <h5 style="margin-top:25px;color:green">Merchant Additional Information</h5>
                        <hr style="border:solid 3px red;">

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Business Name</label>
                                <input name="business_name" value="{{ $user->merchant->business_name }}"  type="text"  class="form-control form-control-sm" placeholder=" Business Name ">
                                <div class="alert-message text-danger" id="expenseError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Bkash Number</label>
                                <input name="bkash_number" value="{{ $user->merchant->bkash_number }}"  type="text" class="form-control form-control-sm" placeholder=" Bkash Number ">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Rocket Number</label>
                                <input name="rocket_number" value="{{ $user->merchant->rocket_number }}"  type="text" class="form-control form-control-sm" placeholder=" Rocket Number ">
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Nagad Number</label>
                                <input name="nagad_number" value="{{ $user->merchant->nagad_number }}"  type="text" class="form-control form-control-sm" placeholder=" Nagad Number ">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Bank Name</label>
                                <input name="bank_name" value="{{ $user->merchant->bank_name }}"  type="text" class="form-control form-control-sm" placeholder=" Bank Name ">
                            </div>
                        </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Account Number</label>
                                <input name="account_number" value="{{ $user->merchant->account_number }}"  type="text" class="form-control form-control-sm" placeholder=" Account Number ">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Account Name</label>
                                <input name="account_name" value="{{ $user->merchant->account_name }}"  type="text" class="form-control form-control-sm" placeholder=" Account Name ">
                            </div>
                        </div>
                       

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Payment Method</label>
                                <input name="payment_method" value="{{ $user->merchant->payment_method }}"  type="text" class="form-control form-control-sm" placeholder=" Payment Method ">
                            </div>
                        </div>

                         <h5 style="margin-top:25px;color:green">Restrurent Information</h5>
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


                        <h5 style="margin-top:25px;color:green">Schedule Information</h5>
                         <hr style="border:solid 3px red;">


                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="sunday" value="{{($user->schedule->sunday=="1")?"selected":""}}"  >
                              <label class="form-check-label" for="1">
                                Sunday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="monday" value="1" id="monday">
                              <label class="form-check-label" for="monday">
                                Monday
                              </label>
                            </div>
                        </div>
                    
                     <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="tuesday" value="tuesday" id="tuesday">
                              <label class="form-check-label" for="tuesday">
                                Tuesday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="wednesday" value="wednesday" id="wednesday">
                              <label class="form-check-label" for="wednesday">
                                Wednesday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="thursday" value="thursday" id="thursday">
                              <label class="form-check-label" for="thursday">
                                Thursday
                              </label>
                            </div>
                        </div>
                    
                     <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" value="friday" id="friday" name="friday">
                              <label class="form-check-label" for="friday">
                                friday
                              </label>
                            </div>
                        </div>
                          <div class="col-md-2" style="margin-top:43px">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" value="saturday" id="saturday" name="saturday">
                              <label class="form-check-label" for="saturday">
                                Saturday
                              </label>
                            </div>
                        </div>



                         <div class="col-md-5" style="margin-top: 20px;">
                            <div class="form-group">
                                <label class="form-label"  >Shop Open</label>
                                <input name="shop_open" value="{{ $user->schedule->shop_open }}"  type="time"  class="form-control form-control-sm" placeholder=" Shop Open ">
                                <div class="alert-message text-danger" id="expenseError"></div>
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-top: 20px;">
                            <div class="form-group">
                                <label class="form-label"  >Shop Close</label>
                                <input name="shop_close" value="{{  $user->schedule->shop_close }}"  type="time" class="form-control form-control-sm" placeholder=" Shop Close ">
                            </div>
                        </div >
                    
                    
                        
                    </div>
                 
            
                <div class="modal-footer">
                  
                    <button type="submit" id="store_expense_submit_button" class="btn btn-primary btn-block">Update Merchant</button>
                    
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection