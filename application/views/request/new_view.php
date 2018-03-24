<div class="animated">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">New Request</strong>
				</div>
				<div class="card-body">
					<form action="#" id="requestForm" class="form-horizontal">
						<input type="hidden" value="" name="id"/>
						<div class="form-body">
							<div class="row form-group">
								<label class="control-label col-md-3">Request Date *</label>
								<div class="col col-md-9">
									<input name="request_date" placeholder="Request Date" class="form-control datepicker required" type="text" value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>
							<div class="row form-group">
								<label class="control-label col-md-3">Title *</label>
								<div class="col col-md-9">
									<input name="title" placeholder="Title" class="form-control required" type="text">
								</div>
							</div>
							<div class="row form-group">
								<label class="control-label col-md-3">Description</label>
								<div class="col col-md-9">
									<textarea name="details" placeholder="Description" class="form-control"></textarea>
								</div>
							</div>
							<div class="row form-group">
								<label class="control-label col-md-3">Quntity *</label>
								<div class="col col-md-9">
									<input name="quantity" placeholder="Quantity" class="form-control required" type="number" onchange="update_total_price()">
								</div>
							</div>
							<div class="row form-group">
								<label class="control-label col-md-3">Cost per Unit *</label>
								<div class="col col-md-9">
									<input name="cost_per_unit" placeholder="Cost per Unit required" class="form-control" type="number" onchange="update_total_price()">
								</div>
							</div>
							<div class="row form-group">
								<label class="control-label col-md-3">Total Cost</label>
								<div class="col col-md-9">
									<input name="total_cost" placeholder="0" class="form-control" type="number" disabled>
								</div>
							</div>
						</div>
					</form>
					<button class="btn btn-success pull-right" onclick="add_request()" ><i class="glyphicon glyphicon-plus"></i>Add Request</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Drafted Requests</strong>
				</div>
				<div class="card-body">
					<button class="btn btn-success pull-right" onclick="add_user()" ><i class="glyphicon glyphicon-plus"></i>Submit All Request</button>
					<br />
					<br />
					<table id="users-list" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="width: 120px;">Request Date</th>
								<th>Item</th>
								<th>Details</th>
								<th>Quantity</th>
								<th>Unit Cost</th>
								<th>Total Cost</th>
								<th>Status</th>
								<th style="width: 160px;">Actions</th>
							</tr>
						</thead>
						<tbody>
	        				<?php foreach($drafted_requests as $request){?>
					     		<tr>
									<td><?php echo $request->request_date;?></td>
									<td><?php echo $request->title;?></td>
									<td><?php echo $request->details;?></td>
									<td><?php echo $request->quantity;?></td>
									<td><?php echo $request->cost_per_unit;?></td>
									<td><?php echo $request->total_cost;?></td>
									<td>Pendding</td>
									<td>
										<button class="btn btn-sm btn-success" title="Submit" onclick="submit_request(<?php echo $request->id;?>)"><i class="fa fa-check-square-o"></i></button>
										<button class="btn btn-sm btn-warning" title="Edit" onclick="edit_request(<?php echo $request->id;?>)"><i class="fa fa-edit"></i></button>
										<button class="btn btn-sm btn-danger" title="Delete" onclick="delete_request(<?php echo $request->id;?>)"><i class="fa fa-trash-o"></i></button>
									</td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function add_request() {
		formEl = $('#requestForm');
		
		if(validate_form($(formEl))) {
			$('.page-loader').show();
			var formDate = $(formEl).serialize();
			$.ajax({
				url : '<?php echo site_url('/request/create')?>',
				type: "POST",
				data: formDate,
				dataType: "JSON",
				success: function(data)
				{
					$('.page-loader').hide();
					location.reload();// for reload a page
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					$('.page-loader').hide();
					alert('Error adding data');
				}
			});
		} else {
			//alert("Please enter the requred fields.");
		}
	}

	function submit_request(requestId) {		
		$('.page-loader').show();
		$.ajax({
			url : '<?php echo site_url('/request/submit')?>/'+ requestId,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('.page-loader').hide();
				location.reload();// for reload a page
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				$('.page-loader').hide();
				alert('Error in Request Submission.');
			}
		});
	}

	function edit_request(requestId) {		
		$('.page-loader').show();
		$.ajax({
			url : '<?php echo site_url('/request/edit_unsubmitted_ajax')?>/'+ requestId,
			type: "GET",
			success: function(data)
			{
				$('.page-loader').hide();
				$('.modal-container').empty();
				$('.modal-container').html(data);
				$('.modal', '.modal-container').modal('show');
				//location.reload();// for reload a page
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				$('.page-loader').hide();
				alert('Error in Request Submission.');
			}
		});
	}

	function delete_request(requestId) {		
		$('.page-loader').show();
		$.ajax({
			url : '<?php echo site_url('/request/delete')?>/'+ requestId,
			type: "GET",
			success: function(data)
			{
				location.reload();// for reload a page
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				$('.page-loader').hide();
				alert('Error in Request Submission.');
			}
		});
	}

	function update_total_price() {
		var quantity = $('input[name="quantity"]', '#requestForm').val();
		var cost_per_unit = $('input[name="cost_per_unit"]', '#requestForm').val();
		var total = quantity * cost_per_unit;
		if(total >0)
			$('input[name="total_cost"]', '#requestForm').val(total);
		else
			$('input[name="total_cost"]', '#requestForm').val(0);
	}
</script>