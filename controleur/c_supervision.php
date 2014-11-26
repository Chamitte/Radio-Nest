<?php

/* Fichier c_supervision.php qui affiche une supersion de la file d'attente
	Auteur: Adossou Lionel
	Date: 12/06/2014
	*/
	
$name_queue = "wait";	
/*
$cli_queue = shell_exec('/usr/sbin/asterisk -x "queue show '.$name_queue.'"');
*/

$socket = fsockopen("127.0.0.1","5038", $errno, $errstr, 10); 
if (!$socket) { 
	echo "$errstr ($errno)\n"; 
} else { 
   fputs($socket, "Action: Login\r\n"); 
fputs($socket, "UserName: test\r\n"); 
fputs($socket, "Secret: test\r\n\r\n"); 
fputs($socket, "Action: Command\r\n"); 
fputs($socket, "Command: queue show ".$name_queue."\r\n\r\n"); 
fputs($socket, "Action: Logoff\r\n\r\n"); 
while (!feof($socket)) {
 $cli_queue .=fgets($socket); 
 } 
fclose($socket); 
} 

//echo $cli_queue;

$pattern_queue_call = "/has\s[0-9]{1,}\scalls/";
$pattern_queue_holdtime = "/\([0-9]{1,}s\sholdtime/";
preg_match($pattern_queue_call,$cli_queue,$cli_queue_info_1);
preg_match($pattern_queue_holdtime,$cli_queue,$cli_queue_info_2);
$cli_queue_info_call_wait = explode(" ",$cli_queue_info_1[0]);
$cli_queue_info_call_hold = explode(" ",$cli_queue_info_2[0]);
$cli_queue_info_call_hold[0] = substr($cli_queue_info_call_hold[0],1);

$pattern_queue_agent = "/SIP\/[a-zA-Z0-9]{1,}\s\(ring/";
preg_match_all($pattern_queue_agent,$cli_queue,$cli_queue_info_3);

$i = 0;
foreach ($cli_queue_info_3 as $each_member) {
    $i++;
    while (list($key, $value) = each ($each_member)) {
              
        $sip = explode(" ",$value);
        $sip_info = explode($sip[0],$cli_queue);
		//echo $sip_info[1]."<br>";
		$sip_info_1 = explode(" ",$sip_info[1]);
		//print_r($sip_info_1);
		$id = $sip[0];
		if( $sip_info_1[3] ==="(Unavailable)" )
			{
			$tab[$id]['status']=1;
			} else {$tab[$id]['status']=0;}
			if( $sip_info_1[3] ==="(Not" )
			{
			$tab[$id]['attente']=1;
			} else {$tab[$id]['attente']=0;}
			if( $sip_info_1[3] ==="(In" )
			{
			$tab[$id]['appel']=1;
			} else {$tab[$id]['appel']=0;}
			if( $sip_info_1[3] ==="(Ringing)" )
			{
			$tab[$id]['sonnerie']=1;
			} else {$tab[$id]['sonnerie']=0;}
		$sip_info_2 = explode("has taken ",$sip_info[1]);
		//print_r($sip_info_2)."<br>";
		$sip_info_3 = explode(" ",$sip_info_2[1]);
		//print_r($sip_info_3)."<br>";
		if( $sip_info_3[0] ==="no" )
			{
			$tab[$id]['nbappel']=0;
			}else {$tab[$id]['nbappel']=$sip_info_3[0];}
			
		$sip_info_4 = explode("calls ",$sip_info[1]);
		$sip_info_5 = explode(" ",$sip_info_4[1]);
		//print_r($sip_info_5)."<br>";
		$sip_info_5[0]=rtrim($sip_info_5[0]);
		if($sip_info_5[0]==="yet")
			{
			$tab[$id]['last']="none";
			}else {
			$tab[$id]['last']=$sip_info_5[2];
			}
		//echo $tab[$id]['last'];	
    }

} 

//print_r($tab)."<br>";
echo '<div class="row">

 <div class="large-7 columns">
 <h6>Informations agents</h6>
 <hr>';

  echo '<table> 
		<thead> 
		<tr> 
		<th width="auto">Agent/SIP</th> 
		<th width="auto">Status</th> 
		<th width="auto">Disponibilité</th> 
		<th width="auto">Appels traités</th> 
		<th width="auto">Dernier appel</th>
		</tr> 
		</thead> 
		<tbody> 
		 ';
			foreach ($tab as $key => $value){
			
			echo '<tr> <td>'.$key.'</td>';
			if ($tab[$key]['status']===1){
			echo '<td style="Background-color:red;color:white">Deconnecté</td>'; 
			} else {
			echo '<td style="Background-color:green;color:white">Connecté</td>';
			}
			if ($tab[$key]['attente']===1) {
					echo '<td style="Background-color:yellow;color:black">Libre...</td>'; 
								} elseif ($tab[$key]['appel']===1) {
						echo '<td style="Background-color:orange;color:black">En communication</td>';
								} elseif($tab[$key]['sonnerie']===1) {
						echo '<td style="Background-color:blue;color:white">Sonnerie...</td>';
											} else {
											echo '<td style="Background-color:red;color:white">Indisponible</td>';
											}
					if ($tab[$key]['nbappel']===0)
					{
					echo ' <td>0</td>';
					} else {
					echo ' <td>'.$tab[$key]['nbappel'].'</td>';
					}
					
					if ($tab[$key]['last']==="none"){
						echo ' <td>none</td></tr>';
					} else {
					
					echo ' <td>'.$tab[$key]['last'].'s</td></tr>';
					};
					
			}

		 echo '</tbody> 
		 </table>';
		 

$client = explode("Callers:",$cli_queue);

//echo $client[1];


//echo $client[1];
//echo $client[1];

$client_info = explode("      ",$client[1]);

//echo $client_info[0];
//echo $client_info[1];



		//print_r($client_info);
		
	

		 
		 echo '<h6>Informations clients</h6>
 <hr> 
   <table> 
		<thead> 
		<tr> 
		<th width="auto">Numéro</th> 
		<th width="auto">Client/SIP</th> 
		<th width="auto">Temps d\'attente(mm-ss)</th> 
		</tr> 
		</thead> 
		<tbody> ';if(count($client_info)===1){
					echo '<tr><td>Pas de clients en attente</td>';	
					echo '<td>Indisponible</td>';
					echo '<td>Indisponible</td></tr>';
		}else{
				for($i = 1; $i < count($client_info); ++$i) { 
			$client_tab = explode(" ",$client_info[$i]);
				echo '<tr><td>'.$client_tab[0].'</td>';
				echo '<td>'.$client_tab[1].'</td>';
				echo '<td>'.rtrim($client_tab[3],',').'</td></tr>';
				}
			}
		
 
		 
  echo '</tbody> 
		 </table>
</div>';


 echo '<div class="large-5 columns">
 <h6>Informations généralles</h6>
<hr>
 <table> 
		<thead> 
		<tr> 
		<th width="auto">temps d\'attente estimé</th> 
		<th width="auto">Appels en attente</th> 
		</tr> 
		</thead> 
		<tbody> 
		<tr> 
		<td>'.$cli_queue_info_call_hold[0].'</td>
		<td>'.$cli_queue_info_call_wait[1].'</td> 		
		 </tr> </tbody> 
		 </table>
</div> 
 


</div>';


		 
		 


	

?>