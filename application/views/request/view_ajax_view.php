<div class="modal fade show" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">View Request</h5>
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
							<label class="control-label col-md-3">Request Date </label>
							<div class="col col-md-9">
								<?php echo $request->request_date; ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Title </label>
							<div class="col col-md-9">
								<?php echo $request->title; ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Description</label>
							<div class="col col-md-9">
								<?php echo $request->details; ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Quntity </label>
							<div class="col col-md-9">
								<?php echo $request->quantity; ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Cost per Unit </label>
							<div class="col col-md-9">
								<?php echo $request->cost_per_unit; ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-3">Total Cost</label>
							<div class="col col-md-9">
								<?php echo $request->total_cost; ?>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->