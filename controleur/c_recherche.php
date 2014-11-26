<?php

/* Fichier c_recherche.php qui établit les recherches vidéo de l'admin
	Auteur: Adossou Lionel
	Date: 12/06/2014
	*/
	

class recherche
	{
		public $num_appelant;       
		public $num_appele;
		public $datte;  
		public $heure;
		public $verif_num_appelant;
		
		public function verif_num_appelant_recherche($champ1)
			{
				$motif = "/(^\d{1,}$)|(^$)|(^anonymous$)/";
				$verif = preg_match($motif,$champ1);
				if ($verif)
					{
						$result = 1;
						return $result;
					} else {
						$result = 0;
						return $result;
							}
			}	
		public function verif_num_appele_recherche($champ2)
			{
				$motif = "/(^\d{1,}$)|(^$)/";
				$verif = preg_match($motif,$champ2);
				if ($verif)
					{
						$result = 1;
						return $result;
					} else {
						$result = 0;
						return $result;
							}
			}
			public function verif_date_recherche($champ3)
			{
				$motif = "/(^[A-Z]([a-z]){2}\s[A-Z]([a-z]){2}\s([0-9]){2}\s20([0-9]){2}$)|(^$)/";
				$verif = preg_match($motif,$champ3);
				if ($verif)
					{
						$result = 1;
						return $result;
					} else {
						$result = 0;
						return $result;
							}
			}
			public function verif_heure_recherche($champ4)
			{
				$motif = "/(^[01]?[0-9]|2[0-3]$)|(^$)/";
				$verif = preg_match($motif,$champ4);
				if ($verif)
					{
						$result = 1;
						return $result;
					} else {
						$result = 0;
						return $result;
							}
			}
			public function champ_vide_recherche($champ5)
			{
				
				$verif = "";
				
				if ($champ5 === $verif)
					{
						$result = 1;
						return $result;
					} else {
						$result = 0;
						return $result;
							}
			}
			
			public function date_format_record($champ6)
			{
			$date_en = array(
						"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
						"Aug", "Sep", "Oct", "Nov", "Dec");
			$date_fm = array(
				"01", "02", "03", "04", "05", "06", "07",
				"08", "09", "10", "11", "12");
				
				$elem_date = explode(" ", $champ6);
						for ($i = 0; $i < count($date_en); $i++) {
									
									if($elem_date[1] === $date_en[$i])
										{
												$elem_date[1] = $date_fm[$i];
										}
										
						}
				$date_fm_new = array($elem_date[3],$elem_date[1],$elem_date[2]);
				
				$champ6 = implode("_", $date_fm_new );
				
				return $champ6;
			}
			
			
	}

	$search = new recherche();
	$search->num_appelant = $_GET['num_appelant'];
	$search->num_appele = $_GET['num_appele'];
	$search->datte = $_GET['date'];
	$search->heure = $_GET['heure'];
	
	if (($search->champ_vide_recherche($search->num_appelant)===1) &&  ($search->champ_vide_recherche($search->num_appele)===1) && ($search->champ_vide_recherche($search->datte)===1) && ($search->champ_vide_recherche($search->heure)===1)) 
		{
				$fichier_a_ouvrir = fopen ("./fichier/f_champ_vide.txt", "w+");
						fwrite($fichier_a_ouvrir,"vide");
						fclose ($fichier_a_ouvrir);
						
					

		} else {
					if($search->verif_num_appelant_recherche($search->num_appelant)===1)
						{
							if($search->verif_num_appele_recherche($search->num_appele)===1)
								{
										if($search->verif_date_recherche($search->datte)===1)
												{
												
													if($search->verif_heure_recherche($search->heure)===1)
																	{
												
																			if($search->datte==="")
																				{
																
																				} else {
																						$search->datte = $search->date_format_record($search->datte);
																						}
																		
																			$champ1=$search->num_appelant;
																			$champ2=$search->num_appele;
																			$champ3=$search->datte;
																			$champ4=$search->heure;
																						if($champ1==="")
																							{
																								$champ1="((\d{1,})|(anonymous))";
																							}
	
																							if($champ2==="")
																									{
																									$champ2="([0-9]){1,}";
																									}
	
																										if($champ3==="")
																												{
																												$champ3="([0-9]){4}\_([0-9]){2}\_([0-9]){2}";
																												}
	
																												if($champ4==="")
																															{
																																$champ4="([0-9]){2}";
																															}

																														$chemin = './record/';
																														$queuename="wait";

																														$motif ="/^$champ1\_$champ2\_$queuename\_$champ3\_$champ4\_([0-9]){2}\_([0-9]){2}\.WAV$/";

																													
																														$num_verif = 0;
																														$handler_verif = opendir($chemin);
																										
																														while ($file_verif = readdir($handler_verif))
																														{
																															if ($file_verif !== "." && $file_verif !== "..")
																																		{
																																						if(preg_match( $motif, $file_verif))
																																						{
																																							$num_verif = 1;
																																						}
																																		}
																														}
																														closedir($handler_verif);
																														if($num_verif === 1)
																														{
																														$handler = opendir($chemin);
																														echo '<table> 
																																										<thead><tr>
																																										<th width="500">Fichier son</th><th width="200">Option</th> <tbody>
																																										';
																														$k=0;								
																														while ($file = readdir($handler))
																															{
																																	if ($file !== "." && $file !== "..")
																																		{
																																						if(preg_match( $motif, $file))
																																									{
																																										echo '
																																										<tr><td>'.$file.'</td><td><form id="lecture'.$k.'" method="get" action="index.php"><input type="hidden" name="menu" value="lecture" /> <input type="hidden" name="nom_fichier" value="'.$file.'"><a href="#" onclick="document.getElementById(\'lecture'.$k.'\').submit(); return false;">Lecture</a></form></td></tr>
																																																	';
																																										$k++;							
																																									}
     
																																		}
																															}
																															echo '
																																								</tbody>
																																																			</table>';
																														closedir($handler);
																														}else
																														     {    echo '<div data-alert class="alert-box warning round">
																																			Aucun résutat pour Numéro appelant="'.$_GET['num_appelant'].'",Numéro appelé="'.$_GET['num_appele'].'",date="'.$_GET['date'].'",heure="'.$_GET['heure'].'".
																																						<a href="#" class="close">&times;</a>
																																										</div>';    }
								
							
																			} else {
																									$fichier_a_ouvrir = fopen ("./fichier/f_champ4.txt", "w+");
																										fwrite($fichier_a_ouvrir,"sync");
																											fclose ($fichier_a_ouvrir);
						
																												
						
																					}
								
								
								
								
							
														} else {
																		$fichier_a_ouvrir = fopen ("./fichier/f_champ3.txt", "w+");
																					fwrite($fichier_a_ouvrir,"sync");
																						fclose ($fichier_a_ouvrir);
						
																							
						
																	}
								
								
								
							
									} else {
											$fichier_a_ouvrir = fopen ("./fichier/f_champ2.txt", "w+");
											fwrite($fichier_a_ouvrir,"sync");
												fclose ($fichier_a_ouvrir);
						
												
						
											}
								
						} else {
								$fichier_a_ouvrir = fopen ("./fichier/f_champ1.txt", "w+");
							fwrite($fichier_a_ouvrir,"sync");
							fclose ($fichier_a_ouvrir);
						
						
								}
					
			
		
				}
?>
