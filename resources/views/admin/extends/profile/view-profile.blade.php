@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-4 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> My Profile</h5>
    </div>
    <div class="col-md-8 col-sm-12 text-center">
          <button type="button" class="btn btn-danger float-end mx-auto" data-bs-toggle="modal" data-bs-target="#change-password">
        Change Password
        </button>
        
      
    </div>
</div>
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
  
            
        <div class="card">

            <!-- <div class="card-header">
                <h5 class="fw-bold"> income Page Section</h5>
            </div> -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-body" style="font-size:15px">
               
              <div class="panel-body box-profile" style="margin: 20px">
                <div class="text-center">
                  <img class="profile-admin-img img-fluid img-circle" src="{{(!empty(Auth::user()->photo))?url('frontend_upload_asset/upload_assets/adminphoto/'.Auth::user()->photo):url('assets/admin_assets/images/user.jpg')}}" alt="admin profile picture" style="border-radius:50%;width:125px;height:125px">
                </div>

                <h3 class="profile-adminname text-center">{{ $admin->name }}</h3>

                <p class="text-muted text-center">{{ $admin->user_type }}</p>

                <ul class="list-group list-group-unbordered mb-3" >
                  <li class="list-group-item" style="list-style: none;text-decoration: none;">
                    <b>Name</b> <a class="float-end">{{ $admin->name }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-end">{{ $admin->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-end">{{ $admin->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-end">{{ $admin->address }}</a>
                  </li>
                  
                </ul>

                <button type="button" style="background:#f46f22;color:white" class="btn  float-end  mx-auto mb-2" data-bs-toggle="modal" data-bs-target="#edit-modal">Update Profile</button>
              </div>
              <!-- /.panel-body -->
          
            </div>
                </div>

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
            <form method="post"  enctype="multipart/form-data" action="{{ route('admin.update.profile') }}">
                <div class="modal-body">
       
          @csrf
          <div class="form-group">
            <label class="form-label"  for="simpleinput">Name</label>
            <input  name="name" type="text" value="{{ $admin->name }}"  class="form-control" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label class="form-label"  for="simpleinput">Mobile</label>
            <input  name="phone" type="text" value="{{ $admin->phone }}" class="form-control" placeholder="Enter Mobile">
          </div>
          <div class="form-group">
            <label for="slider_details">Address</label>
            <input  type="text" name="address" value="{{ $admin->address }}" class="form-control" id="slider_details" aria-describedby="emailHelp" placeholder="Enter Address">
            
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
             <form method="post" action="{{route('admin.change.password')}}" enctype="multipart/form-data">
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

@endsection