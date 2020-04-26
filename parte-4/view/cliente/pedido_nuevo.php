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
  <!-- tagsinput -->
  <link rel="stylesheet" href="<?=$lib?>/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">
  <script src="<?=$lib?>/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      /* #map_compra_ubicacion {
        width: 100%;height: 300px;
      } */
      /*.gm-style-pbc{*/
    /*display: none !important*/
/*}*/
    </style>

  <script src="<?=$lib?>/mobile-detect.js/mobile-detect.min.js"></script>
</head>

<body >
  <?php 
  if(!isset($_GET['embed']))
    include("layout/head.php");
  ?>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	<?if(!isset($_GET['embed'])):?>
          <p class="">Doer Speedy puede realizar la compra de varios listados de productos en distintos lugares en un solo delivery por la aplicación.&nbsp;<a href="#">Quiero saber mas.</a> </p>
          <?endif?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <span class="">

          	<div class="listado_content"></div>
            <?if(!isset($_GET['embed'])):?>
            <a class="btn btn-primary btn-sm" href="javascript:pn.add_UIlistado()"><i class="fa fa-plus fa-fw fa-1x py-1"></i> Añadir Nuevo Listado</a>
            <a class="btn btn-danger btn-sm" href="javascript:pn.remove_UIlastListado()"><i class="fa fa-minus fa-fw fa-1x py-1"></i> Quitar Ultimo Listado</a>
            <br><br>
            <?endif?>
            <div class="form-group"> <label>-- DESTINO PARA RECEPCIÓN DEL DELIVERY</label> 
            	
              <div class="input-group mb-1">
      				  <input type="text" class="form-control destino_latlng" disabled placeholder=""> 
      				  <div class="input-group-append">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                  <label class="btn btn-primary">
                    <input type="radio" name="destino_mode" autocomplete="off" checked="" value="manual"> Manual </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="destino_mode" autocomplete="off" value="mi_ubicacion"> <i class="fa fa-map-marker" > </i> Mi ubicación</label>
                  <label class="btn btn-primary">
                    <input type="radio" name="destino_mode" autocomplete="off" value="only_direccion"> Solo Direccion</label>
                </div>
      				    <!-- <i class="btn btn-primary fa fa-map-marker" onclick="pn.miGPS_location()"> Mi ubicación GPS</i>  -->

      				  </div>
      				</div>

              <div class="input-group mb-1">
                <input type="text" class="form-control ubicacion_destino_referencia" placeholder="Ejemplo: Bello Horizonte Z-3, al frente del comedor Bella Fortuna"> 
              </div>
              <small>Ingrese la Dirección del Lugar que recibira el Delivery</small>
            </div>
            <div class="pi-wrapper pi-draggable my-2">
              <div id="map_recepcion_destino" style="width: 100%;height: 300px;"></div>
              <small class="form-text text-muted text-right d-none">
                <a href="#"> ¿Es esta la ubicación de recepción de delivery?</a>
              </small>
            </div>
            <?if(!isset($_GET['embed'])):?>
            <center>
            	<button class="btn btn-secondary" onclick="pn.register()">Solicitar Delivery</button>
            </center>
            <?endif?>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="mod_compra_ubicacion">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">UBICACIÓN DE COMPRA</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
        	<small>Si esta en celular, por favor maximize el Mapa para mover el Marcador facilmente</small>
          <input type="hidden" class="listado_index">
          <input type="hidden" class="map_latlng">
          <div id="map_compra_ubicacion" style="width: 100%;height: 300px;"></div>
          <div class="input-group mb-3">
			  <input type="text" class="form-control referencia" placeholder="Referencia">
			  <div class="input-group-append d-none">
			    <button class="btn btn-primary" type="button" 
			    id="button-addon2" onclick="pn.addCompraGPSForList()">Añadir</button>
			  </div>
			</div>
        </div>
        <div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="pn.addCompraGPSForList()">Establecer Ubicación</button> <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> </div>
      </div>
    </div>
  </div>
  
  <!-- Modal scan location -->
  <div class="modal fade" id="localizando_gps" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-none">
          <h5 class="modal-title" id="exampleModalCenterTitle">LOCALIZANDO EN 10 SEGUNDOS.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">
          <img src="<?=$public?>/img/localizando.gif" alt="" style="margin:auto;width: 100%">
          <p>Por favor, aserque a su ventana para lograr una mejor recepción de señal GPS y tener una mejor presición, esto tomara unos segundos...</p>
        </div>
        <div class="modal-footer d-none">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8kUXUFfG7B-auYnoA6nIUBtJbtHeFrsE&callback=initMap_recepcion_destino">
    </script>
  <script>
  	pn = new pedido_new();
    var map1,map2;
    var rede_marker;
  	$("#he_loading").show()
  	$(window).on("load",function(e){
  		

	  	$("#he_loading").hide()

      //edit detection
      <?if(isset($_GET['edit'])):?>
        pn.edit(<?=$_GET['edit']?>);
      <?else:?>
        pn.add_UIlistado()
      <?endif?>

      //event change destino
      $("input[name=destino_mode]").change(function(e){
        // console.log(e)
        console.log($(this).val())
        switch ($(this).val()) {
          case "manual":
            $(".destino_latlng").val("")
            $("#map_recepcion_destino").show()
            break;
          case "mi_ubicacion":
            pn.miGPS_location()
            $("#map_recepcion_destino").show()
            break;
          case "only_direccion":
            $(".destino_latlng").val("")
            $("#map_recepcion_destino").hide()
            $(".ubicacion_destino_referencia").focus()
            break;
        }
      })


  	})
    var md = new MobileDetect(window.navigator.userAgent);
    /*if (md.mobile()) {
        location.href = (md.mobileGrade() === 'A') ? '/mobile/' : '/lynx/';
    }*/

  	function initMap_recepcion_destino(){
  		var myLatlng = {lat: -17.65093075448044, lng: -71.33118170153227};

        map1 = new google.maps.Map(document.getElementById('map_recepcion_destino'), {
          zoom: 13,
          center: myLatlng,
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.RIGHT_CENTER
          },
          streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
        });

        rede_marker = new google.maps.Marker({
          position: myLatlng,
          map: map1,
          title: 'Click to zoom'
        });

        google.maps.event.addListener(map1, 'center_changed', function(e) {
          if($("input[name=destino_mode]:checked").val() == "mi_ubicacion") return;

          console.log(this.center.lat(), this.center.lng());  // in e.latLng  you have the coordinates of click
          rede_marker.setPosition( this.center )
          
          $(".destino_latlng").val(this.center.lat()+","+this.center.lng())
          $(".destino_latlng").css({"color":"black","font-weight":""})
        });

        initMap_pedido_ubicacion();
  	}
  	function initMap_pedido_ubicacion(){
  		var myLatlng = {lat: -17.65093075448044, lng: -71.33118170153227};

        map2 = new google.maps.Map(document.getElementById('map_compra_ubicacion'), {
        zoom: 13,
        center: myLatlng,
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        },
      });

      var peub_marker = new google.maps.Marker({
        position: myLatlng,
        map: map2,
        title: 'Click to zoom'
      });

      google.maps.event.addListener(map2, 'click', function(event) {
	      console.log(event.latLng.lat(), event.latLng.lng());  // in event.latLng  you have the coordinates of click

          
  		});
  		google.maps.event.addListener(map2, 'center_changed', function(e) {
  		    console.log(this.center.lat());  // in e.latLng  you have the coordinates of click
  		    mod = $("#mod_compra_ubicacion");
  		    // peub_marker.setPosition( new google.maps.LatLng( e.latLng.lat(), e.latLng.lng() ) )
          
  		    peub_marker.setPosition( this.center )
          
          mod.find(".map_latlng").val(this.center.lat()+","+this.center.lng())
  		});

        
        /*peub_marker.addListener('click', function(e) {
          // map.setZoom(8);
          // map.setCenter(marker.getPosition());
          console.log(e.latLng.lat())
        });*/

        /*$("#map_compra_ubicacion").find("div").prepend('<div style="position:absolute;z-index:3000;bottom:0px;width:100%;" align="right">'
        	+'<div class="input-group mb-1" style="max-width:400px;width:70%;margin:auto;">'
			+'  <input type="text" class="form-control" placeholder="Referencia">'
			+'  <div class="input-group-append">'
			+'    <button class="btn btn-primary" type="button" '
			+'    id="button-addon2">Añadir</button>'
			+'  </div>'
			+'</div>'
        +'</div>')*/

      
  	}
  	function listado_compra_ubicacion(idListContent){
      var mod = $("#mod_compra_ubicacion");
  		mod.modal("show")
  		setTimeout(function(){
	  		mod.find(".listado_index").val( idListContent )

  		},500)
  	}

  	var idListContent = 0;

    var listAll; //List de pedidos
  	function pedido_new(){
      this.edit = function(){
        he.post("pedido/cliente@solicitud_delivery_edit",{
          iddel: <?=isset($_GET['edit'])?$_GET['edit']:0?>
        },function(res){
          console.log(res)

          //prepair base
          delivery = res.delivery;
          $(".destino_latlng").val(delivery.del_destino_latlng)
          $(".ubicacion_destino_referencia").val(delivery.del_destino)

          var list_cant = parseInt(delivery.del_list_cant) //nro of list
          for( var i=0;i<list_cant;i++){
            pn.add_UIlistado();
            // eventTagsinput(list_cant);
          }

          products = res.products;
          for( i in products ){
            $('.list_product_'+products[i].pro_nro_list).tagsinput('add', { "value": products[i].pro_nombre, "text": products[i].pro_nombre});
          }
          locations = res.locations;
           // mode
          $("input[name=destino_mode]").parent().removeClass("active")

          for( i in locations ){
            //exits latlng ?
            if(locations[i].pub_nombre.indexOf("*")!=-1){
              var pub_nombre = locations[i].pub_nombre.split("*");
              $('.list_lugar_'+locations[i].pub_nro_list).tagsinput('add', { "value": locations[i].pub_nombre+"*", "text": "[GPS] "+pub_nombre[0]});

              $("input[name=destino_mode][value=mi_ubicacion]").parent().addClass("active")
            }else{
              $('.list_lugar_'+locations[i].pub_nro_list).tagsinput('add', { "value": locations[i].pub_nombre, "text": locations[i].pub_nombre});
              $("input[name=destino_mode][value=only_direccion]").parent().addClass("active")
              $("#map_recepcion_destino").hide()
            }
          }

          //recepcion ubication edit
          var destino_latlng = delivery.del_destino_latlng.split(",")
          rede_marker.setPosition( new google.maps.LatLng( destino_latlng[0], destino_latlng[1] ) )


        },"json")
      }
      this.register = function(){
        

          console.log("entro");

        listAll = []
        var listado_valid = true;
        $(".listado_content").find(".listado").each(function(index, el){
          // console.log(index);

          var list_product = $(el).find(".list_product").val()
          var list_lugar = $(el).find(".list_lugar").val()
          if(list_product == ""){
            alert("Debe añadir los productos que desea comprar en la Lista N°"+(parseInt(index)+1));
            listado_valid = false;
          }
          if(list_lugar == ""){
            alert("Debe indicar la ubicación de compra en la Lista N°"+(parseInt(index)+1));
            listado_valid = false;
          }

          listAll.push([list_product, list_lugar])
          // console.log(list_product, list_lugar)
        })
        if(listado_valid == false){
          return;
        }

        if( $(".destino_latlng").val() == "" && $("input[name=destino_mode]:checked").val() != "only_direccion" ){
          alert("Debe indicar el lugar en el mapa");
          return;
        }

        if($(".ubicacion_destino_referencia").val()==""){
          alert("Debe indicar la dirección de recepción del delivery");
          $(".ubicacion_destino_referencia").focus()
          return;
        }

        destino = $(".ubicacion_destino_referencia").val()
        destino_latlng = $(".destino_latlng").val()
        obj_in = {
          "listAll": listAll
          ,"destino": destino
          ,"destino_latlng": destino_latlng
          ,"destino_mode": $("input[name=destino_mode]:checked").val()
        }
        he.post("pedido/cliente@request_delivery",obj_in,function(res){
          console.log(res)
          if(res.success){
            window.location.href="pedido_solicitud.php?iddel="+res.id
          }else{
            alert(res.message)
          }
        },"json")
        // console.log(obj_in)
      }
      this.miGPS_location = function(){
        <?if(isset($_GET['embed'])):?>
          return;
        <?endif?>
        if(!gpsActive){
          alert("Por favor encienda su GPS e intentelo nuevamente");
          return;
        }
        
        if (!md.mobile() && !md.tablet()){
          alert("Funcion disponible solo para Smartphone y tablet")
          return;
        }

        mod = $("#localizando_gps")
        // mod.modal("show")
        mod.modal({backdrop:'static',keyboard:false, show:true});
        this.lastGPS_capture = true;
        this.lastGPS_capture_latlng = true;
        setTimeout(function(){
          pn.lastGPS_capture = false;
          mod.modal("hide")
          rede_marker.setPosition( new google.maps.LatLng( pn.lastGPS_capture_latlng.split(",")[0], pn.lastGPS_capture_latlng.split(",")[1] ) )
          $(".destino_latlng").val(pn.lastGPS_capture_latlng)
          $(".destino_latlng").css({"color":"blue","font-weight":"bold"})


        },5000)
      }
      this.addCompraGPSForList_clear = function(){

        mod = $("#mod_compra_ubicacion");
        mod.find(".map_latlng").val("")
        mod.find(".referencia").val("")
        mod.find(".listado_index").val("")
        mod.modal("hide")
      }
      this.addCompraGPSForList = function(){
        if($(".map_latlng").val() == "" ){
          alert("Debe Indicar en el mapa en que lugar debe realizarse las compras de su Lista de Compras");
          return;
        }
        if($(".referencia").val() == "" ){
          alert("Debe Indicar referencias del lugar");
          $(".referencia").focus()
          return;
        }

        mod = $("#mod_compra_ubicacion");
        var map_latlng = mod.find(".map_latlng").val()
        var referencia = mod.find(".referencia").val()
        var listado_index = mod.find(".listado_index").val()

        $('.list_lugar_'+listado_index).tagsinput('add', { "value": referencia+"*"+map_latlng , "text": '[GPS] '+referencia});
        pn.addCompraGPSForList_clear()
      }
  		this.remove_UIlastListado = function(id){
  			if(idListContent==1) return;
  			$("#listado_"+idListContent).remove()
  			idListContent--;
  		}
  		this.remove_UIlistado = function(id){
  			$("#listado_"+id).remove()
  		}
  		this.add_UIlistado = function(){
  			idListContent++;
  			row='<div class="mb-2 listado" style="border: 1px solid #ccc;padding:10px;" id="listado_'+idListContent+'">'
				+'		<div style="font-weight: bold;font-size:20px;" align="center">'
				+'		-- LISTADO N° '+idListContent+' -- <div style="position:absolute;right:20px;margin-top:-35px;"><i class="btn btn-sm btn-danger fa fa-remove" style="cursor:pointer;display:none" onclick="pn.remove_UIlistado('+idListContent+')"></i></div></div>'
				+'    <div class="form-group"> <label>* Productos a comprar</label>'
				+'      <input type="text" class="form-control list_product list_product_'+idListContent+'" '
				+'      	data-role="tagsinput" list_index="'+idListContent+'">'
				+'      <small class="form-text text-muted">'
				+'      	Ingrese los productos que desea separados por una coma (,)</small> </div>'
				+'    <div class="form-group"> <label>* Ubicación de Compra <i class="btn btn-sm btn-light fa fa-crosshairs" style="cursor:pointer;" onclick=\'listado_compra_ubicacion('+idListContent+')\' title="Ubicar via Coordenada Maps"></i></label>'
				+'         <input class="form-control list_lugar list_lugar_'+idListContent+'"  type="text" data-role="tagsinput" list_index="'+idListContent+'">'
				+'         <small class="form-text text-muted">Indique el lugar de compra para el listado'
				+'      N° '+idListContent+', puede añadir alternativas otras alternativas '
				+'  		separando por una coma (,)</small> '
					+'</div>'
				+'</div>'
  			$(".listado_content").append(row)

  			eventTagsinput(idListContent);
  		}
  	}
    function eventTagsinput(idListContent){
      $('.list_product_'+idListContent).tagsinput({
        itemValue: 'value',
        itemText: 'text',
        delimiter:'|',
      })
      $('.list_product_'+idListContent).parent().find(".bootstrap-tagsinput input").keyup(function(e){
        if(e.keyCode!=13 && e.keyCode!=188) return;
        var list_index = $(this).parent().parent().find(".list_product").attr("list_index")
        console.log(list_index)
        $('.list_product_'+list_index).tagsinput('add', { "value": $(this).val() , "text": $(this).val()});
        $(this).val("")
      })
      $('.list_lugar_'+idListContent).tagsinput({
        itemValue: 'value',
        itemText: 'text',
        delimiter:'|',
      })
      $('.list_lugar_'+idListContent).parent().find(".bootstrap-tagsinput input").keyup(function(e){
        console.log(e.keyCode)
        if(e.keyCode!=13 && e.keyCode!=188) return;
        var list_index = $(this).parent().parent().find(".list_lugar").attr("list_index")
        $('.list_lugar_'+list_index).tagsinput('add', { "value": $(this).val() , "text": $(this).val()});
        $(this).val("")

      })
    }
    var gpsActive = false;
    setInterval(function(){
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
          gpsActive = true;
          if(!pn.lastGPS_capture) return;



          console.log(position.coords.latitude);
          console.log(position.coords.longitude);
          var latLng = position.coords.latitude+","+position.coords.longitude;

          pn.lastGPS_capture_latlng = latLng;
          
          // $(".gps_preview").attr("href",'https://www.google.com/maps/search/?api=1&query='+latLng)
          // $(".gps_preview").attr("target",'_blank')

          

        }, function(msg){
          console.log(typeof msg == 'string' ? msg : "error");
        });
      } else {
        gpsActive = false;
        alert("Not Supported!");
      }
    },1500)
  </script>
</body>
</html>