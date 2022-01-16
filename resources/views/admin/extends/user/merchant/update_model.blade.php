<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Merchant</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_merchant">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="merchant_id"  id="merchant_id">
					<input type="hidden" name="id"  id="id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Business Name</label>
								<input name="business_name" type="text" id="business_name" class="form-control" placeholder=" Business Name ">
								<div class="alert-message text-danger" id="wayError"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Bkash Number</label>
								<input name="bkash_number"   type="text" id="bkash_number" class="form-control" placeholder=" Bkash Number
								]">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Rocket Number</label>
								<input name="rocket_number"   type="text" id="rocket_number" class="form-control" placeholder=" Rocket Number
								]">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Nagad Number</label>
								<input name="nagad_number"   type="text" id="nagad_number" class="form-control" placeholder=" Nagad Number
								]">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Bank Name</label>
								<input name="bank_name"   type="text" id="bank_name" class="form-control" placeholder=" Bank Name
								]">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Account Number</label>
								<input name="account_number"   type="text" id="account_number" class="form-control" placeholder=" Account Number
								]">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Account Name</label>
								<input name="account_name"   type="text" id="account_name" class="form-control" placeholder=" Account Name
								]">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Payment Method</label>
								<input name="payment_method"   type="text" id="payment_method" class="form-control" placeholder=" Payment Method
								]">
							</div>
						</div>

						{{-- <div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Select Status</label>
							<select name="status"class="form-control" id="status" placeholder="status">
							<option value="">Select Status</option>
							<option value="1">Approved</option>
							<option value="2">Pending</option>
							<option value="3">Reject</option>
						    </select>
								
							</div>
						</div>
						 --}}
					</div>
					
					
				</div>
				
				
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="merchant_update_submit_button" class="btn ">Update Merchant Page</button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>