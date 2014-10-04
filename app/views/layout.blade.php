<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="favicon.ico" />
        <title>English Vocabulary</title>
        {{ HTML::style('vendor/foundation-5.4.0/css/foundation.min.css'); }}
        {{ HTML::style('vendor/semantic/packaged/css/semantic.min.css'); }}
        {{ HTML::style('css/app.css'); }}

        {{ HTML::script('vendor/foundation-5.4.0/js/vendor/modernizr.js'); }}
    </head>
    <body>

    @section('navigation')
    <!-- Navigation bar -->
    <div class="contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="#" style="cursor: default;">English Vocabulary</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="left"> <!-- Left Nav Section -->
                <li><a href="{{ URL::to('english/profile') }}">Profil</a></li>
                <li class="has-dropdown">
                    <a href="{{ URL::to('english/learn') }}">Lernen</a>
                    <ul class="dropdown">
                        <li><a href="{{ URL::to('english/learn/list') }}">Liste</a></li>
                        <li><a href="{{ URL::to('english/learn/train') }}">Trainieren</a></li>
                        <li><a href="{{ URL::to('english/learn/practice') }}">Üben</a></li>
                        <li><a href="{{ URL::to('english/learn/test') }}">Probetest</a></li>
                    </ul>
                </li>
                <li><a href="{{ URL::to('english/stats') }}">Statistik</a></li>
                @if(Auth::user() != null && Auth::user()->admin == 1)
                <li><a href="{{ URL::to('english/admin') }}">Admin</a></li>
                @endif
            </ul>
            <ul class="right"> <!-- Right Nav Section -->
                @if(Auth::check())
                    <li><a href="{{ URL::to('logout') }}">Logout ({{ Auth::user()->username }})</a></li>
                @else
                    <li><a href="{{ URL::to('login') }}">Login</a></li>
                @endif
            </ul>


        </section>
    </nav>
    </div>
    @show

    @section('content')


    @show

    {{ HTML::script('vendor/foundation-5.4.0/js/vendor/jquery.js'); }}
    {{ HTML::script('vendor/foundation-5.4.0/js/foundation.min.js'); }}
    {{ HTML::script('vendor/semantic/packaged/javascript/semantic.min.js'); }}
    <script>
        $(document).foundation();

        $(".close.icon").click(function(){
           $(this).parent().hide();
        });

        $('.ui.accordion').accordion();
        $('.ui.dropdown').dropdown();
    </script>
    @section('scripts')

    @show
    </body>

</html>