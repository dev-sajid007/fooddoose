<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Add employee</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<form method="post"  enctype="multipart/form-data" action="{{ route('employee.store') }}" >
				<div class="modal-body">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Name</label>
								<input name="name"  type="text" @error('name') is-invalid @enderror class="form-control" placeholder=" Name " >
								
								@error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Email</label>
								<input name="email"  type="email"  class="form-control" placeholder=" Email ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Mobile</label>
								<input name="mobile"  type="text"  class="form-control" placeholder="Mobile">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Join Date</label>
								<input name="join_date"  type="date"  class="form-control" placeholder="Join Date">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Date Of Birth</label>
								<input name="dob"  type="date"  class="form-control" placeholder="Date Of Birth">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label" >Address</label>
								<input name="address"  type="text"  class="form-control" placeholder="Address">
							</div>
						</div>

							<div class="col-md-6">
							<div class="form-group">
							<label class="form-label"  >Status</label>
							<select name="status"class="form-control" placeholder="status">
							<option value="">Select Status</option>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						    </select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label" >Photo</label>
								<input name="photo"  type="file" id="photo"  class="form-control" placeholder="Address">
							</div>
						</div>
					
						
					</div>
					
					
					
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Experience</label>
						
						<textarea name="experience" class="form-control summernote" placeholder="experience"> </textarea>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" class="btn ">Add Employee</button>
					
				</div>
			</form>
		</div>
	</div>
</div>