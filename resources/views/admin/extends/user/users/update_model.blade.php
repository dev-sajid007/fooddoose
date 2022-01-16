<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update User</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_user">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="id"  id="id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Name</label>
								<input name="name"  type="text" id="name"  class="form-control" placeholder=" Name " >
								{{-- @error('Heading') is-invalid @enderror
								@error('Heading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Email</label>
								<input name="email"  type="email" id="email" class="form-control" placeholder=" Email  ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Mobile</label>
								<input name="phone"  type="text" id="phone" class="form-control" placeholder="Mobile">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >User Type</label>
								<input name="user_type"  type="text" id="user_type"  class="form-control" placeholder="User Type">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Address</label>
								<input name="address"  type="text" id="address"  class="form-control" placeholder="Address">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Role</label>
								<input name="role_id"  type="text" id="role_id"  class="form-control" placeholder="Role">
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
							<label class="form-label"  >Status</label>
							<select name="status"class="form-control" id="status" placeholder="status">
							<option value="">Select Status</option>
							<option value="1">Approved</option>
							<option value="2">Pending</option>
							<option value="2">Reject</option>
						    </select>
							</div>
						</div>


						
					</div>
					
					
				</div>
				
				
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="user_update_submit_button" class="btn ">Update User Page</button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>