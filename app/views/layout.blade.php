<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="favicon.ico"/>
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
                <h1>
                    @section('title_link')
                    <a href="/">Afochois</a>
                    @show
                </h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="left"> <!-- Left Nav Section -->
                @yield('menu')

            </ul>
            <ul class="right"> <!-- Right Nav Section -->
                <li class="has-dropdown">
                    <a href="{{ URL::to('/') }}">Anfochois</a>
                    <ul class="dropdown">
                        <li><a href="{{ URL::to('english') }}">English</a></li>
                        <li><a href="http://drive.google.com/folderview?id=0B54l2O_fJff4MWltUHc0bWIyS1E&usp=sharing" target="_blank">Google Docs</a></li>
                        <li><a href="https://euterpe.webuntis.com/WebUntis/?school=htl-perg#main" target="_blank">Webuntis</a></li>
                    </ul>
                </li>
                @if(Auth::check())
                <li><a href="{{ URL::to('user/profile') }}">{{ Auth::user()->username }}</a></li>
                <li><a href="{{ URL::to('user/logout') }}">Logout</a></li>
                @else
                <li><a href="{{ URL::to('user/login') }}">Login</a></li>
                @endif
            </ul>


        </section>
    </nav>
</div>
@show

@yield('content')

{{ HTML::script('vendor/foundation-5.4.0/js/vendor/jquery.js'); }}
{{ HTML::script('vendor/foundation-5.4.0/js/foundation.min.js'); }}
{{ HTML::script('vendor/semantic/packaged/javascript/semantic.min.js'); }}
<script>
    $(document).foundation();

    $(".close.icon").click(function () {
        $(this).parent().hide();
    });

    $('.ui.accordion').accordion();
    $('.ui.dropdown').dropdown();
</script>
@yield('scripts')
</body>

</html>