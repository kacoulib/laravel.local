@include('partials.header')

<div class="container header">
    <div class="row header">
          @if(Session::has('message'))
                    <div class="alert alert-info">{{Session::get('message')}}</div>
                @endif
        @section('header')
        <div class="col-lg-4">
            <img src="{{asset('img/logo.png')}}" class="img-responsive" />
        </div>
        <div class="col-xs-4 col-lg-offset-4">
            <blockquote>
                @if(Session::has('message'))
                    <div class="alert alert-info">{{Session::get('message')}}</div>
                @endif
            </blockquote>
        </div>
        @show
    </div> <!-- row header -->
</div> <!-- container header -->

<div class="container content">
    <div class="row content">
        @yield('content')
        @section('sidevbar')
        <div class="sidebar col-lg-4">
            
        </div>

        @show
    </div> <!-- row content -->
</div> 

@include('partials.footer')