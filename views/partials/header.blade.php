<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title or "Blog laravel"}}</title>
        <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('dist/css/mystyle.css')}}" />
        <script src="{{asset('dist/js/jquery-2.0.3.min.js')}}"></script>
    </head>
    <body>
        <div class="container navigation">
            <div class="row navigation">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-bookmark"></span> <a href="{{url('/')}}"">Home</a></li>
                    </ol>

                    <div class="navbar-collapse collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li> <a href="{{url('/')}}""><span class="glyphicon glyphicon-home"></span>Home</a></li>
                            <li> <a href="{{url('/login')}}""><span class="glyphicon glyphicon-user"></span>Login</a></li>

                            @section('nav')
                                @if(Request::is('admin/*'))
                                    <li> <a href="{{url('/logout')}}""><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                                @endif
                                @if(!empty($categories))
                                    @foreach($categories  as $cat)
                                    <li><span class="glyphicon"></span><a href="{{url('category/'.$cat->slug.'/'.$cat->id)}}"/>{{$cat->title}}</a></li>
                                    @endforeach
                                @endif
                            @show
                            <li> <a href="{{url('/blog')}}""><span class="glyphicon glyphicon-book"></span>Blog</a></li>
                            <li> <a href="{{url('/contact')}}""><span class="glyphicon glyphicon-inbox"></span>Contact</a></li>
                        </ul>

                    </div>
                </nav>
            </div> <!-- row navigation -->
        </div> <!-- container navigation -->
