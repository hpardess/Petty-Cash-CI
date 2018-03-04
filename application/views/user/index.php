<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<div class="animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Users List</strong>
				</div>
				<div class="card-body">
					<button class="btn btn-success" onclick="add_user()" ><i class="glyphicon glyphicon-plus"></i> Add User</button>
					<br />
					<br />
					<table id="users-list" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Full Name</th>
								<th>Email</th>
								<th>Date of Birth</th>
								<th>Phone Number</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
	        				<?php foreach($users as $user){?>
					     		<tr>
									<td><?php echo $user->id;?></td>
									<td><?php echo $user->full_name;?></td>
									<td><?php echo $user->email;?></td>
									<td><?php echo $user->date_of_birth;?></td>
									<td><?php echo $user->phone_number;?></td>
									<td>
										<button class="btn btn-warning" onclick="edit_user(<?php echo $user->id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
										<button class="btn btn-danger" onclick="delete_user(<?php echo $user->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
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
<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Book Form</h3>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal">
					<input type="hidden" value="" name="book_id"/>
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Full Name</label>
							<div class="col-md-9">
								<input name="full_name" placeholder="Full Name" class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-9">
								<input name="email" placeholder="Email ID" class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Date of Birth</label>
							<div class="col-md-9">
								<input name="date_of_birth" placeholder="Date of Birth" class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Phone Number</label>
							<div class="col-md-9">
								<input name="phone_number" placeholder="Phone Number" class="form-control" type="text">
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

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#users-list').DataTable();
	});

	var save_method; //for save method string
	var table;


	function add_user()
	{
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		console.log($('#modal-form'));
		$('#modal-form').modal('show'); // show bootstrap modal
		//$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
	}

	function edit_user(id)
	{
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals

		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo site_url('/user/edit_ajax/')?>" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="id"]').val(data.id);
				$('[name="full_name"]').val(data.full_name);
				$('[name="email"]').val(data.email);
				$('[name="date_of_birth"]').val(data.date_of_birth);
				$('[name="phone_number"]').val(data.phone_number);

				$('#modal-form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}


	function save()
	{
		var url;
		if(save_method == 'add')
		{
			url = "<?php echo site_url('/user/add')?>";
		}
		else
		{
			url = "<?php echo site_url('/user/update')?>";
		}

		// ajax adding data to database
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data)
			{
				//if success close modal and reload ajax table
				$('#modal-form').modal('hide');
				location.reload();// for reload a page
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error adding / update data');
			}
		});
	}

	function delete_user(id)
	{
		if(confirm('Are you sure delete this data?'))
		{
			// ajax delete data from database
			$.ajax({
				url : "<?php echo site_url('/user/delete/')?>"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
		}
	}

</script>