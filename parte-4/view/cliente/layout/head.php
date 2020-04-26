<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container"> <a class="navbar-brand text-primary " href="<?=sess('user_dir')?>">
        <img src="<?=$banner_logo?>" style="width:50px;">
        <b class="text-body"> <?=$banner_name?></b>
      </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar5">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar5" >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="pedido_historial.php">Mis pedidos</a> </li>
        </ul> 
        <a href="<?=$he->con('usuario/acceso@close_session')?>" class="btn btn-outline-danger navbar-btn ml-md-2">Cerrar Sesión</a>
      </div>
    </div>
  </nav>