<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>Page not found </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('main/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary bg-img"
    style="background-image: url({{ asset('images/auth-bg/bg-4.jpg') }})">

    <section class="error-page h-p100">
        <div class="container h-p100">
            <div class="row h-p100 align-items-center justify-content-center text-center">
                <div class="col-lg-7 col-md-10 col-12">
                    <div class="rounded10 p-50">
                        <img src="{{ asset('images/auth-bg/404.jpg') }}" class="max-w-200" alt="" />
                        <h1>Page Not Found !</h1>
                        <h3>looks like, page doesn't exist</h3>
                        <div class="my-30"><a href="{{ route('home') }}" class="btn btn-danger">Back to dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Vendor JS -->
    <script src="{{ asset('main/js/vendors.min.js') }}"></script>
    <script src="{{ asset('main/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>


</body>

</html>
