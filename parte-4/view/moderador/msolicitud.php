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
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="">Administración de Solicitudes</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-tabs">
            <li class="nav-item" style=""> <a href="" class="active nav-link" data-toggle="pill" data-target="#peddingList"><i class="fa fa-home"></i> Nuevas</a> </li>
            <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo"><i class="fa fa-bed"></i>&nbsp;Aceptadas</a> </li>
            <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree"><i class="fa fa-shower"></i> Observadas</a> </li>
            <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabfour" contenteditable="true"><i class="fa fa-shower"></i> Archivadas</a> </li>
          </ul>
          <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="peddingList" role="tabpanel">
              <div class="table-responsive">
                <table class="table table-striped table-borderless table-sm" style="font-size:13px;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Fecha y Hora</th>
                      <td scope="col" align="center"><i class="fa fa-flash"></i></td>
                    </tr>
                  </thead>
                  <tbody class="list"></tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="tabtwo" role="tabpanel">
              <div class="table-responsive">
                <table class="table table-striped table-borderless table-sm" style="font-size:13px;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Fecha y Hora</th>
                      <td scope="col" align="center"><i class="fa fa-flash"></i></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Juan Carlos Carpio</td>
                      <td>2020-04-11 15:30:00</td>
                      <td align="center"><i class="btn btn-sm btn-danger fa fa-remove"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="tabthree" role="tabpanel">
              <div class="table-responsive">
                <table class="table table-striped table-borderless table-sm" style="font-size:13px;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Fecha y Hora</th>
                      <td scope="col" align="center"><i class="fa fa-flash"></i></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Juan Carlos Carpio</td>
                      <td>2020-04-11 15:30:00</td>
                      <td align="center"><i class="btn btn-sm btn-danger fa fa-remove"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="tabfour" role="tabpanel">
              <div class="table-responsive">
                <table class="table table-striped table-borderless table-sm" style="font-size:13px;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Fecha y Hora</th>
                      <td scope="col" align="center"><i class="fa fa-flash"></i></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Juan Carlos Carpio</td>
                      <td>2020-04-11 15:30:00</td>
                      <td align="center"><i class="btn btn-sm btn-danger fa fa-remove"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmación de Solicitud</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
          <p>Seleccione la moto que desea que realice el servicio</p>
          <div class="table-responsive pi-draggable">
            <table class="table table-striped table-borderless table-sm" style="font-size:14px;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Localización</th>
                  <td scope="col" align="center"><b>Estado</b></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td> Juan Perez</td>
                  <td>-17.1231,-59.12312</td>
                  <td align="center"><i class="fa fa-motorcycle text-success" aria-hidden="true"></i></td>
                  <td align="center"><input type="radio" name="moto_selected"></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td> Richar Condori</td>
                  <td> -17.1231,-59.12312</td>
                  <td align="center"><i class="fa fa-motorcycle text-danger" aria-hidden="true"></i></td>
                  <td align="center"><input type="radio" name="moto_selected"></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td> Marco Aurelio</td>
                  <td> -17.1231,-59.12312</td>
                  <td align="center"><i class="fa fa-motorcycle text-success" aria-hidden="true"></i></td>
                  <td align="center"><input type="radio" name="moto_selected"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer"> <button type="button" class="btn btn-secondary">Confirmar Envio</button> <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> </div>
      </div>
    </div>
  </div>

  <!-- Modal iframe view pedido -->
<div class="modal fade" id="mod_preview_pedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles de Delivery Solicitado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="iframe_delivery_preview">
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal para denegar -->
  <div class="modal fade" id="mod_denegacion_obs" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Indique las observaciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="temp_iddel">
          <textarea class="form-control" id="denegacion_obs" rows="4"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="mso.pedido_confirmar(false, 0)">Enviar Denegación</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <script>
  	$("#he_loading").show()
  	$(window).on("load",function(){
  		$("#he_loading").hide()

  		mso.penddingList()
  	})
  	mso = new msolicitud();
  	function msolicitud(){
      this.pedido_form_denegacion = function(iddel){
          $("#temp_iddel").val(iddel)
          $("#mod_denegacion_obs").modal("show");
          setTimeout(function(){
            $("#denegacion_obs").focus()
          },500)
      }
      this.pedido_confirmar = function(iddel,confirm){ // -1, 0, 1

        iddel = iddel?iddel: $("#temp_iddel").val()
        he.post("pedido/moderador@confirmar_sdelivery",{
          iddel: iddel
          ,confirm: confirm
          ,obs: $("#denegacion_obs").val()
        },function(res){
          console.log(res);
          if(!res.success){
            alert(res.message);
            return;
          }
          $("#pedido_pendiente_"+iddel).remove();
          $("#denegacion_obs").val("")
          $("#mod_denegacion_obs").modal("hide")
        },"json")
      }
  		this.delivery_preview = function(iddel){
  			mod = $("#mod_preview_pedido");
  			mod.find("#iframe_delivery_preview").html('<iframe src="<?=$view?>/cliente/pedido_nuevo.php?edit='+iddel+'&embed" frameborder="0" style="width:100%;height:400px;"></iframe>')
  			mod.modal("show")
  		}
  		this.penddingList = function(){
			tab = $("#peddingList")
			tab.find(".list").html("")
			
			he.post("moderador/msolicitud@penddingList",{

			},function(res){
				console.log(res)
				for( i in res ){
		  			row ='<tr id="pedido_pendiente_'+res[i].id_delivery+'">'
						+'  <th scope="row">'+(parseInt(i)+1)+'</th>'
						+'  <td>'+(res[i].cli_nombres+' '+res[i].cli_apellidos)+'</td>'
						+'  <td>'+res[i].del_estado_regis+'</td>'
						+'  <td align="center">'
						+'  	<i class="btn btn-sm btn-info fa fa-search mr-2" onclick="mso.delivery_preview('+res[i].id_delivery+')"></i> '
						+'  	<i class="btn btn-sm btn-success fa fa-check" onclick="mso.pedido_confirmar('+res[i].id_delivery+',1)"></i> '
						+'  	<i class="btn btn-sm btn-danger fa fa-ban" onclick="mso.pedido_form_denegacion('+res[i].id_delivery+')"></i>'
						+'  </td>'
						+'</tr>';
					tab.find(".list").append(row)
				}
			},"json")
  		}
  	}
  </script>
</body>
</html>