<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Achando o melhor cuidado pras suas plantinhas.">

    <title>Plantas!</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="{{ asset("js/alertSystem.js") }}"></script>
    

    <link href="{{ asset("css/main.css") }}" rel="stylesheet">
    <link href="{{ asset("css/template.min.css") }}" rel="stylesheet">

</head>

<body id="page-top">

    @include('layouts.header')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')

    <section class="copyright py-4 text-center text-white">
        <div class="container">
            <small>Cuide de plantinhas :)</small>
        </div>
    </section>


</body>

</html>
