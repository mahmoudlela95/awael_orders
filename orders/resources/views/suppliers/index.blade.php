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
                        Users
                    </h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table id="l">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" ></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" Defer></script>

<script type="text/javascript">

let users = document.querySelectorAll('.navigation li:nth-child(5)')[0];
users.classList.add('hovered');
  $(function () {
    
    var table = $('#l').DataTable({
      
        ajax: {
          url: "{{ url('users-list') }}",
		  
		},
        columns: [
           
            {data:'name'},
			      {data:'email'},
			      {data:'role'},
		
				    {data:'action'},
        ]
    });
    
  });
</script>
@stop

