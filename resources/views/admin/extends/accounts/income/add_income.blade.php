<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Add Income</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<form method="post"  enctype="multipart/form-data" id="store_income">
				<div class="modal-body">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Way</label>
								<input name="way"  type="text"  class="form-control" placeholder=" Way " >
								{{-- @error('way') is-invalid @enderror
								@error('way')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Vendor</label>
								<input name="vendor"  type="text"  class="form-control" placeholder=" Vendor Name ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Amount</label>
								<input name="amount"  type="text"  class="form-control" placeholder="Amount">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label"  >Income Date</label>
								<input name="income_date"  type="date"  class="form-control" placeholder="Income Date">
							</div>
						</div>
					
						
					</div>
					
					
					
					
					<div class="form-group">
						<label class="form-label"  for="simpleinput">Description</label>
						
						<textarea name="description" class="form-control summernote" placeholder="Description"> </textarea>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="store_income_submit_button" class="btn ">Add Income</button>
					
				</div>
			</form>
		</div>
	</div>
</div>