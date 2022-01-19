@extends('layout.app')
@section('content')
<head>
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/-->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
@if ($message = Session::get('success'))
        <div id="not" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
		<script>
		setTimeout(function() {
    $('#not').fadeOut('fast');
}, 3000); //
		</script>
    @endif
  
    <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>
                    @if($d==1) Deleted @endif Users
                    </h2>
                    @if($d==0)<a href="users/create" class="btn">Add new User</a>@endif
                </div>
                <table id="l" class="table table-bordered table-condensed table-striped">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <!--td>Role</td-->
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                @if($d==0)
                <div>
                    <a href="/deleted-users" class="btn">View Deleted Users</a>
                </div>
                @else
                <div>
                    <a href="/users" class="btn">Back</a>
                </div>
                @endif
            </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" ></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" Defer></script>

<script type="text/javascript">

let users = document.querySelectorAll('.navigation li:nth-child(5)')[0];
users.classList.add('hovered');
    if(<?= $d ?>==0){
        urli = "{{ url('users-list') }}";
    }
    else{
        urli = "{{ url('dusers-list') }}";
    }
  $(function () {
    
    var table = $('#l').DataTable({
      processing: true,
      serverSide: true,
      retrieve: true,
      aasorting: [[0,"desc"]],
        ajax: {
            url: urli,
          
		},
        columns: [
           
            {data:'username', sortable:true, searchable:true},
			      {data:'email', sortable:true, searchable:true},
			     // {data:'role'},
		
				    {data:'action', sortable:true, searchable:true},
        ]
    });
    
  });
</script>
@stop

