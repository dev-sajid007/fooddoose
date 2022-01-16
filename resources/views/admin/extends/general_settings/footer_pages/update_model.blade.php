<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Footer Page</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_or_create_from">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="footer_page_id"  id="footer_page_id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Title</label>
								<input name="title"  type="text" id="title" class="form-control" placeholder=" Title ">
								<div class="alert-message text-danger" id="titleError"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Meta Tags</label>
								<input name="meta_tags"  type="text" id="meta_tags" class="form-control" placeholder=" Meta Tags ">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label"  >Header</label>
								<input name="header"  type="text" id="header" class="form-control" placeholder="Header">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label"  >Sub Header</label>
								<input name="sub_header"  type="text" id="sub_header" class="form-control" placeholder="Sub Header">
							</div>
						</div>
						<div class="col-md-4">
							<div class="row" data-select2-id="14">
								
								<div class="mb-3" data-select2-id="28">
									<label class="form-label">Position</label>
									<select class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" name="position" id="position" required="">
										<option value="1">Position 1</option>
										<option value="2">Position 2</option>
										<option value="3">Position 3</option>
										<option value="4">Position 4</option>
									</select>
								</div>
								
							</div>
							
						</div>
						
						
					</div>
					
					<div class="row">
						<div class="form-group">
							<label class="form-label"  for="simpleinput">Description</label>
							
							<textarea name="description" id="description" class="form-control summernote" placeholder="Description"> </textarea>
						</div>
					</div>
					
				</div>
				
				
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="contact_us_submit_button" class="btn ">update Footer Page</button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>