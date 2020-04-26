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
        <div class="col-md-12">
          <div class="table-responsive" style="">
          	
            <table class="table table-striped table-borderless" style="font-size:12px;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fecha y hora</th>
                  <th scope="col">Costo</th>
                  <th scope="col">Estado</th>
                  <th scope="col"><i class="fa fa-bolt" aria-hidden="true"></i></th>
                </tr>
              </thead>
              <tbody id="solicitud_list"> </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="pedido_preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="iframe_pedido"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(window).on("load",function(){
      mostrar_solicitudes()
    })
    function pedido_preview(iddel){
      var iframe = '<iframe src="<?=$view?>/cliente/pedido_nuevo.php?edit='+iddel+'&embed" width="100%" height="400"></iframe>';
      $(".iframe_pedido").html(iframe)
      $("#pedido_preview").modal("show")
    }
    function mostrar_solicitudes(){
      he.post("pedido/cliente@pedido_historialXcliente",{

      },function(res){
        console.log(res)
        for( i in res ){
          row = '<tr>'
              +'  <th scope="row">1</th>'
              +'  <td>'+res[i].del_register+'</td>'
              +'  <td>--</td>';
          if(res[i].del_estado=="-1"){
          row+='  <td><a class="btn btn-light btn-sm" href="#">'
            +'    <i class="fa fa-spinner fa-1x fa-fw py-1"></i></a></td>'
            +'  <td>'
          }else if(res[i].del_estado=="1"){
            row+='  <td><a class="btn btn-success btn-sm" href="#">'
            +'    <i class="fa fa-check fa-1x fa-fw py-1"></i></a></td>'
            +'  <td>'
          }else if(res[i].del_estado=="0"){
            row+='  <td><a class="btn btn-danger btn-sm" href="#">'
            +'    <i class="fa fa-remove fa-1x fa-fw py-1"></i></a></td>'
            +'  <td>'
          }
              

          row+='    <div class="btn-group">'
              +'      <button class="btn btn-primary mr-2" onclick="pedido_preview('+res[i].id_delivery+')"><i class="fa fa-search"></i></button>'
              +'      <button class="btn btn-light dropdown-toggle btn-sm" '
              +'      data-toggle="dropdown"> <i class="fa fa-cog" aria-hidden="true"></i> '
              +'    </button>'
              +'      <div class="dropdown-menu"> <a class="dropdown-item" href="#">Action</a>'
              +'        <div class="dropdown-divider"></div>'
              +'        <a class="dropdown-item" href="#">Separated link</a>'
              +'      </div>'
              +'    </div>'
              +'  </td>'
              +'</tr>'
          $("#solicitud_list").append(row)
        }
      },"json");
    }
  </script>
</body>
</html>