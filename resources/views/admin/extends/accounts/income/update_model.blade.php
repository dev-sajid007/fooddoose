<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Income</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_income">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="income_id"  id="income_id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Way</label>
								<input name="way" name="way" type="text" id="way" class="form-control" placeholder=" Way ">
								<div class="alert-message text-danger" id="wayError"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Vendor</label>
								<input name="vendor"   type="text" id="vendor" class="form-control" placeholder=" Vendor Name ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Amount</label>
								<input name="amount"  type="text" id="amount" class="form-control" placeholder="Amount">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Income Date</label>
								<input name="income_date"  type="date" id="income_date" class="form-control" placeholder="Income Date">
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
					<button type="submit" style="background:#f46f22;color:white" id="income_update_submit_button" class="btn ">Update Income Page</button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>