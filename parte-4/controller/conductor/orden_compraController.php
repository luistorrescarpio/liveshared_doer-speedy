<?php 
require "../../system/start.php";

// Models(["asistencia/test"]);

switch ($obj['action']) {

	case 'producto_getState':
		$r = query("SELECT id_producto_nombre AS pno, pro_estado FROM producto_nombre WHERE id_delivery=".$obj['iddel']);
		
		res($r);
		break;

	case 'producto_setState':
		$upd = query("UPDATE producto_nombre 
					SET pro_estado='".$obj['state']."' 
					WHERE id_producto_nombre=".$obj['idpno']);
		if($upd==1)
			res([
				"success"=>1
				,"message"=>"Confirmado Correctamente"
				,"state"=>$obj['state']
			]);
		else
			res([
				"success"=>0
				,"message"=>"Error al confirmar"
				,"error"=> $upd["error"]
			]);
		break;
	case 'getUbicacionRecepcion':
		$r = query("SELECT del.del_destino, del.del_destino_latlng FROM delivery AS del WHERE del.id_delivery=".$obj['iddel']);
		res(@$r[0]);
		break;

	case 'listado_decompra': //Lista de Solicitudes pendiente

		// Listado de Productos a comprar
		$products = query("SELECT pno.id_producto_nombre,pno.pro_nombre FROM delivery AS del 
			INNER JOIN producto_nombre AS pno ON del.id_delivery = pno.id_delivery
			WHERE 
				del.id_delivery=".$obj['iddel']." 
				AND del.del_estado = 1 
				AND del.del_ocstatus IS NULL");

		// Listado de las ubicaciones de Compra
		$locations = query("SELECT pub.pub_nombre FROM delivery AS del 
				INNER JOIN producto_ubicacion AS pub ON del.id_delivery = pub.id_delivery
				WHERE 
				  del.id_delivery=".$obj['iddel']." 
					AND del.del_estado = 1 
					AND del.del_ocstatus IS NULL");

		res([
			"products"=>$products
			,"locations"=>$locations
		]);

		break;
}