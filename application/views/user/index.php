<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<div class="animated fadeIn">
    <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Users List</strong>
            </div>
            <div class="card-body">
      <table id="users-list" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>$320,800</td>
          </tr>
        </tbody>
      </table>
            </div>
        </div>
    </div>


    </div>
</div>
<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#users-list').DataTable();
	} );
</script>