<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home - Feederation</title>

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
<!-- Custom styles for this template -->

   
<style type="text/css">
body {
  padding-top: 54px;
  background-image: url('img/bg-masthead.jpg');
  background-size: cover;
}

@media (min-width: 992px) {
  body {
    padding-top: 86px;
  }
}
</style>

<script type="text/javascript" >
 function($) {
    'use strict';


    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);
</script>

  </head>

  <body>
	 @if(isset(Auth::user()->email))
    <!-- Navigation -->
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
              <a class="nav-link" href="/home">Perfil</a>
            </li>         
            <li class="nav-item">
              <a class="nav-link" href="{{url('escolherPersona')}}">Personas</a>
				</li>
            <li class="nav-item">
              <a class="nav-link" href="#">Amigos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/main/sair')}}">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			
			
			<div class="card my-4">
            <h5 class="card-header">O que você está pensando?</h5>
            <div class="card-body">
            <div class="form-group">
            	<label for="exampleInputEmail1">Titulo</label>
    				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="tituloPost" placeholder="Titulo da publicação..." required>
            </div>
					<div class="form-group">
    					<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  				</div>
  				
  				
  				
  				
  				<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Anexar imagem</button>
<button class="btn btn-primary" type="button">Publicar</button>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anexe uma imagem...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<img src="img/modal_imagem.png" class="rounded mx-auto d-block" alt="...">      
      
      </div>
      <div class="modal-footer">
          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="files[]" id="js-upload-files" multiple>
              </div>
              <button type="submit" class="btn btn-primary" id="js-upload-submit">Enviar</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
  				
  				
  	
  	
  	
  	
  	
  	
  	
  	
  				
  				
  				
  				
  				
  				
  				
  				
				</div>	
			</div>

          <!-- Blog Post -->
          @foreach ($posts as $post)
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>
			 @endforeach
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

         

        </div>

        <!-- Sidebar Widgets Column -->
	       
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">					<!-- GL HF   -->
            <h5 class="card-header">GL HF</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <label>Logado como:</label> {{Auth::user()->nome_persona }} {{$sobrenomePersona}}
                  </ul>
                </div>
               </div>
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <label>Você está jogando:</label> {{$personaGameNome}} 
                  </ul>
                </div>
              </div>
            </div>
          </div>
			<div class="card my-4">						<!-- Guilda  -->
            <h5 class="card-header">Guilda: {{$nomeGuilda}}</h5>
            <div class="card-body">
              @if ($temGuilda == TRUE)
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <label>Membros da Guilda:</label>
                  @foreach ($membrosGuilda as $nome)
                  {{$nome}}<br>
                  @endforeach
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <form method="post" action="/sairGuilda">
						{{ csrf_field() }}
						<input type="submit" name="criarPersona" class="btn btn-lite" value="Sair Guilda" />				
						</form>
                  </ul>
                </div>
              </div>
              @else																<!-- Sem Guilda -->
              <div class="row">												<!-- Criar Guilda -->
              	<div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <form method="post" action="/criarGuilda">
						{{ csrf_field() }}
						<input type="submit" name="criarPersona" class="btn btn-lite" value="Criar Guilda" />				
						</form>
                  </ul>
                </div>
              </div>
              <div class="row">
              	<div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <form method="post" action="/procurarGuilda">
						{{ csrf_field() }}
						<input type="submit" name="criarPersona" class="btn btn-lite" value="Procurar Guilda" />				
						</form>
                  </ul>
                </div>
              </div>
				  @endif            
            </div>
          </div>
          <div class="card my-4">					<!-- Solicitações -->
            <h5 class="card-header">Pedidos</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <form method="post" action="solicitacoes" class="form-inline my-2 my-lg-0">
			      		<input type="submit" name="login" class="btn btn-primary my-2 my-sm-0" value="Amizades" />
   	 				</form>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  </ul>
                </div>
              </div>
            </div>
          </div>
			<div class="card my-4">					<!-- Adicionar um Amigo -->
            <h5 class="card-header">Adicionar um Amigo</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  <form method="post" action="{{ url('/procurarAmigo') }}" class="form-inline my-2 my-lg-0">
  							{{ csrf_field() }}
      					<input class="form-control mr-sm-2" type="text" name="nome" placeholder="Digite o nome" aria-label="Search">
      					<input type="submit" name="login" class="btn btn-primary my-2 my-sm-0" value="Procurar" />
   					 </form>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->




    <!-- Footer-->
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
	 @else
		<script>
			window.location="/main";
		</script>
	 @endif
  </body>

</html>