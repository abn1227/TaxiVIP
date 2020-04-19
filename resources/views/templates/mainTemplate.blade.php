<!doctype html>
<html lang="es">
    <head>
        @yield('head')
        {{--  Required meta tags  --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSS  --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/semantic.css') }}">

        {{--  Scripts  --}}
        <script src="https://code.jquery.com/jquery-3.4.1.min.js">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="{{ asset('js/semantic.js') }}"></script>
        @yield('scripts')

        <title>@yield('title')</title>
    </head>
    <body>

        <div class="container p-4">
            @yield('body')
        </div>


        @yield('executionScripts')

    </body>
    {{--<footer class="mb-0">
        <p class="text-muted">Taxis VIP &copy; 2020, JAEM Dev</p>
    </footer>--}}
</html>
