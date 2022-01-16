<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{url('admin/update-customer')}}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" id="id">
					
					<div class="row">
						
					</div>
					<div class="form-group">
						<label class="form-label"  for="simpleinput">First Name</label>
						<input name="first_name"  type="text" id="first_name" class="form-control" placeholder="First Name">
					</div>

					<div class="form-group">
						<label class="form-label"  for="simpleinput">Last Name</label>
						<input name="last_name"  type="text" id="last_name" class="form-control" placeholder="Last Name">
					</div>

						<div class="form-group">
						<label class="form-label"  for="simpleinput">Customer Email</label>
						<input name="email"  type="email" id="email" class="form-control" placeholder="Customer Email">
					</div>

					<div class="form-group">
						<label class="form-label"  for="simpleinput">Customer Phone</label>
						<input name="phone"  type="text" id="phone" class="form-control" placeholder="Customer Phone">
					</div>

					<!--<div class="form-group">-->
					<!--	<label class="form-label"  for="simpleinput"> Gender</label>-->
					<!--	<select class="form-control" name="gender">-->
					<!--		<option value="1">Male</option>-->
					<!--		<option value="2">Female</option>-->
					<!--	</select>-->
					<!--</div>-->

				
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Customer Address</label>
						
						<textarea name="address" id="address" class="form-control" placeholder="Address"> </textarea>
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