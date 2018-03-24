<div class="modal fade show" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Unsubmittd Request</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body form">
				<form action="#" id="requestForm" class="form-horizontal">
					<input type="hidden" value="" name="id"/>
					<div class="form-body">
						<div class="row form-group">
							<label class="control-label col-md-3">ID </label>
							<div class="col col-md-9">
								<?php echo $request->id; ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Request Date *</label>
							<div class="col col-md-9">
								<input name="request_date" placeholder="Request Date" class="form-control datepicker required" type="text" value="<?php echo $request->request_date; ?>">
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Title *</label>
							<div class="col col-md-9">
								<input name="title" placeholder="Title" class="form-control required" type="text" value="<?php echo $request->title; ?>">
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Description</label>
							<div class="col col-md-9">
								<textarea name="details" placeholder="Description" class="form-control"><?php echo $request->details; ?></textarea>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Quntity *</label>
							<div class="col col-md-9">
								<input name="quantity" placeholder="Quantity" class="form-control required" type="number" onchange="update_total_price()" value="<?php echo $request->quantity; ?>">
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Cost per Unit *</label>
							<div class="col col-md-9">
								<input name="cost_per_unit" placeholder="Cost per Unit required" class="form-control" type="number" onchange="update_total_price()" value="<?php echo $request->cost_per_unit; ?>">
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Total Cost</label>
							<div class="col col-md-9">
								<input name="total_cost" placeholder="0" class="form-control" type="number" disabled value="<?php echo $request->total_cost; ?>">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->