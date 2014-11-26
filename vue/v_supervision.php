 <?php
 $temps = shell_exec('/bin/cat ./fichier/f_temps_saturation.txt');
 if(!empty($_GET['temps_submit']))
		{
				$motif = "/(^\d{1,}$)/";
				$verif = preg_match($motif,$_GET['temps_saturation']);
				
			 if((isset($_GET['temps_saturation'])) && ($verif===1))
				{
							$fichier_a_ouvrir = fopen ("./fichier/f_temps_saturation.txt", "w+");
							fwrite($fichier_a_ouvrir,$_GET['temps_saturation']);
							fclose ($fichier_a_ouvrir);
							echo '<script language="Javascript">
							document.location.replace("./index.php?menu=supervision");
							</script>';
							
				} else {
							echo '<script language="Javascript">
							document.location.replace("./index.php?menu=supervision");
							</script>';
							}
 		
		}
 
 ?>
 
 <div class="row">
      <div class="large-12 columns">
       <h4>File d'attente</h4>
		<hr>
	
		<div id="load_donnees"></div>
		<div class="row">
			<div align="center">
			<label>Temps minimum pour la saturation (s):</label>
			 <div class="medium-2 medium-centered large-centered large-2 columns">
				 <form data-abide action="index.php" method="get">
          <div class="name-field">
		  <input type="hidden" name="menu" value="supervision">
          <input name="temps_saturation" value="<?php echo $temps; ?>" type="text" pattern="(^\d{1,}$)" required>
		  <small class="error" data-error-message="">Champ numérique.</small>
		  <button type="submit" name="temps_submit" value="submit" class="button [tiny small large]">Appliquer</button>
          </div>
	</form>
	</div></div> </div>

<script type="text/javascript">
var auto_refresh = setInterval(
  function ()
  {
    $('#load_donnees').load('./controleur/c_supervision.php').fadeIn("slow");
  }, 1000); // rafraichis toutes les 1000 millisecondes
 
</script>
		</div></div>