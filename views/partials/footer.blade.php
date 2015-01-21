<div class="container footer text-right">
    <div class="row footer">
        @section('footer')
        <ul class="list-inline">
            <li><a href="{{url('mentions-legales.html')}}"><span class="glyphicon glyphicon-chevron-down"></span> Mentions légales</a></li>
            <li><a href="{{url('about.html')}}"><span class="glyphicon glyphicon-thumbs-up"></span> Partenaires</a></li>
            <li><a href="{{url('offers.html')}}"><span class="glyphicon glyphicon-copyright-mark"></span> Conditions générales</a></li>
            <li><a href="{{url('blog.html')}}"><span class="glyphicon glyphicon-euro"></span> Paiement en ligne</a></li>
        </ul>
        @show
    </div> <!-- row footer -->
</div> <!-- container footer -->

<script type="text/javascript" src="asset{{asset('dist/js/jquery-2.0.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/bootstrap.js')}}"></script>
</body>
</html>