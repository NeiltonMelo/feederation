<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Escolher persona</title>

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
  
<style type="text/css">
  .login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}

</style>  

  </head>

  <body>
  
<!--navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Feederation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
				      
            <li class="nav-item">
              <a class="nav-link" href="{{url('escolherPersona')}}">Personas</a>
				</li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/main/sair')}}">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <section class="testimonials text-center">
      <div class="container">
        <h2 class="mb-5">Escolha sua persona</h2>
        <div class="row">
         <?php $i = 0; ?>
        	@foreach ($personas as $persona)
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
              <h5>{{$persona->nome}} {{$persona->sobrenome}}</h5>
              <h5>{{$nomes[$i]}}</h5>
             <form method="post" action="/personaEscolhida">
             	{{ csrf_field() }}
             	<input type="hidden" name="persona_id" value="{{ $persona->id }}" />
					<input type="submit" name="home" class="btn btn-primary" value="Escolher" />
				 </form>
            </div>
          </div>
        <?php $i++; ?>
         @endforeach
          
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
              <h5>Adicionar persona</h5>
              <?php $id = Auth::user()->id;?>
				  <form method="post" action="{{url('criarPersona')}}">
				 	 {{ csrf_field() }}
					 <input type="hidden" name="id" value="<?php echo $id;?>" />
					 <input type="submit" name="criarPersona" class="btn btn-primary" value="Criar Persona" />				
				  </form>
            </div>
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
