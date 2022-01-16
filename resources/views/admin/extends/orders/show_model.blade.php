<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header"  style="background:#f46f22;color:white">
				<h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post"  enctype="multipart/form-data" id="update_order">
				<div class="modal-body">
					
					@csrf
					<input type="hidden" name="id"  id="id">
					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label class="form-label"  >Change Order Status</label>
								<select name="status"class="form-control" id="status" placeholder="status">
									<option value="">Select Order Status</option>
									<option value="pending">Pending</option>
									<option value="process">Process</option>
									<option value="deliver">Deliver</option>
									<option value="hold">Hold</option>
									<option value="return">Return</option>
									<option value="reject">Reject</option>
									<option value="created">Create</option>
								</select>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h5 class="fw-bold">Customer Information</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<p class="h5">Name : <span id="customer_name_view"></span></p>
										
									</div>
									<div class="col-md-6">
										<p class="h5">Phone : <span id="customer_phone_view"></span></p>
										
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<p class="h5">Email : <span id="customer_email_view"></span></p>
										
									</div>
									<div class="col-md-6">
										<p class="text-dark text-lg font-weight-bold">Address : <span class="text-danger" id="customer_address_view"></span></p>
										
									</div>
									
								</div>
								<hr/>
							</div>
						</div>

						<div class="card" id="full_rider_info">
							<div class="card-header">
								<h5 class="fw-bold">Rider Information</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<p class="h5">Name : <span id="rider_name_view"></span></p>
										
									</div>
									<div class="col-md-6">
										<p class="h5">Phone : <span id="rider_phone_view"></span></p>
										
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<p class="h5">Email : <span id="rider_email_view"></span></p>
										
									</div>
									<div class="col-md-6">
										<p class="text-dark text-lg font-weight-bold">ID : <span class="text-danger" id="rider_id_view"></span></p>
										
									</div>
									
								</div>
								<hr/>
							</div>
						</div>


						<div class="card">
							<div class="card-header">
								<h4>Product Information</h4>
								
							</div>
							<div class="card-body">
								<table class="table table-sm table-bordered table-striped projects">
									<thead bgcolor="#80DEEA">
										<tr>
											<td style="width:50px">S.N</td>
											<td>Order ID</td>
											<td>Food Name</td>
											<td>Food Quantity</td>
											<td>Food Price</td>
											<td>Total Price</td>
										</tr>
									</thead>
									<tbody id="OrderTableBody">
										
									</tbody bgcolor="#80DEEA">
									<tr>
										<th colspan="2">Delivery Charge</th>
										<th class="text-primary font-weight-bold"><span id="total_delivery_charge_view">0</span> tk</th>
										<th colspan="2" class="text-end text-danger font-weight-bold text-uppercase">total Price</th>
										<th ><span id="total_amount_view">0</span> tk</th>
									</tr>
									<!-- <tr>
												<th colspan="5" class="text-end text-danger font-weight-bold text-uppercase">total Quantity</th>
												<th ><span id="total_quantity_view">0</span></th>
									</tr> -->
									<tfoot >
									
									</tfoot>
									
								</table>
							</div>
							
						</div>



						<div class="card" id="full_details_extra_item">
							<div class="card-header">
								<h4>Product Extra Item</h4>
								
							</div>
							<div class="card-body">
								<table class="table table-sm table-bordered table-striped projects ">
									<thead bgcolor="#80DEEA">
										<tr>
											<td style="width:50px">S.N</td>
											<td>ID</td>
											<td>Name</td>
											<td>Food Name</td>
											<!-- <td>Order ID</td> -->
											<td>Food Quantity</td>
											<td>Food Price</td>
											<td>Total Price</td>
										</tr>
									</thead>
									<tbody id="OrderTableBodyExtraItem"> 
										
									</tbody bgcolor="#80DEEA">
									
									
									<tfoot >
									
									</tfoot>
									
								</table>
							</div>
							
						</div>



						
					</div>
					
					
				</div>
				
				
				
				
				
				<div class="modal-footer">
					<button type="submit" id="order_update_submit_button" class="btn btn-primary">Change Order Status</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					
					
				</div>
				
				<!-- </div> -->
				
			</form>
		</div>
	</div>
</div>