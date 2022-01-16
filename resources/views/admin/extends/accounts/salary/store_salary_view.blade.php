@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Add Salary</h5>
    </div>
    <div class="col-md-3 col-sm-12 text-center">
        <a href="{{url('admin/salary')}}" class="btn btn-danger float-end  mx-auto" >
        Salary List
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
                <form method="post"  enctype="multipart/form-data" action="{{ route('store.salary') }}" {{-- id="regiForm" --}}>
                
                    @csrf
                    <div class="row pb-5" >
                      {{--   <h5 style="color:green">Salary Information</h5>
                        <hr style="border:solid 3px red;"> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Employee Name</label>
                                <select name="employee_id"class="form-control form-control-sm" placeholder="status">
                                    <option value="">Select Employee Name</option>
                                    @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                  @endforeach
                                    </select>
                                <div class="alert-message text-danger" ></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Salary Type</label>
                                <select name="salary_type"class="form-control form-control-sm" placeholder="status">
                                <option value="">Select Salary Type</option>
                                <option value="Full Salary">Full Salary</option>
                                <option value="Advanched">Advanched</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Select Pay System</label>
                                <select name="pay_system"class="form-control form-control-sm" placeholder="status">
                                <option value="">Select Pay System</option>
                                <option value="Salary">Salary</option>
                                <option value="Bonus">Bonus</option>
                                <option value="Achivment">Achivment</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Pay Method</label>
                                <select name="pay_method"class="form-control form-control-sm" placeholder="status">
                                <option value="">Select Pay Method</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank Account">Bank Account</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Rocket">Rocket</option>
                                <option value="Nagad">Nagad</option>
                                </select>
                            </div>
                        </div>
                     

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Year</label>
                                 <select name="year"class="form-control form-control-sm" placeholder="status">
                                    <option value="">Select Year</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>
                                    <option value="2038">2038</option>
                                    <option value="2039">2039</option>
                                    <option value="2040">2040</option>
                                    </select>
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Month</label>
                                 <select name="month"class="form-control form-control-sm" placeholder="status">
                                    <option value="">Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Payment Date</label>
                                <input name="pay_date" value="{{ old('pay_date' )}}"  type="date" class="form-control form-control-sm" placeholder=" Payment Date ">
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Amount</label>
                                <input name="amount" value="{{ old('amount' )}}"  type="text" class="form-control form-control-sm" placeholder=" Amount ">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label"  >Note</label>
                                <textarea name="note" value="{{ old('note' )}}"  type="text" class="form-control form-control-sm" placeholder=" Note "></textarea>
                            </div>
                        </div>

                        
                    </div>
                 
            
                <div class="modal-footer">
                  
                    <button type="submit" id="store_expense_submit_button" class="btn btn-primary btn-block">Create Salary</button>
                    
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