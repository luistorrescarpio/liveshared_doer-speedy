<?php 
require "../../system/start.php";

switch ($obj['action']) {
	case 'confirmar_sdelivery':

		$upd = query("UPDATE delivery 
				SET del_estado=".$obj['confirm']."
					,del_obs='".$obj['obs']."'
				WHERE id_delivery=".$obj['iddel']);
		if(isset($upd["error"]))
			res([
				"success"=>0
				,"message"=>"Error al confirmar"
				,"error"=>$upd["error"]
			]);
		else
			res([
				"success"=>1
				,"message"=>"Confirmarción Executada!"
				,"id"=>$obj['iddel']
			]);
		break;
}