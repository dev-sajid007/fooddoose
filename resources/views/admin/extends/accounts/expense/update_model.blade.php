<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_expense">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="expense_id"  id="expense_id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Purpose</label>
								<input name="purpose" name="purpose" type="text" id="purpose" class="form-control" placeholder=" purpose ">
								<div class="alert-message text-danger" id="purposeError"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Vendor</label>
								<input type="text" name="vendor"    id="vendor" class="form-control" placeholder=" Vendor Name ">
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
								<label class="form-label"  >expense Date</label>
								<input name="expense_date"  type="date" id="expense_date" class="form-control" placeholder="expense Date">
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
					<button type="submit" style="background:#f46f22;color:white" id="expense_update_submit_button" class="btn ">Update Expense Page</button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>