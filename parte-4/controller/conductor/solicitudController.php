<?php 
require "../../system/start.php";

// Models(["asistencia/test"]);

switch ($obj['action']) {
	case 'sol_pendding': //Lista de Solicitudes pendiente
		$r = query("SELECT del.id_delivery,cda.cli_nombres,cda.cli_apellidos, del.del_register FROM delivery AS del
			INNER JOIN usuario AS us ON del.id_usuario = us.id_usuario
			INNER JOIN cliente_data AS cda ON us.id_cliente_data = cda.id_cliente_data
			WHERE del.del_estado=1");
		res($r);
		break;
}