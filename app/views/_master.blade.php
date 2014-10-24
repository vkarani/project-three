<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'My Web Site')</title>

    <meta charset='utf-8'>
    <link rel='stylesheet' href='/css/p3.css' type='text/css'>

    @yield('head')

</head>
<body>
  <div class="container">

    @yield('content')

    <!--    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' type='text/javascript'></script>   -->

    @yield('footer')
    <br><br><br>
    <footer class="footer">
    Victor Karani Project 3
    </footer>
  </div>
</body>
</html>
