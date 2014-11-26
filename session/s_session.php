<?php

/* Fichier s_session.php debute la session
	Auteur: Adossou Lionel
	Date: 10/06/2014
	*/

session_start();

if( isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) )
	{
			session_start();
	}

?>