<?php 
require "../../system/start.php";

Models(["moderador/msolicitud"]);

switch ($obj['action']) {
	case 'penddingList':
		//GET List pedding All
		$r = $Model['msolicitud']->penddingList();
		res($r);
		break;
}