<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Add Area</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{url('admin/store-area')}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Area Name</label>
						<input name="area_name" value="" type="text" id="simpleinput" class="form-control" placeholder="Area Name ">
					</div>
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Area Description</label>
						<textarea name="area_description" class="form-control" placeholder="Area Description"> </textarea>
					</div>
					<div class="form-group">
						<label class="form-label" for="example-palaceholder">Area Photo</label>
						<input type="file"  name="area_photo" id="example-palaceholder" class="form-control" placeholder="placeholder">
					</div>
					<div class="form-group">
						<label class="form-label" for="example-palaceholder">Area Banner immage</label>
						<input type="file"  name="area_banner_photo" id="example-palaceholder" class="form-control" placeholder="placeholder">
					</div>
					<div class="form-group">
						<label class="form-label"  for="simpleinput"> Select District</label>
						<select class="form-control" name="district_id" required="">
							@foreach($select_district as $select_district_info)
							<option value="{{$select_district_info->district_id}}">{{$select_district_info->district_name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" class="btn ">Add Area</button>
				</form>
			</div>
		</div>
	</div>
</div>