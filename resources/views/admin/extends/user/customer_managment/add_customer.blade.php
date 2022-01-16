<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background:#f46f22;color:white">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Add service</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{url('Admin/store-service')}}" enctype="multipart/form-data">
					@csrf
					
					<div class="form-group">
						<label class="form-label"  for="simpleinput">service Name</label>
						<input name="depertment_name" value="" type="text"  class="form-control" placeholder="Service Name ">
					</div>

			
					<div class="form-group">
						<label class="form-label"  for="simpleinput">service Description</label>
						
						<textarea name="depertment_description" class="form-control" placeholder="Service Description"> </textarea>
					</div>
					
					
					<div class="form-group">
						<label class="form-label" for="example-palaceholder">service Photo</label>
						<input type="file"  name="depertment_photo"  class="form-control" placeholder="placeholder">
					</div>
					<div class="form-group">
						<label class="form-label" >service Banner immage</label>
						<input type="file"  name="depertment_banner_photo"  class="form-control" placeholder="placeholder">
					</div>
					
					
					
					
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit"  style="background:#f46f22;color:white" class="btn ">Add Service</button>
				</form>
			</div>
		</div>
	</div>
</div>