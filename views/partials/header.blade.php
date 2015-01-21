<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title or "Blog laravel"}}</title>
        <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('dist/css/mystyle.css')}}" />
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

                            @section('nav')
                            @foreach($categories  as $cat)
                            <li><span class="glyphicon"></span><a href="{{url('category/'.$cat->slug.'/'.$cat->id)}}"/>{{$cat->title}}</a></li>
                            @endforeach
                            @show
                             <li> <a href="{{url('/blog')}}""><span class="glyphicon glyphicon-book"></span>Blog</a></li>
                             <li> <a href="{{url('/contact')}}""><span class="glyphicon glyphicon-inbox"></span>Contact</a></li>
                        </ul>

                    </div>
                </nav>
            </div> <!-- row navigation -->
        </div> <!-- container navigation -->
