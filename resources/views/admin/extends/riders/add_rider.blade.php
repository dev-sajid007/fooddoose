<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Add Rider</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<form method="post"  enctype="multipart/form-data" id="store_rider">
				<div class="modal-body">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Name</label>
								<input name="name"  type="text"  class="form-control" placeholder=" Name " >
								{{-- @error('way') is-invalid @enderror
								@error('way')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Email</label>
								<input name="email"  type="email"  class="form-control" placeholder=" Email Name ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Mobile</label>
								<input name="phone"  type="text"  class="form-control" placeholder="Mobile">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Address</label>
							<select name="status"class="form-control" placeholder="status">
							<option value="">Select Status</option>
							<option value="1">Approved</option>
							<option value="2">Pending</option>
							<option value="3">Reject</option>
						    </select>
								
							</div>
						</div>
					</div>
					
					
					
					
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Address</label>
						<input name="address"  type="text"  class="form-control" placeholder="Address">
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary float-left" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="store_rider_submit_button" class="btn  float-left">Add Rider</button>
					
				</div>
			</form>
		</div>
	</div>
</div>