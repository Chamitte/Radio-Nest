 <?php
    /* Fichier c_deconnexion.php qui ferme la session de l'admin
	Auteur: Adossou Lionel
	Date: 12/06/2014
	*/

   
  session_unset();
  session_destroy();
  header ('location: index.php');
 ?>