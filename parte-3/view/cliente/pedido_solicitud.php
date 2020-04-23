<?php require("../../system/client.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- font-awesome-4.7.0 -->
  <link rel="stylesheet" href="<?=$lib?>/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Jquery -->
  <script src="<?=$public?>/js/jquery-3.4.1.min.js"></script>
  <!-- Local Bootstrap 4.4.1 -->
  <link rel="stylesheet" href="<?=$public?>/theme/standar.css">
  <script src="<?=$lib?>/bootstrap-4.4.1_lite/js/popper.min.js"></script>
  <script src="<?=$lib?>/bootstrap-4.4.1_lite/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include("layout/head.php") ?>
  <div class="py-1 text-center bg-lighttext-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-primary" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="alert-heading">Espere por favor</h4>
            <p class="mb-0">Evaluaremos su solicitud (1-3min)</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="p-2 col-lg-6 col-10 mx-auto border" style="">
          <img class="img-fluid d-block mb-2 rounded" src="<?=$public?>/img/logo.jpeg" style="width:60%;margin:auto;">
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-secondary" style="display: none;" id="aceptado_message" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="alert-heading">En hora buena!, su solicitud fue aceptada</h4>
            <p class="mb-0">Puede realizar el seguimiento haciendo <a href="#">CLICK AQUI</a></p>
          </div>
          <div class="alert alert-danger" style="display: none;" id="denegado_message" role="alert" style="">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="alert-heading">Solicitud Denegada</h4>
            <p class="mb-0">Le informamos el siguiente diagnostico:</p>
            <ul class="denegado_obs"></ul>
            <a class="btn btn-warning" href="#">Realizar Corrección de Solicitud</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(window).on("load",function(){

      pedido_verificarEstado();
    })
    function pedido_verificarEstado(){
      he.post("pedido/cliente@pedido_confirmacion_res",{
        iddel: <?=$_GET['iddel']?>
      },function(dt){
        console.log(dt)
        if(dt.del_estado == "0"){
          dt.del_obs = dt.del_obs.split("\n");
          $(".denegado_obs").html("")
          for( i in dt.del_obs ){
            $(".denegado_obs").append("<li>"+dt.del_obs[i]+"</li>")
          }
          $("#denegado_message").show()
        }else if(dt.del_estado == "1"){
          $("#aceptado_message").show()
        }
      },"json")
    }
  </script>
</body>
</html>