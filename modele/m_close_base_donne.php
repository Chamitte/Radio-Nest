<?php

/* Fichier m_close_base.php qui met fin � la connexion avec la base de donn�e
	Auteur: Adossou Lionel
	Date: 12/06/1991
	*/

function close_base($connexion)
	{
		$deconnexion = pg_close($connexion);
		return $deconnexion;
	}

?>