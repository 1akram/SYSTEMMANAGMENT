<!DOCTYPE html>
<html>
<head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('pageTitle')</title>
        <!-- css include -->
        <!-- normalize  -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- end normalize  -->
        <!-- fonts  -->
        <link rel="stylesheet" href="css/fonts.css">
        <!-- end fonts  -->
        <!-- bootstrap-grid  -->
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <!-- end bootstrap-grid -->
        <!-- fontawesome-p-5 -->
        <link rel="stylesheet" href="fontawesome-p-5.13/css/all.min.css">
        <!-- fontawesome-p-5  -->
        <!-- main  -->
        <link rel="stylesheet" href="css/main.css">
        <!-- end main  -->
        @yield('customCSS')
        <!-- end css include  -->
</head> 
<body>
    @include('includes.sideBar')
    <!-- main content  -->
    <div id="main-content" class="main-content">
        @yield('content')
    </div>
    <!-- end main content  -->



    <!-- js include  -->
    <!-- jquery  -->
    <script src="js/jQuery/jquery-3.6.0.min.js"></script>
    <!-- end jquery  -->
    <!-- main  -->
    <script src="js/main.js"></script>
    <!-- end main  -->
    @yield('customJS')
    <!-- end js include  -->
</body>

</html>