
<div class="row">
<div class="large-12 columns">
<div class="row">
 
 <div class="large-4 columns">
 <?php  
 $fichier_lect = $_GET['nom_fichier'];
 
$chemin = "./record/";
 $dir_fichier_lect = $chemin.$fichier_lect;
 
 if (file_exists($dir_fichier_lect))
	{
			$result=1;
		} else {
		
			$result=0;
		}
 

 ?>
 
<?php 

if($result===0)
{
echo '<h4>Informations</h4>
<hr>
<table> 

<tbody> 
<tr> 
<td>Num appellant : Indisponible</td> 
</tr> 
<tr> 
<td>Num appelé : Indisponible</td> 
</tr> 
<tr> 
<td>Date : Indisponible</td>
</tr> 
<tr> 
<td>Heure : Indisponible</td>
</tr>
<tr> 
<td>Taille : Indisponible</td>
</tr>  
<tr> 
<td>
<div class="small-8 small-centered columns">
          <a href="#" class="button postfix">Telecharger</a>
        </div></td>
</tr> 
</tbody> </table>';
} else {
$fichier_lect_info = explode("_",$fichier_lect);
function taille($fichier){
global $size_unit;
$taille = filesize($fichier);

if ($taille >= 1073741824)
{ $taille = round($taille / 1073741824 * 100) / 100 . " Go"; }
elseif ($taille >= 1048576)
{ $taille = round($taille / 1048576 * 100) / 100 . " Mo"; }
elseif ($taille >= 1024)
{ $taille = round($taille / 1024 * 100) / 100 . " Ko"; }
else
{ $taille = $taille . " o"; }
if($taille==0) {$taille="-";}
return $taille;
}



echo '
<h4>Informations</h4>
<hr>
<table> 
	
<tbody> 
<tr> 
<td>Numéro appellant : '.$fichier_lect_info[0].'</td> 
</tr> 
<tr> 
<td>Numéro appelé : '.$fichier_lect_info[1].'</td> 
</tr> 
<tr> 
<td>Date(aaaa-mm-jj): '.$fichier_lect_info[3].'-'.$fichier_lect_info[4].'-'.$fichier_lect_info[5].'</td>
</tr> 
<tr> 
<td>Heure(hh:mm) : '.$fichier_lect_info[6].':'.$fichier_lect_info[7].'</td>
</tr>
<tr> 
<td>Taille : '.taille($dir_fichier_lect).'</td>
</tr>  
<tr> 
<td>
<div class="small-8 small-centered columns">
          <a href="'.$dir_fichier_lect.'" download class="button postfix"/>Telecharger</a>
        </div></td>
</tr> 
</tbody> </table>

';



}


?>
</div> 
 
<div class="large-8 columns">

<div class="row">
<div class="large-12 small-12 columns">
<h4>Lecture</h4>
<hr>

  <div class="large-12 columns"> 

  <?php 
  if ($result===0) {
  echo '<div data-alert class="alert-box alert round">
										Le fichier '.$_GET['nom_fichier'].' n\'existe pas...
										<a href="#" class="close">&times;</a>
										</div>';
  } else {
 

	echo '<label>'.$_GET['nom_fichier'].'</label><hr><br/>
 <object type="audio/x-wav" data="'.$dir_fichier_lect.'" width="350" height="80">
  <param name="autoplay" value="false">
  <param name="autoStart" value="0">
</object>';

}
?>
	 
		</div>
</div>
</div>

</div>

</div>
</div>
</div> 


