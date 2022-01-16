<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Add District</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{url('admin/store-district')}}" enctype="multipart/form-data">
					@csrf
					
					<div class="form-group">
						<label class="form-label" name="district_name" for="simpleinput">District Name</label>
						<input name="district_name" value="" type="text" id="simpleinput" class="form-control" placeholder="District Name ">
					</div>
					<div class="form-group">
						<label class="form-label" name="district_details" for="simpleinput">District Description</label>
						
						<textarea name="district_details" class="form-control" placeholder="District Description"> </textarea>
					</div>
					
					
					<div class="form-group">
						<label class="form-label" for="example-palaceholder">District Photo</label>
						<input type="file"  name="district_photo" id="example-palaceholder" class="form-control" placeholder="placeholder">
					</div>
					<div class="form-group">
						<label class="form-label" for="example-palaceholder">District Banner immage</label>
						<input type="file"  name="district_banner_photo" id="example-palaceholder" class="form-control" placeholder="placeholder">
					</div>
					
					
					
					
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" class="btn ">Add District</button>
				</form>
			</div>
		</div>
	</div>
</div>