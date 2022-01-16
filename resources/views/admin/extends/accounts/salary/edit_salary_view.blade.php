@extends('admin.admin_master')
@section('content')
<div class="row mb-1 ml-1">
    <div class="col-md-9 col-sm-12">
        <h5 class="fw-bold text-dark  font-weight-bold"> Edit Salary</h5>
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
                <form method="post"  enctype="multipart/form-data" action="{{ route('update.salary',$salary->id) }}" {{-- id="regiForm" --}}>
                
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
                                    <option value="{{ $employee->id }}"{{ $employee->id == $salary->employee_id ?" selected":""}}>{{ $employee->name }}</option>
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
                                <option value="Full Salary"{{($salary->salary_type=="Full Salary")?"selected":""}}>Full Salary</option>
                                <option value="Advanched"{{($salary->salary_type=="Advanched")?"selected":""}}>Advanched</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Select Pay System</label>
                                <select name="pay_system"class="form-control form-control-sm" placeholder="status">
                                <option value="">Select Pay System</option>
                                <option value="Salary"{{($salary->pay_system=="Salary")?"selected":""}}>Salary</option>
                                <option value="Bonus"{{($salary->pay_system=="Bonus")?"selected":""}}>Bonus</option>
                                <option value="Achivment"{{($salary->pay_system=="Achivment")?"selected":""}}>Achivment</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Pay Method</label>
                                <select name="pay_method"class="form-control form-control-sm" placeholder="status">
                                <option value="">Select Pay Method</option>
                                <option value="Cash"{{($salary->pay_method=="Cash")?"selected":""}}>Cash</option>
                                <option value="Bank Account"{{($salary->pay_method=="Bank Account")?"selected":""}}>Bank Account</option>
                                <option value="Bkash"{{($salary->pay_method=="Bkash")?"selected":""}}>Bkash</option>
                                <option value="Rocket"{{($salary->pay_method=="Rocket")?"selected":""}}>Rocket</option>
                                <option value="Nagad"{{($salary->pay_method=="Nagad")?"selected":""}}>Nagad</option>
                                </select>
                            </div>
                        </div>
                     

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Year</label>
                                 <select name="year"class="form-control form-control-sm" placeholder="status">
                                    <option value="">Select Year</option>
                                    <option value="2021"{{($salary->year=="2021")?"selected":""}}>2021</option>
                                    <option value="2022"{{($salary->year=="2022")?"selected":""}}>2022</option>
                                    <option value="2023"{{($salary->year=="2023")?"selected":""}}>2023</option>
                                    <option value="2024"{{($salary->year=="2024")?"selected":""}}>2024</option>
                                    <option value="2025"{{($salary->year=="2025")?"selected":""}}>2025</option>
                                    <option value="2026"{{($salary->year=="2026")?"selected":""}}>2026</option>
                                    <option value="2027"{{($salary->year=="2027")?"selected":""}}>2027</option>
                                    <option value="2028"{{($salary->year=="2028")?"selected":""}}>2028</option>
                                    <option value="2029"{{($salary->year=="2029")?"selected":""}}>2029</option>
                                    <option value="2030"{{($salary->year=="2030")?"selected":""}}>2030</option>
                                    <option value="2031"{{($salary->year=="2031")?"selected":""}}>2031</option>
                                    <option value="2032"{{($salary->year=="2032")?"selected":""}}>2032</option>
                                    <option value="2033"{{($salary->year=="2033")?"selected":""}}>2033</option>
                                    <option value="2034"{{($salary->year=="2034")?"selected":""}}>2034</option>
                                    <option value="2035"{{($salary->year=="2035")?"selected":""}}>2035</option>
                                    <option value="2036"{{($salary->year=="2036")?"selected":""}}>2036</option>
                                    <option value="2037"{{($salary->year=="2037")?"selected":""}}>2037</option>
                                    <option value="2038"{{($salary->year=="2038")?"selected":""}}>2038</option>
                                    <option value="2039"{{($salary->year=="2039")?"selected":""}}>2039</option>
                                    <option value="2040"{{($salary->year=="2040")?"selected":""}}>2040</option>
                                    </select>
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Select Month</label>
                                 <select name="month"class="form-control form-control-sm" placeholder="status">
                                    <option value="">Select Month</option>
                                    <option value="January"{{($salary->month=="January")?"selected":""}}>January</option>
                                    <option value="February"{{($salary->month=="February")?"selected":""}}>February</option>
                                    <option value="March"{{($salary->month=="March")?"selected":""}}>March</option>
                                    <option value="April"{{($salary->month=="April")?"selected":""}}>April</option>
                                    <option value="May"{{($salary->month=="May")?"selected":""}}>May</option>
                                    <option value="June"{{($salary->month=="June")?"selected":""}}>June</option>
                                    <option value="July"{{($salary->month=="Julay")?"selected":""}}>July</option>
                                    <option value="August"{{($salary->month=="August")?"selected":""}}>August</option>
                                    <option value="September"{{($salary->month=="September")?"selected":""}}>September</option>
                                    <option value="October"{{($salary->month=="October")?"selected":""}}>October</option>
                                    <option value="November"{{($salary->month=="November")?"selected":""}}>November</option>
                                    <option value="December"{{($salary->month=="December")?"selected":""}}>December</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Payment Date</label>
                                <input name="pay_date" value="{{ $salary->pay_date}}"  type="date" class="form-control form-control-sm" placeholder=" Payment Date ">
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"  >Amount</label>
                                <input name="amount" value="{{ $salary->amount}}"  type="text" class="form-control form-control-sm" placeholder=" Amount ">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label"  >Note</label>
                                <textarea name="note"   type="text" class="form-control form-control-sm" placeholder=" Note ">{{ $salary->note}}</textarea>
                            </div>
                        </div>

                        
                    </div>
                 
            
                <div class="modal-footer">
                  
                    <button type="submit" id="store_expense_submit_button" class="btn btn-primary btn-block">Update Salary</button>
                    
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