<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- FontAwesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Styles -->
        {{-- <link rel="stylesheet" href='https://urchin-app-g2rsa.ondigitalocean.app/css/app.css'> --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- DataTable CSS --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        {{-- DataTable CSS Local --}}
        {{-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> --}}

        <!-- Scripts -->
        @routes
        {{-- <script src='https://urchin-app-g2rsa.ondigitalocean.app/js/app.js' defer></script> --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
        @env ('local')
            {{-- <script src="http://localhost:8080/js/bundle.js"></script> --}}
            <script src="https://urchin-app-g2rsa.ondigitalocean.app/js/bundle.js"></script>
        @endenv
        {{-- jQuery CDN --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        {{-- jQuery Local --}}
        {{-- <script src="js/jquery-3.6.0.min.js"></script> --}}
        {{-- DataTable CDN --}}
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        {{-- DataTable Local --}}
        {{-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}
        {{-- SweeAlert2 CDN --}}
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    </body>
</html>
