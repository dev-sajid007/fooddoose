@extends('merchant.index')

@section('dashboard_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Profile Management
                    <button type="button" class="btn btn-info float-end mx-auto" data-bs-toggle="modal" data-bs-target="#change-password">
        Change Password
        </h5>
        </button>
                </div>
                <div class="card-body">
      
<div class="row">
{{--     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('message')}}</strong>
                 {{--  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{session('error')}}</strong>
                 {{--  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                </div>
                @endif
  

            <!-- <div class="card-header">
                <h5 class="fw-bold"> income Page Section</h5>
            </div> -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    
               
              <div class="panel-body box-profile" style="margin: 20px">
                <div class="text-center">
                  <img class="profile-merchant-img img-fluid img-circle" src="{{(!empty($merchant->photo))?url('./frontend_upload_asset/upload_assets/merchantphoto/'.$merchant->photo):url('assets/merchant_assets/images/user.jpg')}}" alt="merchant profile picture" style="border-radius:50%;width:125px;height:125px">
                </div>

                <h3 class="profile-merchantname text-center">{{ $merchant->name }}</h3>

                <p class="text-muted text-center">{{ $merchant->user_type }}</p>

                <ul class="list-group list-group-unbordered mb-3" >
                  <li class="list-group-item" style="list-style: none;text-decoration: none;">
                    <b>Name</b> <a class="float-end">{{ $merchant->name }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-end">{{ $merchant->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-end">{{ $merchant->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-end">{{ $merchant->address }}</a>
                  </li>
                  
                </ul>
                <button type="button" class="btn btn-info float-right mr-2" data-bs-toggle="modal" data-bs-target="#change-info">
                    Update Additional Info
                    
                 </button>

                <button type="button" style="background:#f46f22;color:white" class="btn  float-end  mx-auto mb-2" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit Profile</button>
              
              <!-- /.panel-body -->
          
            </div>
             

            </div>
        </div>
    
</div>


<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-small" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f46f22;color:white">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"  enctype="multipart/form-data" action="{{ route('merchant.update.profile') }}">
                @csrf
                <div class="modal-body">
        {{-- <form method="post" action="{{route('update.profile')}}" enctype="multipart/form-data"> --}}
          
          <div class="form-group">
            <label class="form-label"  for="simpleinput">Name</label>
            <input  name="name" type="text" value="{{ $merchant->name }}"  class="form-control" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label class="form-label"  for="simpleinput">Mobile</label>
            <input  name="phone" type="text" value="{{ $merchant->phone }}" class="form-control" placeholder="Enter Mobile">
          </div>
          <div class="form-group">
            <label for="slider_details">Address</label>
            <input  type="text" name="address" value="{{ $merchant->address }}" class="form-control" id="slider_details" aria-describedby="emailHelp" placeholder="Enter Address">
            
          </div>
          
          <div class="form-group">
            <label for="slider_details">Photo</label>
            <input type="file"  name="photo" class="form-control" id="slider_details" aria-describedby="emailHelp" placeholder="Enter slider Link">
            
          </div>
          
        </div>    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="background:#f46f22;color:white" id="income_update_submit_button" class="btn ">Update Profile</button>
                    
                </div>
                
                <!-- </div> -->
                
            </form>
        </div>
    </div>
</div>


{{-- Change Password --}}

<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-small" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f46f22;color:white">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form method="post" action="{{route('merchant.change.password')}}" enctype="multipart/form-data">
                <div class="modal-body">
       
          @csrf
          <div class="form-group">
            <label class="form-label"  for="simpleinput">Old Password</label>
            <input  name="old_password" type="password"  class="form-control" placeholder="Enter Old Password">
          </div>
          <div class="form-group">
            <label class="form-label"  for="simpleinput">New Password</label>
            <input  name="new_password" type="password"  id="new_password" class="form-control" placeholder="Enter New Password">
          </div>
          <div class="form-group">
            <label for="slider_details">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password-confirm" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
            
          </div>
       
          
        </div>    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="background:#f46f22;color:white" id="income_update_submit_button" class="btn ">Change Password</button>
                    
                </div>
                
                <!-- </div> -->
                
            </form>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
    
    
    
<div class="modal fade" id="change-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f46f22;color:white">
                <h5 class="modal-title" id="exampleModalLabel">Update Additional Info</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form method="post" action="{{route('merchant.update.info')}}" enctype="multipart/form-data">
                  @csrf
                <div class="modal-body">
       
            {{-- <input name="merchant_id" type="text" id="merchant_id" class="form-control" value="{{ $info->merchant_id }}" placeholder=" Business Name "> --}}
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="form-label"  >Business Name</label>
                                <input name="business_name" type="text" id="business_name" class="form-control" value="{{ $info->business_name }}" placeholder=" Business Name ">
                                <div class="alert-message text-danger" id="wayError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Bkash Number</label>
                                <input name="bkash_number" value="{{ $info->bkash_number }}"  type="text" id="bkash_number" class="form-control" placeholder=" Bkash Number
                                ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Rocket Number</label>
                                <input name="rocket_number" value="{{ $info->rocket_number }}"  type="text" id="rocket_number" class="form-control" placeholder=" Rocket Number
                                ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Nagad Number</label>
                                <input name="nagad_number" value="{{ $info->nagad_number }}"  type="text" id="nagad_number" class="form-control" placeholder=" Nagad Number
                                ">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Bank Name</label>
                                <input name="bank_name" value="{{ $info->bank_name }}"  type="text" id="bank_name" class="form-control" placeholder=" Bank Name
                                ">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Account Number</label>
                                <input name="account_number" value="{{ $info->account_number }}"  type="text" id="account_number" class="form-control" placeholder=" Account Number
                                ">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Account Name</label>
                                <input name="account_name"  value="{{ $info->account_name }}" type="text" id="account_name" class="form-control" placeholder=" Account Name
                                ">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Payment Method</label>
                                <input name="payment_method" value="{{ $info->payment_method }}"  type="text" id="payment_method" class="form-control" placeholder=" Payment Method
                                ">
                            </div>
                        </div>
       
          
        </div>    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="background:#f46f22;color:white" id="income_update_submit_button" class="btn ">Update Additional Info</button>
                    
                </div>
                
                <!-- </div> -->
                
            </form>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
@endsection
