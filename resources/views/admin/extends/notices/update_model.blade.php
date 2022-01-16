<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update notice</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_notice">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="notice_id"  id="id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Heading</label>
								<input name="heading"  type="text" id="heading"  class="form-control" placeholder=" Heading " >
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
								<label class="form-label"  >Sub Heading</label>
								<input name="sub_heading"  type="text" id="sub_heading" class="form-control" placeholder=" Sub Heading  ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Title</label>
								<input name="title"  type="text" id="title" class="form-control" placeholder="Title">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Notice Date</label>
								<input name="notice_date"  type="date" id="notice_date"  class="form-control" placeholder="Notice Date">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label class="form-label"  >Status</label>
							<select name="status"class="form-control" id="status" placeholder="status">
							<option value="">Select Status</option>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						    </select>
							</div>
						</div>
						
					</div>
					
					
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Notice Details</label>
						
						<textarea name="details" id="details" class="form-control summernote" placeholder="details"> </textarea>
					</div>
					
				</div>
				
				
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="notice_update_submit_button" class="btn ">Update Notice Page</button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>