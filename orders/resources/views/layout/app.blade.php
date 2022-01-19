<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="/">
                        <span class="icon"><ion-icon name="earth-outline"></ion-icon></span>
                        <span class="title">Orders Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/home">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="/orders">
                        <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="/suppliers">
                        <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                        <span class="title">Suppliers</span>
                    </a>
                </li>
                <li>
                    <a href="/users">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Users</span>
                    </a>
                </li>
                
                
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <label for="">
                        <ion-icon name="search-outline" ></ion-icon>
                        <input type="text" name="" id="" placeholder="Search here" style=""> 
                        
                    </label>
                </div>
                <div class="user">
                    <img src="deafult.png" alt="" style="height:40px">
                </div>
            </div>
            @yield('content')
            

        </div>

    </div>


    <script type="module"src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
        <script>

            //
            
        </script>
</body>
</html>