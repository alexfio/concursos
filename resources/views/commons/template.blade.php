<html>
    <head>
        <meta charset="utf-8">
        <meta name = 'viewport' content="width=device-width, initial-scale=1">
        <title>@yield('titulo')</title>
        @section('style')

        <link  rel  = "stylesheet" type = "text/css"
               href = "{{url('lib/font-awesome/css/font-awesome.min.css')}}" >

        <link  rel  = "stylesheet" type = "text/css"
               href = "{{url('lib/materialize/dist/css/materialize.min.css')}}" >

        <link  rel  = "stylesheet" type = "text/css"
               href = "{{url('lib/animate.css/animate.min.css')}}" >   

        <link 
            href="https://fonts.googleapis.com/icon?family=Material+Icons" 
            rel="stylesheet">
        
        <link 
            href = "{{url('lib/font-awesome/css/font-awesome.min.css')}}"
            rel="stylesheet">

        <link 
            media ="screen and (max-width:320px)"
            href = "{{url('css/app-width-320.css')}}" 
            rel ="stylesheet">


        @show

    </head>

    <body class = 'animated fadeIn'>
        @include('commons.header') 
        @yield('conteudo')
    </body>

    @section('scripts')
    <script type ='text/javascript' 
    src ="{{url('lib/jquery/dist/jquery.min.js')}}" ></script>
    
    <script type ='text/javascript' 
    src ="{{url('lib/materialize/dist/js/materialize.min.js')}}" ></script>
    
    <script type ='text/javascript' 
    src ="{{url('lib/jquery-mask-plugin/dist/jquery.mask.min.js')}}" ></script>
    
    <script type ='text/javascript' 
    src ="{{url('lib/jquery-smooth-scroll/jquery.smooth-scroll.min.js')}}" ></script>
    
    <script type ='text/javascript' 
    src ="{{url('js/app.js')}}" ></script>
    
    @show
</html>