<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Staff</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{url('admin/update-staff')}}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" id="id">
					
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Staff Name</label>
						<input name="name"  type="text" id="name" class="form-control" placeholder="Staff Name">
					</div>
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Staff Email</label>
						<input name="email"  type="email" id="email" class="form-control" placeholder="Staff Email">
					</div>
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Staff Address</label>
						
						<textarea name="address" id="address" class="form-control" placeholder="Address"></textarea>
					</div>
					<div class="form-group">
						<label >Select Role</label>
						<select name="role_id" id="role_id" class="form-control form-control-lg" >
							<option disabled="">Role...</option>
							@foreach($select_role as $select_role_info)
							<option value="{{$select_role_info->role_id}}">{{$select_role_info->name}}</option>
							@endforeach
							
						</select>
					</div>

					<div class="form-group">
						<label >Select Status</label>
						<select name="status" id="status" class="form-control form-control-lg" required>
							<option disabled="">Status...</option>
							<option value="1">Active</option>
							<option value="2">Pending</option>
							<option value="3">Inactive</option> 
							
						</select>
					</div>
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" class="btn ">Update  Customer</button>
				</form>
			</div>
		</div>
	</div>
</div>