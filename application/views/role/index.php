<div class="animated">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Roles List</strong>
				</div>
				<div class="card-body">
					<button class="btn btn-success pull-right" onclick="add_role()" ><i class="glyphicon glyphicon-plus"></i> Add Role</button>
					<br />
					<br />
					<table id="roles-list" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Role</th>
								<th>Permissions</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
	        				<?php foreach($roles as $role){?>
					     		<tr>
									<td><?php echo $role->id;?></td>
									<td><?php echo $role->name;?></td>
									<td><?php echo $role->permissions;?></td>
									<td>
										<button class="btn btn-warning" onclick="edit_role(<?php echo $role->id;?>)"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger" onclick="delete_role(<?php echo $role->id;?>)"><i class="fa fa-trash-o"></i></button>
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

<!-- Bootstrap modal -->
<div class="modal fade show" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Role Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal">
					<input type="hidden" value="" name="id"/>
					<div class="form-body">
						<div class="row form-group">
							<label class="control-label col-md-3">Role</label>
							<div class="col col-md-9">
								<input name="name" placeholder="Role Title" class="form-control" type="text">
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
<!-- End Bootstrap modal -->