<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/blog/">

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="container">

    @include('layouts.header')



    @section('main')
        <main role="main" class="container">
            <div class="row">
                @section('row-main')
                    <div class="col-md-8 blog-main">
                            @yield('content')
                    </div><!-- /.blog-main -->
                @show

                @section('sidebar')
                    @include('layouts.sidebar')
                @show

            </div><!-- /.row -->

        </main><!-- /.container -->
    @show



    @include('layouts.footer')

</div>

</body>
</html>
