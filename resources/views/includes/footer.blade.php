<footer class="navbar navbar-default footer">
	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Galerie</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li><a href="/">Úvod</a></li>
        @if (Auth::check())
        <li><a href="/home/{{Auth::user()->name}}">Moje galerie</a></li>
        @endif
        <li><a href="/uzivatele">Uživatelé</a></li>
        
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <p class="navbar-text">Přihlášen jako {{ Auth::user()->name }}</p>
          <li><a href="/odhlasit">Odhlásit</a></li>

        @else
          <li><a href="/prihlasit">Přihlásit</a></li>
          <li><a href="/registrovat">Registrovat</a></li>

        @endif
        
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</footer>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- <script src="https://fb.me/react-with-addons-0.13.3.js"></script> -->
<!-- <script src="/js/react-with-addons.min.js"></script> -->


<script type="text/javascript">
	$(function() {
		$('.alert').delay('3000').slideUp('250');

	});
</script>