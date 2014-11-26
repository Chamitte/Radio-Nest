<?php

/* Fichier c_historique.php qui affiche l'historique de la file d'attente
	Auteur: Adossou Lionel
	Date: 12/06/2014
	*/
	
require_once './config/c_config.php';
require_once './modele/m_acces_base_donne.php';
require_once './modele/m_close_base_donne.php';


	function extraire_log($base_connect_xivo,$queue_name)
	{

			$xivo_connect = acces_base($base_connect_xivo);
			$xivo_table_queue_log = '"queue_log"';
			$requete = pg_query($xivo_connect,"SELECT * FROM {$xivo_table_queue_log} WHERE queuename = '{$queue_name}'");
			$resultat = pg_fetch_all($requete);
			pg_free_result($requete);
			close_base($xivo_connect);
			return $resultat;
	}
	
	$queue_name ="wait";
	$historique = extraire_log($base_connect_asterisk,$queue_name);

	
	
		for($i = 0; $i < count($historique); ++$i) {
			$date = explode(" ",$historique[$i]['time']);
			$date_1 = $date[0];
			$date_event = $historique[$i]['event'];
			$day_semaine[$date_1][$date_event]++;
		}
 
	
	$output_semaine = array_slice($day_semaine, -7, 7,true);  

	


	foreach ($output_semaine as $key => $value){
		if(empty($output_semaine[$key]['CONNECT']))
			{
				$tab_chart_1[] = '{
        "date": "'.$key.'",
        "appel_in": '.$output_semaine[$key]['ENTERQUEUE'].',
        "appel_ok": 0
				}';
			
			
			} else {
				$tab_chart_1[] = '{
        "date": "'.$key.'",
        "appel_in": '.$output_semaine[$key]['ENTERQUEUE'].',
        "appel_ok": '.$output_semaine[$key]['CONNECT'].'
					}';
					}
		}
		foreach ($output_semaine as $key => $value){
		if(empty($output_semaine[$key]['ABANDON']))
			{
				$tab_chart_2[] = '{
        "date": "'.$key.'",
        "appel_in": '.$output_semaine[$key]['ENTERQUEUE'].',
        "appel_nok": 0
				}';
			
			
			} else {
				$tab_chart_2[] = '{
        "date": "'.$key.'",
        "appel_in": '.$output_semaine[$key]['ENTERQUEUE'].',
        "appel_nok": '.$output_semaine[$key]['ABANDON'].'
					}';
					}
		}
		foreach ($output_semaine as $key => $value){
		if(empty($output_semaine[$key]['EXITWITHTIMEOUT']))
			{
				$tab_chart_3[] = '{
        "date": "'.$key.'",
        "appel_in": '.$output_semaine[$key]['ENTERQUEUE'].',
        "appel_sok": 0
				}';
			
			
			} else {
				$tab_chart_3[] = '{
        "date": "'.$key.'",
        "appel_in": '.$output_semaine[$key]['ENTERQUEUE'].',
        "appel_sok": '.$output_semaine[$key]['EXITWITHTIMEOUT'].'
					}';
					}
		}
		for($i = 0; $i < count($historique); ++$i) {
			$date_event = $historique[$i]['event'];
			$day_log[$date_event]++;
		}
		
				$chart_a_donnee = '{
        "appel": "Nb ATRA",
        "data": '.$day_log['COMPLETEAGENT'].',
		"color": "#FE9A2E"
				}';
			
			
				$chart_c_donnee = '{
        "appel": "Nb ATRC",
        "data": '.$day_log['COMPLETECALLER'].',
		"color": "#04B404"
					}';
		for($i = 0; $i < count($historique); ++$i) {
			$date_event_1 = $historique[$i]['event'];
			$day_log_1[$date_event_1]++;
		}
		
				$chart_a_donnee_1 = '{
		
        "appel": "Appels entrants",
        "data": '.$day_log_1['ENTERQUEUE'].',
		"color": "#76bedf"
				}';
		
				$chart_b_donnee_1 = '{
        "appel": "Appels traités",
        "data": '.$day_log_1['CONNECT'].',
		"color": "#efd216"
					}';
					
				$chart_c_donnee_1 = '{
        "appel": "Appels abandonnés",
        "data": '.$day_log_1['ABANDON'].',
		"color": "#ef5050"
					}';
					$chart_d_donnee_1 = '{
        "appel": "Appels sans réponses",
        "data": '.$day_log_1['EXITWITHTIMEOUT'].',
	    "color": "#0C2974"
					}';
					
		for($i = 0; $i < count($historique); ++$i) {
			$date = explode(" ",$historique[$i]['time']);
			$date_3 = $date[0];
			$date_event = $historique[$i]['event'];
			$date_event_ring[$date_3][$date_event]++;
			if( $date_event === "RINGNOANSWER")
				{
					$date_event_ring[$date_3]['sonnerie']=$historique[$i]['data1']+$date_event_ring[$date_3]['sonnerie'];
				}
			}
			foreach ($date_event_ring as $key => $value){
			
			$date_event_ring[$key]['moyenne']=($date_event_ring[$key]['sonnerie']/($date_event_ring[$key]['CONNECT']+$date_event_ring[$key]['RINGNOANSWER']))/1000;
			$date_event_ring[$key]['moyenne']=round($date_event_ring[$key]['moyenne'], 2);
			
			$tab_chart_h[] = '{
                    "date": "'.$key.'",
                    "moyenne": '.$date_event_ring[$key]['moyenne'].'
                }';
			}
			
			
			$chart_5_donnee = implode(",",$tab_chart_h);
	
		
		$chart_1_donnee = $tab_chart_1[0].",".$tab_chart_1[1].",".$tab_chart_1[2].",".$tab_chart_1[3].",".$tab_chart_1[4].",".$tab_chart_1[5].",".$tab_chart_1[6];
		$chart_2_donnee = $tab_chart_2[0].",".$tab_chart_2[1].",".$tab_chart_2[2].",".$tab_chart_2[3].",".$tab_chart_2[4].",".$tab_chart_2[5].",".$tab_chart_2[6];
		$chart_6_donnee = $tab_chart_3[0].",".$tab_chart_3[1].",".$tab_chart_3[2].",".$tab_chart_3[3].",".$tab_chart_3[4].",".$tab_chart_3[5].",".$tab_chart_3[6];
		$chart_3_donnee = $chart_a_donnee.",".$chart_c_donnee;
		$chart_4_donnee = $chart_a_donnee_1.",".$chart_b_donnee_1.",".$chart_c_donnee_1.",".$chart_d_donnee_1;
		

?>