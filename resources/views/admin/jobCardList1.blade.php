@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-9"><h2>Job Card <b>Details</b></h2></div>
    <input type="text" name="vehicle_no" class="form-control searchVno" placeholder="Search for vehicle no Only...">
    <br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>owner name</th>
                <th>owner mobile</th>
                <th>vehicle No</th>
				<th>In Time </th>
				<th>Out Time </th>
				<th>Created At</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
  
</body>
  
<script type="text/javascript">
  $(function () {
   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('getjob') }}",
          data: function (d) {
                d.vehicle_no  = $('.searchVno').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false},
            {data: 'owner_name', name: 'owner_name'},
            {data: 'owner_mobile', name: 'owner_mobile'},
            {data: 'vehicle_no', name: 'vehicle_no'},
            {data: 'in_time', name: 'in_time'},
            {data: 'out_time', name: 'out_time'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $(".searchVno").keyup(function(){
        table.draw();
    });
  
  });
</script>
@endsection 