<?php

/* Fichier m_close_base.php qui met fin à la connexion avec la base de donnée
	Auteur: Adossou Lionel
	Date: 12/06/1991
	*/

function close_base($connexion)
	{
		$deconnexion = pg_close($connexion);
		return $deconnexion;
	}

?>