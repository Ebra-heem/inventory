
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://admission.baiust.edu.bd/frontend/icons/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.baiustserver.com/login_pages/admin_page/fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://www.baiustserver.com/login_pages/admin_page/css/owl.carousel.min.css">

    <link rel="stylesheet" href="https://www.baiustserver.com/login_pages/admin_page/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://www.baiustserver.com/login_pages/admin_page/css/style.css">
    <title>FABRIC | VIEW</title>
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url({{ asset('admin/assets/img/banner/bg_1.jpg') }});"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <img src="{{ asset('admin/assets/img/logo.png') }}" alt="no-image" style="margin: 0px 0px 10px 30%; width:30%;">
                        <h3 class="text-center">Login to <strong>Fabric View</strong></h3>
                        <p class="text-center mb-4">Inventory Management Software Solution</p>
                        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group first">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" placeholder="your-email@something.com" id="username" name="email">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
                            </div>
                            <div class="d-flex mb-5 align-items-center">
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div>
                            <input type="submit" value="Log In" class="btn btn-block btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.baiustserver.com/login_pages/admin_page/js/jquery-3.3.1.min.js"></script>
    <script src="https://www.baiustserver.com/login_pages/admin_page/js/popper.min.js"></script>
    <script src="https://www.baiustserver.com/login_pages/admin_page/js/bootstrap.min.js"></script>
    <script src="https://www.baiustserver.com/login_pages/admin_page/js/main.js"></script>
</body>

</html>