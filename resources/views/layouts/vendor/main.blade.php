<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
     integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>
        @yield('title')
    </title>
    <style>

        nav {
            width: 20vw;
            height: 200px
            border: 2px solid red;
        }
        .nav-link {
            font-size: 20px;
            padding: 5px;
        }
        .nav-link a {
            text-decoration: none;
            padding: 5px;
            margin: 5px;
        }
        main{
            width: 80vw;
            padding: 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/vendors/dashboard">Vendor Dashboard</a>
        </nav>
      </div>      
    <div class="container-fluid d-flex">
        <nav>
            <div class="nav-link">
                <a href="/vendor/dashboard">Dashboard</a>
            </div>
            <div class="nav-link">
                <a href="/vendor/products">Products</a>
            </div>
            <div class="nav-link">
                <a href="/vendor/categories">Categories</a>
                
            </div>
            <div class="nav-link">
                <a href="/vendor/coupons">Coupons</a>
                
            </div>
            <div class="nav-link">
                <a href="/vendor/orders">Orders</a>
                
            </div>
            <div class="nav-link">
                <a href="/logout"> Logout</a>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @stack('head')
    @include('sweetalert::alert')
</body>
</html>