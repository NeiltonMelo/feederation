<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset ('css/landing-page.min.css') }}" rel="stylesheet">
	 <link href="{{ URL::asset ('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	 <link href="{{ URL::asset ('vendor/bootstrap/js/bootstrap.js') }}" rel="stylesheet">
  </head>
  <body>
  
  
			

<!-- Navigation -->

  <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
      <a class="navbar-brand" href="#">Feederation</a>
      	@if(isset(Auth::user()->email))
				@if(Auth::user()->administrador)		
					<script>
						window.location="/main/loginEfetuadoAdmin";
					</script>
				@else
					<script>
						window.location="/home";
					</script>
				@endif
			@endif
			
			@if ($mensagem = Session::get('error'))
				<div class="alert alert-danger alert-block">	
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>{{$mensagem}}</strong>
				</div>
			@endif			
			
			@if(count($errors) >0)
			
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
        
  		  <form method="post" action="{{ url('/checarLogin') }}" class="form-inline my-2 my-lg-0">
  			{{ csrf_field() }}
      	<input class="form-control mr-sm-2" type="email" name="email" placeholder="E-mail" aria-label="Search">
      	<input class="form-control mr-sm-2" type="password" name="password" placeholder="Senha" aria-label="Search">
      	<input type="submit" name="login" class="btn btn-primary my-2 my-sm-0" value="Entrar" />
   	 </form>
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Feederation</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form method="post" action="{{ url('/checarEmail') }}">
              {{ csrf_field() }}
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Digite seu e-mail">
                </div>
                <div class="col-12 col-md-3">
                  <input type="submit" name="cadastrar" class="btn btn-block btn-lg btn-primary" value="Cadastre-se!" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
              </div>
              <h3>Cradastre-se</h3>
             
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
              </div>
              <h3>Crie suas personas</h3>
              
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
              <h3>Divirta-se</h3>
          
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Crie sua persona</h2>
            <p class="lead mb-0">Entre como seu personagem favorito e imerga-se em um ambiente de roleplay!</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Junte-se a uma guilda</h2>
            <p class="lead mb-0">Crie uma pagina para reunir os membros da sua guilda, ou junte-se a uma já existente!</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Encontre amigos!</h2>
            <p class="lead mb-0">Encontre amigos, faça publicações e muito mais!</p>
          </div>
        </div>
      </div>
    </section>

    
    <section class="testimonials text-center bg-light">
    
    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Descubra muito mais! Cadastre-se agora!</h2>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form method="post" action="{{ url('/checarEmail') }}">
              {{ csrf_field() }}
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Digite seu e-mail">
                </div>
                <div class="col-12 col-md-3">
                  <input type="submit" name="cadastrar" class="btn btn-block btn-lg btn-primary" value="Cadastre-se!" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
