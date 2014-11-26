<?php

require_once "./session/s_session.php";

?>
<?php

/* Fichier index.php qui aiguille vers le controleur approprie
	Auteur: Adossou Lionel
	Date: 08/06/2014
	*/


 /* ini_set('display_errors', 1); */





	if ( !empty($_SESSION['login_id']) ) 
		{
		$base = 'vue/v_base.php';
		$action = $_GET['menu'];
		switch ($action)
			{
				case "stats":				
				$base_h = 'vue/v_base_stats.php';
				$contenu = "./vue/v_stats.php";
				include $base_h;
				break;
				
				case "lecture":
				$contenu = "./vue/v_lecture.php";
				include $base;
				break;
				
				case "supervision":
				$contenu = "./vue/v_supervision.php";
				include $base;
				break;
				
				case "deconnect":
				include "./controleur/c_deconnexion.php";
				break;
				
				case "recherche":
				$contenu = "./vue/v_recherche.php";
				include $base;
				break;
				
				default : 
				$contenu = "./vue/v_recherche.php";
				include $base;
				break;
			}
		}  else
	
		{
		$base = 'vue/v_base_login.php';
		$action = $_GET['menu'];
		switch ($action)
			{
			
			case "connect":
				include "./controleur/c_connexion.php";
				break;
			
			default : 
				$contenu = "./vue/v_login.php";
				include $base;
				break;
			
			}
	}


?>