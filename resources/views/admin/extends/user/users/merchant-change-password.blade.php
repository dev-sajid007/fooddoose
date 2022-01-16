@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold">  Merchant Password Change Page</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <a href="{{route('merchant.user')}}" class="btn btn-danger float-end  mx-auto" >
        All Merchant User
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
                <div class="alert alert-success alert-dismissible fade show" >
                  <strong>{{session('success')}}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                  @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" >
                  <strong>{{session('error')}}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="fw-bold"> expense Page Section</h5>
            </div> -->
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('admin.merchant.change-password',$merchant->id) }}" >
                
                    @csrf
                    <div class="row pb-5" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Password</label>
                                <input  name="password"  type="text"  class="form-control form-control" placeholder="Enter New Password " required>
                                <div class="alert-message text-danger" ></div>
                            </div>
                        </div> 

                        <div class="col-md-6" style="margin-top:28px">
                  
                    <button type="submit" id="store_expense_submit_button" class="btn btn-primary btn-block">Merchant Update Password</button>
                    
                </div>
                    </div>
                 
            
                
            </form>
            </div>
        </div>
    </div>
</div>


<script >
$(function(){
    var $form = $("#regiForm");
    if($form.length){
        $form.validate({
            rules:{
                merchant_name:{
                    required:true
                }
            },
            messages:{
                merchant_name:{
                    required: 'Merchant name id required'
                }
            }
        })
    }
})
    
</script>

@endsection