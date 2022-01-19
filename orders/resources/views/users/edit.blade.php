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
                                    <center> <h2>  Edit User: {{ $user->username }} </h2> </center>
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
                                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Email:</strong>
                                                </td>
                                                <td>
                                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="email"> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Password:</strong>
                                                </td>  
                                                <td>  
                                                    <input type="password" name="password"  class="form-control" placeholder="password"> 
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
                                                    @if($user->finance)
                                                    <input type="checkbox" name="finance"  class="form-control" checked>
                                                    @else
                                                    <input type="checkbox" name="finance"  class="form-control" > 
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Control Users:</strong>
                                                </td>
                                                <td>
                                                    @if($user->users)
                                                    <input type="checkbox" name="users"  class="form-control" checked> 
                                                    @else
                                                    <input type="checkbox" name="users"  class="form-control" > 
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Can Edit:</strong>
                                                </td>  
                                                <td>  
                                                    @if($user->edit)
                                                    <input type="checkbox" name="edit"  class="form-control" checked>
                                                    @else
                                                    <input type="checkbox" name="edit"  class="form-control" > 
                                                    @endif 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Active:</strong>
                                                </td>  
                                                <td>  
                                                    @if($user->edit)
                                                    <input type="checkbox" name="active"  class="form-control" checked> 
                                                    @else
                                                    <input type="checkbox" name="active"  class="form-control" > 
                                                    @endif 
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td>
                                                <button type="submit" class="btn btn-success" event="{{ route('users.index')}}">Submit</button>
                                                </td>
                                                <td><a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a></td>
                                            </tr>
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
                                    @foreach($companies as $company)
                                    <tr>
                                        <td>
                                            <strong>{{$company->company_name}}</strong>
                                        </td>
                                        <td>
                                            @if(in_array($company->company_id,$scoms))
                                            <input type="checkbox" name="company{{ $company->company_id }}"  class="form-control" checked>
                                            @else
                                            <input type="checkbox" name="company{{ $company->company_id }}"  class="form-control">
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
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