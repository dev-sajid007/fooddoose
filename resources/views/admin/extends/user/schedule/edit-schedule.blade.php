@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Edit Schedule Page</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
       
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
                <form method="post"  enctype="multipart/form-data" action="{{ route('schedule.update',$schedule->schedule_id) }}">
                
                    @csrf
                    <div class="row pb-5" >
                        
                  <h5 style="margin-top:25px;color:green">Schedule Information</h5>
                         <hr style="border:solid 3px red;">


                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="sunday" value="{{($schedule->sunday=="1")?"selected":""}}"  >
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
                               <input class="form-check-input" type="checkbox" name="tuesday" value="1" id="tuesday">
                              <label class="form-check-label" for="tuesday">
                                Tuesday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="wednesday" value="1" id="wednesday">
                              <label class="form-check-label" for="wednesday">
                                Wednesday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="thursday" value="1" id="thursday">
                              <label class="form-check-label" for="thursday">
                                Thursday
                              </label>
                            </div>
                        </div>
                    
                     <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" value="1" id="friday" name="friday">
                              <label class="form-check-label" for="friday">
                                friday
                              </label>
                            </div>
                        </div>
                          <div class="col-md-2" style="margin-top:43px">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" value="1" id="saturday" name="saturday">
                              <label class="form-check-label" for="saturday">
                                Saturday
                              </label>
                            </div>
                        </div>



                         <div class="col-md-5" style="margin-top: 20px;">
                            <div class="form-group">
                                <label class="form-label"  >Shop Open</label>
                                <input name="shop_open" value="{{ $schedule->shop_open }}"  type="time"  class="form-control form-control-sm" placeholder=" Shop Open ">
                                <div class="alert-message text-danger" id="expenseError"></div>
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-top: 20px;">
                            <div class="form-group">
                                <label class="form-label"  >Shop Close</label>
                                <input name="shop_close" value="{{  $schedule->shop_close }}"  type="time" class="form-control form-control-sm" placeholder=" Shop Close ">
                            </div>
                        </div >


                       
                        
                    </div>
                 
            
                <div class="modal-footer">
                  
                    <button type="submit" id="store_expense_submit_button" class="btn btn-primary btn-block">Update Schedule</button>
                    
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection