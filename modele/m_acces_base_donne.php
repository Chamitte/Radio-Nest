<?php

/* Fichier m_acces_base_donne.php qui permet l'acces � la base de donn�e
	Auteur: Adossou Lionel
	Date: 12/06/2014
	*/
	
function acces_base($connection)
	{ 
		$connexion_base = pg_connect($connection);
		return  $connexion_base;
	}

?>