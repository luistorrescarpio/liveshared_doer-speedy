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
  <style>
  	#map {
    	height: 400px;  /* The height is 400 pixels */
    	width: 100%;  /* The width is the width of the web page */
   }
  </style>
</head>

<body>
  <?php include("layout/head.php") ?>
	<div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Lista N° 1</button> 

          <div class="ubi_compra_list"></div> 
      	</h2>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body" >
          

          <button class="btn btn-warning" id="btn_ubicacion_recepcion" onclick="ordenCompra_getUbicacion_recepcion(<?=$_GET['iddel']?>)">&nbsp;Lugar de recepción&nbsp;</button>

          <div class="table-responsive pi-draggable mt-2">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Producto</th>
                  <th scope="col" contenteditable="true">Confirmación</th>
                </tr>
              </thead>
              <tbody class="lista_container"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <a class="btn btn-success" href="#">Confirmar entrega</a>
          <a class="btn btn-danger" href="#">Cancelar</a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_ubicacion">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubicación de la compra</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
        	<div class="referencia_label" style="color:blue;font-size: 18px;font-weight:bold;"></div>
            <div id="map"></div>
        </div>
        <div class="modal-footer"> <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button> </div>
      </div>
    </div>
  </div>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8kUXUFfG7B-auYnoA6nIUBtJbtHeFrsE">
    </script>
<script>
	$("#he_loading").show()
	$(window).on("load",function(){
		$("#he_loading").hide()

		// getStateDel()

		initMap(function(){
			ordenCompra_list()
		});
		

	})
	var marker;
	function ordenCompra_list(){
		he.post("conductor/orden_compra@listado_decompra",{
			iddel: <?=$_GET['iddel']?>
		},function(res){
			// console.log("======")
			// console.log(res)

			for ( i in res.locations ){
				// console.log(res.locations[i])
				btn_ubicompra = '<a class="btn btn-sm btn-primary mr-1 pi-draggable" href="javascript:ordenCompra_getUbicacion(\''+res.locations[i].pub_nombre+'\')"><i class="fa fa-fw fa-map-marker"></i>&nbsp;Compra '+(parseInt(i)+1)+'</a>';
				$(".ubi_compra_list").append(btn_ubicompra)
			}

			pnames = res.products;
			for( i in pnames ){
				// console.log(pnames[i]);
				row = '<tr class="pro_'+pnames[i].id_producto_nombre+'">'
					+'  <th scope="row">'+(parseInt(i)+1)+'</th>'
					+'  <td>'+pnames[i].pro_nombre+'</td>'
					+'  <td> <a class="btn btn-success pi-draggable mr-2" href="javascript:ordenCompra_setState('+pnames[i].id_producto_nombre+', 1)" draggable="true">'
					+'      <i class="fa fa-check"></i>'
					+'    </a>'
					+'    <a class="btn btn-danger pi-draggable" href="javascript:ordenCompra_setState('+pnames[i].id_producto_nombre+', 0)" draggable="true">'
					+'      <i class="fa fa-remove"></i>'
					+'    </a>'
					+'  </td>'
					+'</tr>';
				$(".lista_container").append(row)
			}

			ordenCompra_getState();
		},"json")

	}
	function ordenCompra_getUbicacion(ubicacion){
		var mod = $("#modal_ubicacion");

		mod.find(".modal-title").html("UBICACIÓN DE COMPRA");

		// console.log(ubicacion)
		if(ubicacion.indexOf("*")!=-1){

			ubicacion_referencia = ubicacion.split("*")[0];
			ubicacion_latlng = ubicacion.split("*")[1];

			marker.setPosition( 
				new google.maps.LatLng( ubicacion_latlng.split(",")[0], ubicacion_latlng.split(",")[1] ) 
			);
			console.log(ubicacion_referencia)
			$(".referencia_label").html(ubicacion_referencia)
			// marker.setTitle(ubicacion_referencia)

			$("#modal_ubicacion").modal("show")

		}else{
			alert(ubicacion)
		}
	}
	// ordenCompra_getUbicacion_recepcion(1);
	function ordenCompra_getUbicacion_recepcion(iddel){

		he.post("conductor/orden_compra@getUbicacionRecepcion",{
			iddel:	iddel
		}, function(dt){
			// console.log(dt);
			var mod = $("#modal_ubicacion");

			if(!dt.del_destino_latlng){
				alert(dt.del_destino)
				return;
			}

			// $("#btn_ubicacion_recepcion").
			mod.find(".modal-title").html("UBICACIÓN DE RECEPCIÓN");
			var latlng = dt.del_destino_latlng.split(",")
			marker.setPosition( 
				new google.maps.LatLng( latlng[0], latlng[1] ) 
			);

			$(".referencia_label").html(dt.del_destino)
			// marker.setTitle(ubicacion_referencia)

			mod.modal("show")

		},"json")
	}

	function ordenCompra_setState(idpno, state){
		he.post("conductor/orden_compra@producto_setState",{
			idpno: idpno
			,state: state
		},function(res){
			// console.log(res)
			if(res.success){
				if(res.state=="0"){
					$(".pro_"+idpno).find(".btn-success").hide()
					$(".pro_"+idpno).find(".btn-danger").addClass("disabled")
				}else if(res.state=="1"){
					$(".pro_"+idpno).find(".btn-danger").hide()
					$(".pro_"+idpno).find(".btn-success").addClass("disabled")
				}
			}else{

			}
		},"json")
	}
	function ordenCompra_getState(){
		// Verificar Stado de confirmaciones
		he.post("conductor/orden_compra@producto_getState",{
			iddel: <?=$_GET['iddel']?>
		},function(res){
		  console.log("====");
		  console.log(res);
		  // alert("aa")
		  for( i in res ){
		  	if(res[i].pro_estado=="0"){
				$(".pro_"+res[i].pno).find(".btn-success").hide()
				$(".pro_"+res[i].pno).find(".btn-danger").addClass("disabled")
			}else if(res[i].pro_estado=="1"){
				$(".pro_"+res[i].pno).find(".btn-danger").hide()
				$(".pro_"+res[i].pno).find(".btn-success").addClass("disabled")
			}
		  }
		},"json");
	}


	function getStateDel(){
		
	}

	// Initialize and add the map
	function initMap(callback) {
	  // The location of Uluru
	  var latlng = {lat: -17.641299, lng: -71.328441};
	  // The map, centered at Uluru
	  var map = new google.maps.Map(
	      document.getElementById('map'), {
	      	zoom: 13, 
	      	center: latlng
	      });
	  // The marker, positioned at Uluru
	  marker = new google.maps.Marker({
	  	position: latlng, 
	  	map: map,
	  	title: "prueba 1"
	  });
	  callback()
	}
</script>
</body>
</html>