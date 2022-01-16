@extends('admin.admin_master')
@section('content')
<div class="row">

    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-white bg-info">
                <h2>Merchant Store</h2>
            </div>

            <div class="card-body">
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
                <!-- <form id="regForm" action="/action_page.php"> -->
                <form method="post" id="regForm" action="{{url('admin/store-merchant')}}">
                    <!-- <h1>Merchant Account:</h1> -->
                    <!-- One "tab" for each step in the form: -->
                    @csrf
                    <div class="tab">
                        <h3 class="text-danger font-weight-bold">Marchant Main Info</h3>
                        <label for="merchant_name">Merchant Name</label>
                        <input type="text" oninput="this.className = ''" name="merchant_name" class="form-control" value="{{ old('merchant_name') }}" placeholder="Merchant Name" required>
                        <label for="merchant_email">Merchant Email</label>
                        <input type="text" oninput="this.className = ''" name="merchant_email" class="form-control" value="{{ old('merchant_email') }}" placeholder="Merchant Email" required>
                        <label for="merchant_phone">Merchant Phone</label>
                        <input oninput="this.className = ''" type="text" name="merchant_phone" class="form-control" placeholder="Merchant Phone" value="{{ old('merchant_phone') }}" required>
                        <label for="merchant_address">Merchant Address</label>
                        <textarea oninput="this.className = ''" type="text" name="merchant_address" class="form-control" placeholder="Merchant Address" required value="{{ old('merchant_address') }}"></textarea>
                        <label for="merchant_status">Merchant Status</label>
                        <select oninput="this.className = ''"  name="merchant_status" class="form-control" placeholder="Merchant Status" required value="{{ old('merchant_status') }}">
                            <option>active</option>
                            <option>inactive</option>
                            <option>rejected</option>
                        </select>
                        <label for="merchant_password">Merchant Password</label>
                        <input oninput="this.className = ''" type="text" name="merchant_password" class="form-control" placeholder="Merchant Password" required>
                        
                    </div>
                    <div class="tab">
                        <h3 class="text-danger font-weight-bold">Marchant Additional Info</h3>
                        <label for="business_name">Business Name</label>
                        <input oninput="this.className = ''" type="text" name="business_name" class="form-control" placeholder="Business Name" value="{{ old('business_name') }}" required>
                        <label for="bkash_number">Bkash Number</label>
                        <input oninput="this.className = ''" type="text" name="bkash_number" class="form-control" placeholder="Bkash Number" value="{{ old('bkash_number') }}" required>
                        <label for="rocket_number">Rocket Number</label>
                        <input oninput="this.className = ''" type="text" name="rocket_number" class="form-control" placeholder="Rocket Number" value="{{ old('rocket_number') }}" required>
                        <label for="nagad_number">Nagad Number</label>
                        <input oninput="this.className = ''" type="text" name="nagad_number" class="form-control" placeholder="Nagad Number" value="{{ old('nagad_number') }}" required>
                        <label for="bank_name">Bank Name</label>
                        <input oninput="this.className = ''" type="text" name="bank_name" class="form-control" placeholder="Bank Name" value="{{ old('bank_name') }}" required>
                        <label for="account_name">Account Name</label>
                        <input oninput="this.className = ''" type="text" name="account_name" class="form-control" placeholder="Account Name" required value="{{ old('account_name') }}">
                        <label for="account_number">Account Number</label>
                        <input oninput="this.className = ''" type="text" name="account_number" class="form-control" placeholder="Account Number" required value="{{ old('account_number') }}">
                        <label for="payment_method">Payment Method</label>
                        <input oninput="this.className = ''" type="text" name="payment_method" class="form-control" value="{{ old('payment_method') }}" placeholder="Payment Method" required>
                    </div>
                    <div class="tab">
                        <h3 class="text-danger font-weight-bold">Marchant Restaurant Info</h3>
                        <label for="restaurant_name">Restaurant Name</label>
                        <input oninput="this.className = ''" type="text" name="restaurant_name" class="form-control" placeholder="Restaurant Name" required value="{{ old('restaurant_name') }}">
                        <label for="restaurant_code">Restaurant Code</label>
                        <input oninput="this.className = ''" type="text" name="restaurant_code" value="{{ old('restaurant_code') }}" class="form-control" placeholder="Restaurant Code" required>
                        <label for="address">Restaurant Address</label>
                        <input oninput="this.className = ''" type="text" name="address" class="form-control" placeholder="Restaurant Address" value="{{ old('address') }}" required>
                        <label for="tin">Tin</label>
                        <input oninput="this.className = ''" type="text" name="tin" class="form-control" placeholder="Tin" required value="{{ old('tin') }}">
                        <label for="tin">since</label>
                        <input oninput="this.className = ''" type="text" name="since" class="form-control" placeholder="since" required value="{{ old('since') }}">
                        <label for="status">since</label>
                        <select oninput="this.className = ''"  name="status" class="form-control" placeholder="Status" required value="{{ old('status') }}">
                            <option value="1">active</option>
                            <option value="2">inactive</option>
                        </select>
                    </div>
                    <div class="tab">
                        <h3 class="text-danger font-weight-bold">Schedule</h3>
                        <label for="sunday">Sunday</label>
                        <input oninput="this.className = ''" type="checkbox" value="1" name="sunday" class="form-control" placeholder="Sunday" required value="{{ old('sunday') }}">
                        <label for="monday">Monday</label>
                        <input oninput="this.className = ''" type="checkbox" value="1" name="monday" class="form-control" placeholder="Monday" required value="{{ old('monday') }}">
                        <label for="monday">Tuesday</label>
                        <input oninput="this.className = ''" type="checkbox" value="1" name="tuesday" class="form-control" placeholder="Tuesday" required value="{{ old('tuesday') }}">
                        <label for="monday">Wednesday</label>
                        <input oninput="this.className = ''" type="checkbox" value="1" name="wednesday" class="form-control" value="{{ old('wednesday') }}" placeholder="Wednesday" required>
                        <label for="monday">Thursday</label>
                        <input oninput="this.className = ''" type="checkbox" value="1" name="thursday" class="form-control" placeholder="Thursday" required value="{{ old('thursday') }}">
                        <label for="monday">Friday</label>
                        <input oninput="this.className = ''" type="checkbox" value="1" name="friday" class="form-control" placeholder="Friday" required value="{{ old('friday') }}">
                        <label for="monday">Saturday</label>
                        <input oninput="this.className = ''" type="checkbox" value="1" name="saturday" class="form-control" placeholder="Saturday" required value="{{ old('saturday') }}">
                        <label for="monday">Shop Open</label>
                        <input oninput="this.className = ''" type="time" value="1" name="shop_open" class="form-control" placeholder="Saturday" required value="{{ old('shop_open') }}">
                        <label for="monday">Shop Close</label>
                        <input oninput="this.className = ''" type="time" value="1" name="shop_close" class="form-control" value="{{ old('shop_close') }}" placeholder="Shop Close" required>
                    </div>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" defer></script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
function showTab(n) {
// This function will display the specified tab of the form...
var x = document.getElementsByClassName("tab");
x[n].style.display = "block";
//... and fix the Previous/Next buttons:
if (n == 0) {
document.getElementById("prevBtn").style.display = "none";
} else {
document.getElementById("prevBtn").style.display = "inline";
}
if (n == (x.length - 1)) {
document.getElementById("nextBtn").innerHTML = "Submit";
} else {
document.getElementById("nextBtn").innerHTML = "Next";
}
//... and run a function that will display the correct step indicator:
fixStepIndicator(n)
}
function nextPrev(n) {
// This function will figure out which tab to display
var x = document.getElementsByClassName("tab");
// Exit the function if any field in the current tab is invalid:
if (n == 1 && !validateForm()) return false;
// Hide the current tab:
x[currentTab].style.display = "none";
// Increase or decrease the current tab by 1:
currentTab = currentTab + n;
// if you have reached the end of the form...
if (currentTab >= x.length) {
// ... the form gets submitted:
document.getElementById("regForm").submit();
return false;
}
// Otherwise, display the correct tab:
showTab(currentTab);
}
function validateForm() {
// This function deals with validation of the form fields
var x, y, i, valid = true;
x = document.getElementsByClassName("tab");
y = x[currentTab].getElementsByTagName("input");
// A loop that checks every input field in the current tab:
for (i = 0; i < y.length; i++) {
// If a field is empty...
if (y[i].value == "") {
// add an "invalid" class to the field:
y[i].className += " invalid";
// and set the current valid status to false
valid = false;
}
}
// If the valid status is true, mark the step as finished and valid:
if (valid) {
document.getElementsByClassName("step")[currentTab].className += " finish";
}
return valid; // return the valid status
}
function fixStepIndicator(n) {
// This function removes the "active" class of all steps...
var i, x = document.getElementsByClassName("step");
for (i = 0; i < x.length; i++) {
x[i].className = x[i].className.replace(" active", "");
}
//... and adds the "active" class on the current step:
x[n].className += " active";
}
</script>
<!-- <script>
$(function(){
var $sections=$('form-section');
function navigationTo(index){
$sections.remove('current').eq(index).addclass('index');
$('.form-navigation .previous').toggle(index>1);
var atTheEnd=index>=section.length-1;
$('.form-navigation .next').toggle(!atTheEnd);
$('.form-navigation type[submit]').toggle(atTheEnd);
}
});
</script> -->
@endsection
@section('css')
<style>
* {
box-sizing: border-box;
}
body {
background-color: #f1f1f1;
}
/*#regForm {
background-color: #ffffff;
margin: 100px auto;
font-family: Raleway;
padding: 40px;
width: 70%;
min-width: 300px;
}*/
h1 {
text-align: center;
}
input,textarea {
padding: 10px;
width: 100%;
font-size: 17px;
font-family: Raleway;
border: 1px solid #aaaaaa;
}
/* Mark input boxes that gets an error on validation: */
input.invalid {
background-color: #ffdddd;
}
/* Hide all steps by default: */
.tab {
display: none;
}
button {
background-color: #04AA6D;
color: #ffffff;
border: none;
padding: 10px 20px;
font-size: 17px;
font-family: Raleway;
cursor: pointer;
}
button:hover {
opacity: 0.8;
}
#prevBtn {
background-color: #bbbbbb;
}
/* Make circles that indicate the steps of the form: */
.step {
height: 15px;
width: 15px;
margin: 0 2px;
background-color: #bbbbbb;
border: none;
border-radius: 50%;
display: inline-block;
opacity: 0.5;
}
.step.active {
opacity: 1;
}
/* Mark the steps that are finished and valid: */
.step.finish {
background-color: #04AA6D;
}
</style>
@endsection