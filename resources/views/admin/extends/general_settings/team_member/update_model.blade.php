<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Team Member</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_or_create_from">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="team_member_input_id" id="team_member_id">
					<div class="form-group">
						<label class="form-label"  >Name</label>
						<input name="name" id="name" type="text"  class="form-control" placeholder=" Team Member Name">
					</div>
					<div class="form-group">
						<label class="form-label" >Position</label>
						<input name="position"  id="position" type="text"  class="form-control" placeholder="Team Member Position">
					</div>
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Details</label>
						<textarea name="details" id="details" class="form-control" placeholder="Sponsor details" > </textarea>
						
					</div>
					<div class="form-group">
						<label class="form-label"  >Phone</label>
						<input name="phone" id="phone"  type="text"  class="form-control" placeholder="Phone Number">
					</div>
					<div class="form-group">
						<label class="form-label"  >Email Address</label>
						<input name="email"  id="email" type="email"  class="form-control" placeholder="Email Address">
					</div>
					<div class="form-group">
						<label class="form-label"  >Facebook</label>
						<input name="facebook"  id="facebook" type="text"  class="form-control" placeholder="Facebook Address">
					</div>
					<div class="form-group">
						<label class="form-label"  >Linkdin</label>
						<input name="linkdin" id="linkdin" type="text"  class="form-control" placeholder="Linkdin Address">
					</div>
					<div class="form-group">
						<label class="form-label"  >Twitter</label>
						<input name="twitter" id="twitter" type="text"  class="form-control" placeholder="Twitter Address">
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Team Member Image</label>
						<input type="file" name="team_member_image" class="form-control"  placeholder="Product Image">
					</div>
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="team_member_submit_button" class="btn ">update Team Member</button>
					
				</div>
			</form>
		</div>
	</div>
</div>