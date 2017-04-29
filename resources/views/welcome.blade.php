<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TabligCuet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!--SLideShow-->
    <link rel="stylesheet" href="{{asset('nivo-slider/themes/default/default.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('nivo-slider/themes/light/light.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('nivo-slider/themes/dark/dark.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('nivo-slider/themes/bar/bar.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('nivo-slider/nivo-slider.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('nivo-slider/demo/style.css')}}" type="text/css" media="screen" />
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Welcome to ritual world
                </div>
                <div id="wrapper">
                    <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider"> 
                        <img src="{{asset('images/cuet/test1.jpg')}}" data-thumb="{{asset('images/cuet/test1.jpg')}}" alt="" /> <a href="zahidofficial.comeze.com">
                        <img src="{{asset('images/cuet/test2.jpg')}}" data-thumb="{{asset('images/cuet/test2.jpg')}}" alt="" title="our cuet" /></a> 
                        <img src="{{asset('images/cuet/test3.jpg')}}" data-thumb="{{asset('images/cuet/test3.jpg')}}" alt="" data-transition="slideInLeft" /> 
                        <img src="{{asset('images/cuet/test4.jpg')}}" data-thumb="{{asset('images/cuet/test4.jpg')}}" alt="" title="#htmlcaption" /> 

                        <img src="{{asset('images/cuet/test5.jpg')}}" data-thumb="{{asset('images/cuet/test5.jpg')}}" alt="" /> <a href="zahidofficial.comeze.com">
                        <img src="{{asset('images/cuet/test6.jpg')}}" data-thumb="{{asset('images/cuet/test6.jpg')}}" alt="" title="our cuet" /></a> 
                        <img src="{{asset('images/cuet/44.jpg')}}" data-thumb="{{asset('images/cuet/44.jpg')}}" alt="" data-transition="slideInLeft" /> 
                        <img src="{{asset('images/cuet/88.jpg')}}" data-thumb="{{asset('images/cuet/88.jpg')}}" alt="" title="#htmlcaption" /> </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{asset('nivo-slider/jquery.nivo.slider.js')}}"></script> 

<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
