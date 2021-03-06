<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="/css/clean-blog.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Share this script -->
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f662647b4de5d0012796f21&product=inline-share-buttons" async="async"></script>

</head>

<body>
<!-- Navigation -->
@include('includes.navbar')

<!-- Page Header -->
@yield('header')

<!-- Main Content -->
@yield('content')

<hr>

<!-- Footer -->
@include('includes.footer')

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/js/clean-blog.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#comment-form").submit(function (e) {
            $("#comment-submit").attr("disabled", true);
            return true;
        });
    });
</script>

</body>

</html>
