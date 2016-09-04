<!DOCTYPE html>
<html lang="en">

<head>

    @include('partials._header')

</head>    

<body>

    <div id="wrapper">

        @include('partials._topnav')

        @include('partials._sidenav')

        @include('partials._topmenu')

        @yield('content')
            

    </div>
    <!-- /#wrapper -->

    @include('partials._footer')

</body>
</html>