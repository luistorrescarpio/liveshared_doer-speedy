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
        <div class="col-md-12">
          <div class="table-responsive" >
            <table class="table table-striped table-borderless" style="font-size:12px;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Clientes</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Op</th>
                </tr>
              </thead>
              <tbody class="listPendding"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    
    $(window).on("load",function(){
      penddingList()
    })
    function penddingList(){
      he.post("conductor/solicitud@sol_pendding",{

      },function(res){
        console.log(res);
        // return;
        $(".listPendding").html("");
        for( i in res ){
          row = '<tr>'
              +'  <th scope="row">1</th>'
              +'  <td>'+res[i].cli_nombres+" "+res[i].cli_apellidos+'</td>'
              +'  <td>'+res[i].del_register+'</td>'
              +'  <td><a href="orden_compra.php?iddel='+res[i].id_delivery+'" class="btn btn-success btn-sm fa fa-sign-in">'
              +'    </a></td>'
              +'</tr>';
          $(".listPendding").append(row);
        }
      },"json")
    }

  </script>
</body>
</html>