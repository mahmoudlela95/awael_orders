@extends('layout.app')
@section('content')
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>

</head>
<style>
    .navigation{
        margin-left:-120px;
    }
    .main{
        width:93%;
        left:120px;
    }
</style>
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
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" style="">
                        {{ csrf_field() }}
        <div class="details" style="">
            <div class="recentOrders">
                <div class="row">
                    <div class="col-md-8">
                        <div class="cardHeader" style="padding-left:0;">
                                    <center> <h2>   {{$user->username}} information </h2> </center>
                        </div>
                        <table class="table table-striped">
                                            <thead>
                                                <th style="font-weight:400px;font-size:25px; border-top:none;">
                                                    Credencials
                                                </th>
                                            </thead>
                                                <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Username:</strong>
                                                </td>
                                                <td>
                                                    <strong>{{$user->username}}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Email:</strong>
                                                </td>
                                                <td>
                                                    <strong>{{$user->email}}</strong>
                                                </td>
                                            </tr>
                                            
                                            </tbody>
                                            <thead>
                                                <th style="font-weight:400px;font-size:25px; border-top:none;">
                                                   Rules 
                                                </th>
                                            </thead>
                                                <tbody>

                                            <tr>
                                                <td>
                                                    <strong>See Financial:</strong>
                                                </td>
                                                <td>
                                                    <strong>
                                                        @if($user->finance)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Control Users:</strong>
                                                </td>
                                                <td>
                                                    <strong>
                                                        @if($user->users)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Can Edit:</strong>
                                                </td>  
                                                <td>  
                                                    <strong>
                                                        @if($user->edit)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Active:</strong>
                                                </td>  
                                                <td>  
                                                    <strong>
                                                        @if($user->active)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr></tr>

                                            </tbody>
                        </table>
                    </div>  
                    <div class="col-md-4">
                        <div class="" style="margin-top:12%;">
                            <table class="table table-striped">
                                <thead>
                                    <th style="font-weight:400px;font-size:25px; border-top:none; ">
                                        Companies
                                    </th>
                                </thead>
                                <tbody>
                                    </br>
                                    @if(count($scoms)==0)
                                        <tr>
                                            <td style="text-align:left;">
                                                <strong>No Companies</strong>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($companies as $company)
                                        <tr>
                                            @if(in_array($company->company_id, $scoms))
                                            <td style="text-align:left;">
                                                <strong>{{$company->company_name}}</strong>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
             
</form>
<script>
    let users = document.querySelectorAll('.navigation li:nth-child(5)')[0];
users.classList.add('hovered');
</script>
@endsection  