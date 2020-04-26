<?php 
require "../../system/start.php";

// Models(["asistencia/test"]);

switch ($obj['action']) {
	case 'pedido_confirmacion_res':
		$r = query("SELECT del_estado,del_obs FROM delivery WHERE id_delivery=".$obj['iddel']);
		res($r[0]);
		break;
	case 'pedido_historialXcliente':
		$r = query("SELECT * FROM delivery 
			WHERE id_usuario=".sess("user")["id_usuario"]);
		res($r);
		break;
	case 'solicitud_delivery_edit':
		$r = query("SELECT * FROM delivery AS del 
			INNER JOIN producto_nombre AS pno ON del.id_delivery = pno.id_delivery
			INNER JOIN producto_ubicacion AS pub ON del.id_delivery = pub.id_delivery
			WHERE del.id_delivery='{$obj['iddel']}'
				");
		$delivery = query("SELECT del.* FROM delivery AS del WHERE  del.id_delivery='{$obj['iddel']}'")[0];

		$products = query("SELECT pno.* FROM delivery AS del 
			INNER JOIN producto_nombre AS pno ON del.id_delivery = pno.id_delivery
			WHERE del.id_delivery='{$obj['iddel']}' ");

		$locations = query("SELECT pub.* FROM delivery AS del 
			INNER JOIN producto_ubicacion AS pub ON del.id_delivery = pub.id_delivery
			WHERE del.id_delivery='{$obj['iddel']}' ");


		res([
			"success"=>1
			,"delivery"=>$delivery
			,"products"=>$products
			,"locations"=>$locations
		]);
		break;
	case 'request_delivery': //solicitud de delivery
		$dtime_now = date("Y-m-d H:i:s");

		if($obj["destino_mode"] == "only_direccion"){
			$destino_latlng = "NULL";
		}else{
			$destino_latlng = "'".$obj["destino_latlng"]."'";
		}

		$id_delivery = query("INSERT INTO delivery (del_register,id_usuario,del_estado,del_estado_regis,del_destino, del_destino_latlng,del_list_cant)
			VALUES('{$dtime_now}','".sess("user")["id_usuario"]."','-1','{$dtime_now}','".$obj['destino']."',{$destino_latlng},'".count($obj["listAll"])."')");

		if(isset($id_delivery["error"]))
			res([
				"success"=>0
				,"message"=>"Error al registrar delivery"
				,"error"=>$id_delivery["error"]
			]);

		// Product Register
		$listAll = $obj["listAll"];
		foreach ($listAll as $i => $list) {	
			$list_nro = (int)$i+1;

			$items = explode("|", $list[0]);
			foreach ($items as $j => $item) {
				//insert producto and relation with delivery
				$idpro = query("INSERT INTO producto_nombre (pro_nombre,id_delivery,pro_nro_list)
					VALUES('{$items[$j]}','{$id_delivery}','".$list_nro."')");

				if(isset($idpro["error"])){
					res([
						"success"=>0
						,"message"=>"Error al adjuntar lista de productos"
						,"error"=>$idpro["error"]
					]);
				}
			}

			$items = explode("|", $list[1]);
			foreach ($items as $j => $item) {
				//insert producto ubication and relation with delivery
				$idpub = query("INSERT INTO producto_ubicacion (pub_nombre,id_delivery,pub_nro_list)
					VALUES('{$items[$j]}','{$id_delivery}','".$list_nro."')");

				if(isset($idpub["error"]))
					res([
						"success"=>0
						,"message"=>"Error al adjuntar lista de ubicaciones de compras"
						,"error"=>$idpub["error"]
					]);
				
			}
		}
		if(isset($id_delivery["error"]))
			res([
				"success"=>0
				,"message"=>"Error en solicitud"
				,"error"=>$id_delivery["error"]
			]);
		else
			res([
				"success"=>1
				,"message"=>"Solicitud enviada"
				,"id"=>$id_delivery
			]);
		break;
}