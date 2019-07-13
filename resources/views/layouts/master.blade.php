<html>
    <head>
        <title>My Site | @yield('title', 'Home Page')</title>
        <link rel="stylesheet" media="all" href="<?= asset('css/staff.css')?>" type="text/css" />
    </head>
    <body>
        @yield('header', 'Home Page')
        <navigation>
            <ul>
              <li><a href="<?= route('home.index');?>">Menu</a></li>
            </ul>
        </navigation>
        <div class="container">
            @yield('content')
        </div>

        <footer>
          &copy; <?= date('Y')?> BPR
        </footer>
    </body>
</html>