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
  <div class="py-3" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><img class="img-fluid d-block rounded" src="<?=$public?>/img/moderador.png" style="width:60%;margin:auto;">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td colspan="2" align="center" style="font-weight:bold;">Jose Perez</td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="table-responsive">
                      <table class="table table-hover table-borderless">
                        <tbody>
                          <tr>
                            <td><i class="fa fa-exchange" aria-hidden="true"></i></td>
                            <td>Administración de Solicitudes</td>
                          </tr>
                          <tr>
                            <td><i class="fa fa-users" aria-hidden="true"></i></td>
                            <td>Administración de Usuarios</td>
                          </tr>
                          <tr></tr>
                        </tbody>
                      </table>
                    </div>
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
                <tr></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>