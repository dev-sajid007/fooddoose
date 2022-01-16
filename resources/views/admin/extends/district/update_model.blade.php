<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f46f22;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Update District</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    	<form method="post" action="{{url('admin/update-district')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="district_id" value="" id="district_id" name="">
		<div class="form-group">
			<label class="form-label" name="slider_link" for="simpleinput">District Name</label>
			<input name="district_name" value="" type="text" id="district_name" class="form-control" placeholder="District Name ">
		</div>
		<div class="form-group">
			<label class="form-label" name="slider_link" for="simpleinput">District Description</label>
			
			<textarea name="district_details" id="district_details" class="form-control" placeholder="District Description"> </textarea>
		</div>
		
		
		<div class="form-group">
			<label class="form-label" for="example-palaceholder">District Image</label>
			<input type="file"  name="district_photo" id="" class="form-control" placeholder="placeholder">
		</div>
		<div class="form-group">
			<label class="form-label" for="example-palaceholder">District Banner immage</label>
			<input type="file"  name="district_banner_photo" id="" class="form-control" placeholder="placeholder">
		</div>
		
		
		
		
		
		
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" style="background:#f46f22;color:white" class="btn ">update Brand</button>
        </form>
      </div>
    </div>
  </div>
</div>