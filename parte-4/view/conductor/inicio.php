<?php require("../../system/client.php"); ?>
<?php
	
?>

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
        <div class="col-md-12" ><img class="img-fluid d-block rounded" src="<?=$public?>/img/conductor.jpg" style="width:60%;margin:auto;">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td colspan="2" align="center" style="font-weight:bold;">
                  	<?=sess("user")['us_fullname']?></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="table-responsive">
                      <table class="table table-hover table-borderless">
                        <tbody>
                          <tr onclick="window.location.href='solicitudes.php' " style="cursor:pointer;">
                            <td><i class="fa fa-exchange" aria-hidden="true"></i></td>
                            <td>Solicitudes de Envio</td>
                          </tr>
                          <tr>
                            <td><i class="fa fa-users" aria-hidden="true"></i></td>
                            <td>Mis calificaciones</td>
                          </tr>
                          <tr></tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Celular</th>
                  <td><?=sess("user")['us_cell']?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>