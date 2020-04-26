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
  <link rel="stylesheet" href="<?=$theme_src?>">
  <script src="<?=$lib?>/bootstrap-4.4.1_lite/js/popper.min.js"></script>
  <script src="<?=$lib?>/bootstrap-4.4.1_lite/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include("layout/head.php") ?>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><img class="img-fluid d-block rounded-circle" src="<?=$public?>/img/personaje/moustro-1.jpg" style="width:60%;margin:auto;">
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <tbody>
                <tr>
                  <td colspan="2" align="center" style="font-weight:bold;">Luis Torres Carpio</td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <ul class="nav  justify-content-center">
                      <li class="nav-item"> <a href="pedido_nuevo.php" class="nav-link" title="Hacer un pedido"><i class="d-block fa fa-2x fa-podcast"></i></a> </li>
                      <li class="nav-item"> <a href="pedido_historial.php" class="nav-link" title="Historial de Pedidos"><i class="d-block fa fa-2x fa-bars"></i></a> </li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Celular</th>
                  <td>+51935422777</td>
                </tr>
                <tr>
                  <th scope="row">Correo</th>
                  <td>luis.torres.carpio1@gmail.com</td>
                </tr>
                <tr>
                  <th scope="row">Facebook</th>
                  <td>fb.com/luitorc</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    
  </script>
</body>
</html>