<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{url('admin/store-staff')}}" enctype="multipart/form-data">
				<div class="modal-body">
					@csrf
					<div class="form-group">
						<label class="form-label"  for="name">Staff Name</label>
						<input name="name" value="" type="text"  class="form-control" placeholder="Staff Name" required>
					</div>
					<div class="form-group">
						<label class="form-label"  for="email">Staff Email</label>
						<input name="email" type="email" required  class="form-control" placeholder="Staff Email">
					</div>
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Staff Address</label>
						
						<textarea name="address"  class="form-control" placeholder="Address"></textarea>
					</div>
						<div class="form-group">
						<label >Select Role</label>
						<select name="role_id"  class="form-control form-control-lg" required>
							<option disabled="">Role...</option>
							@foreach($select_role as $select_role_info)
							<option value="{{$select_role_info->role_id}}">{{$select_role_info->name}}</option>
							@endforeach
							
						</select>
					</div>

					<div class="form-group">
						<label >Select Status</label>
						<select name="status" class="form-control form-control-lg" required>
							<option disabled="">Status...</option>
							<option value="1">Active</option>
							<option value="2">Pending</option>
							<option value="3">Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label"  for="name">Password</label>
						<input name="password" type="password"  class="form-control" placeholder="Staff Name" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" class="btn ">Add Staff</button>
					
				</div>
			</form>
		</div>
	</div>
</div>