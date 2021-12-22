@extends('layouts.app')
@section('content')
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="muted">Job Card Details</h2>
		</div>
				
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-9">
				<div class="col-md-3">
				  <input type="text" class="form-control" name="mobile_no" id="mobile_no"  placeholder="mobile no">
				</div>
				<div class="col-md-3">
				  <input type="text" class="form-control" name="vin" id="vin"  placeholder="VIN">
				</div>
				<div class="col-md-3">
					<button type="button" name="filter" id="filter" class="btn btn-info">search</button>
					<button type="button" name="reset" id="reset" class="btn btn-info">Reset</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading text-right">
			<a href="{{ url('/admin/create') }}" title="Add New">
				<button type="button" class="btn btn-primary btn-sm">
				<i class="fa fa-plus"></i> Add New</button>
			</a>
		</div>
		<div class="panel-body">
		<table id="customer_data" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Sr No</th>
					<th>Owner Name</th>
					<th>Owner Telephone</th>
					<th>VIN</th>
					<th>In Time </th>
					<th>Created At</th>
					<th>Actions</th>
				</tr>
			</thead>
		</table>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	fill_datatable();
	function fill_datatable(mobile_no = '',vin = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
			pageLength: 10,
			//lengthMenu: [[1, 2, 5, 10, 20], [1, 2, 5, 10, 20]],
			searching: false,
			order: [[ 5, "desc" ]],
			ajax:{
                url: "{{ route('getjob') }}",
                data:{mobile_no:mobile_no,vin:vin}
            },
             columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false},
            {data: 'owner_name', name: 'owner_name'},
            {data: 'owner_phone', name: 'owner_phone'},
            {data: 'vin', name: 'vin'},
            {data: 'in_time', name: 'in_time'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        });
    }

    $('#filter').click(function(){
        var mobile_no = $('#mobile_no').val();
        var vin = $('#vin').val();
        if(mobile_no != '' || vin != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(mobile_no,vin);
        }
        else
        {
            alert('Please enter a search term in the search box');
        }
    });

    $('#reset').click(function(){
        $('#mobile_no').val('');
        $('#vin').val('');
        $('#customer_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>		
@endsection 