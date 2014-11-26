<?php

/* Fichier c_connexion.php qui aux utilisateurs de se connecter
	Auteur: Adossou Lionel
	Date: 12/06/2014
	*/
?>

<?php



require_once './config/c_config.php';
require_once './modele/m_acces_base_donne.php';
require_once './modele/m_close_base_donne.php';


$login_wait_name = $_POST['login_wait_name'];
$login_wait_pass = $_POST['login_wait_pass'];


function extraire_identifiant($base_connect_xivo,$login,$pass)
	{

			$xivo_connect = acces_base($base_connect_xivo);
			$xivo_login = pg_escape_string($login);
			$xivo_pass = pg_escape_string($pass);
			pg_set_client_encoding($xivo_connect, "UTF8");
			$xivo_table_user = '"user"';
			$requete = pg_query($xivo_connect,"SELECT id,login,passwd FROM {$xivo_table_user} WHERE login = '{$xivo_login}'");
			$resultat = pg_fetch_array($requete, NULL, PGSQL_ASSOC);
			pg_free_result($requete);
			close_base($xivo_connect);
			return $resultat;
	}




if (!empty($login_wait_name) && !empty($login_wait_pass))
	{
	$c_identifiant = extraire_identifiant($base_connect,$login_wait_name,$login_wait_pass);
	
	
			if (!empty($c_identifiant['passwd']))
				{
					if ( $c_identifiant['passwd'] === $login_wait_pass )
					{
						session_start();
						$_SESSION['login_id'] = $c_identifiant['id'];
						$_SESSION['login_wait'] = $c_identifiant['login'];
					
						echo '<script language="Javascript">
							document.location.replace("./index.php");
							</script>';
					} else {
							$fichier_a_ouvrir = fopen ("./fichier/f_connect.txt", "w+");
							fwrite($fichier_a_ouvrir,"pass");
							fclose ($fichier_a_ouvrir);	
			
							echo '<script language="Javascript">
							document.location.replace("./index.php");
							</script>';
							}
									
				} else {
	
					$fichier_a_ouvrir = fopen ("./fichier/f_connect.txt", "w+");
						fwrite($fichier_a_ouvrir,"vide");
						fclose ($fichier_a_ouvrir);

					 echo '<script language="Javascript">
							document.location.replace("./index.php");
							</script>';

				       }
	} else {
					 echo '<script language="Javascript">
					document.location.replace("./index.php");
					</script>';
					
				       }


  


?>