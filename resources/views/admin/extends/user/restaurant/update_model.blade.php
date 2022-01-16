<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Restaurant</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_restaurant">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="restaurant_id"  id="restaurant_id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Restaurant Name</label>
								<input name="restaurant_name" type="text" id="restaurant_name" class="form-control" placeholder=" Restaurant Name ">
								<div class="alert-message text-danger" id="wayError"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Restaurant Code</label>
								<input name="restaurant_code"   type="text" id="restaurant_code" class="form-control" placeholder=" Restaurant Code
								]">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Address</label>
								<input name="address"   type="text" id="address" class="form-control" placeholder=" Address
								]">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Tin No</label>
								<input name="tin"   type="text" id="tin" class="form-control" placeholder=" Tin No
								]">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Since</label>
								<input name="since"   type="text" id="since" class="form-control" placeholder=" Since
								]">
							</div>
						</div>

					<div class="col-md-6">
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
							
						
					</div>
					
					
				</div>
				
				
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="restaurant_update_submit_button" class="btn ">Update Restaurant </button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>