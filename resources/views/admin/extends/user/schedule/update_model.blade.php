<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_schedule">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="schedule_id"  id="schedule_id">
					<div class="row">
						<div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input"  type="checkbox" name="sunday" value="1"  id="sunday">
                              <label class="form-check-label" for="1">
                                Sunday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="monday" value="1" id="monday">
                              <label class="form-check-label" for="1">
                                Monday
                              </label>
                            </div>
                        </div>
                    
                     <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="tuesday" value="1" id="tuesday">
                              <label class="form-check-label" for="1">
                                Tuesday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="wednesday" value="1" id="wednesday">
                              <label class="form-check-label" for="1">
                                Wednesday
                              </label>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" name="thursday" value="1" id="thursday">
                              <label class="form-check-label" for="1">
                                Thursday
                              </label>
                            </div>
                        </div>
                    
                     <div class="col-md-2">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" value="1" id="friday" name="friday">
                              <label class="form-check-label" for="1">
                                friday
                              </label>
                            </div>
                        </div>
                          <div class="col-md-2" style="margin-top:43px">
                            <div class="form-group">
                               <input class="form-check-input" type="checkbox" value="1" id="saturday" name="saturday">
                              <label class="form-check-label" for="1">
                                Saturday
                              </label>
                            </div>
                        </div>

                        <hr>

                         <div class="col-md-5" style="margin-top: 20px;">
                            <div class="form-group">
                                <label class="form-label"  >Shop Open</label>
                                <input name="shop_open"  type="time" id="shop_open" class="form-control form-control-sm" placeholder=" Shop Open ">
                                <div class="alert-message text-danger" id="expenseError"></div>
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-top: 20px;">
                            <div class="form-group">
                                <label class="form-label"  >Shop Close</label>
                                <input name="shop_close" id="shop_close"  type="time" class="form-control form-control-sm" placeholder=" Shop Close ">
                            </div>
                        </div >
					
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" style="background:#f46f22;color:white" id="schedule_update_submit_button" class="btn ">Update Schedule </button>
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>