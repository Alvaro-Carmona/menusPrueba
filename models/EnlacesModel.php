<?php

class EnlacesModels
{

	public static function enlacesModel($enlaces)
	{

		if ($enlaces == "menus") {

			$module = "views/modules/" . $enlaces . ".php";
		} else if ($enlaces == "index") {
			$module = "views/modules/inicio.php";
		} else {
			$module = "views/modules/inicio.php";
		}

		return $module;
	}
}
