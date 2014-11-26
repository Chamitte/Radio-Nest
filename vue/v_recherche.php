
<div class="row">
<div class="large-12 columns">
<div class="row">
 
 <div class="large-4 columns">
<h4>Recherche</h4>
<hr>
<form id="myform" class="custom" data-abide action="index.php" method="get">
				  <div class="row">
				    <div class="large-12 columns">
				      <label for="num_appelant">Numéro : Appellant</label>
				      <input type="text" class="search-group" name="num_appelant" id="num_appelant" placeholder="Recherche ex:1234 ou anonymous" pattern="(^\d{1,}$)|(^$)|(^anonymous$)"/>
		
				    </div>
				  </div>
				  <div class="row">
				    <div class="large-12 columns">
				      <label for="num_appele">Numéro : Appellé</label>
				      <input type="text" class="search-group" name="num_appele" id="num_appele" placeholder="Recherche par numéro ex:1234" pattern="(^\d{1,}$)|(^$)"/>
				    </div>
				  </div>
				 <div class="row">
				    <div class="large-12 columns">
					<label>Date</label>
				<input type="text" class="search-group" id="datepicker" name="date" readonly pattern="^[A-Z][a-z]{2}\s[A-Z][a-z]{2}\s[0-9]{2}\s20[0-9]{2}$">
				</div>
				  </div>
				  <div class="row">
				    <div class="large-12 columns">
				      <label>Heure</label>
				      <input type="text" class="search-group" name="heure" placeholder="Recherche par heure ex:(0-23)" pattern="([01]?[0-9]|2[0-3])" />
				    </div>
				  </div>
				  <div class="row">
						<div class="small-9 small-centered columns">
							<div class="button-bar"> 
								<ul class="button-group"> 
									<li><button name="send" class="button [tiny small large]" type="submit" value="validate">Lancer</button></li> 
								</ul>
								<ul class="button-group"> 
									<li><button class="button [tiny small large secondary alert success]" type="reset" value="reset">Reset</button></li> 
								</ul>
							</div>
						</div>
				    </div>
	</form>				
</div> 
 
<div class="large-8 columns">

<div class="row">
<div class="large-12 small-12 columns">
<h4>Résultats</h4>
<hr>

<?php
if($_GET['send']==="validate") {
	require_once "./controleur/c_recherche.php";
	} else { echo '<div data-alert class="alert-box round">
										Aucune recherche lancée...
										<a href="#" class="close">&times;</a>
										</div>'; }

					$path = "./fichier/f_champ_vide.txt";
					$fichier = file($path);
					
					foreach ($fichier as $num => $ligne)
						{
				
	
				if ( $ligne === "vide" ) {
							echo '<div data-alert class="alert-box warning round">
										Vous devez au minimum renseigner un champ pour effectuer une recherche...
										<a href="#" class="close">&times;</a>
										</div>';
								}
			
						}

					$fichier_a_ouvrir = fopen ("./fichier/f_champ_vide.txt", "w+");
						fwrite($fichier_a_ouvrir,"rien");
						fclose ($fichier_a_ouvrir);
						
						$path = "./fichier/f_champ1.txt";
					$fichier = file($path);
					
					foreach ($fichier as $num => $ligne)
						{
				
	
				if ( $ligne === "sync" ) {
							echo '<div data-alert class="alert-box alert round">
										Vous avez entrer une syntaxe incorrecte pour le champ numero de l\'appelant...
										<a href="#" class="close">&times;</a>
										</div>';
								}
			
						}

					$fichier_a_ouvrir = fopen ("./fichier/f_champ1.txt", "w+");
						fwrite($fichier_a_ouvrir,"rien");
						fclose ($fichier_a_ouvrir);
						
						
						$path = "./fichier/f_champ2.txt";
					$fichier = file($path);
					
					foreach ($fichier as $num => $ligne)
						{
				
	
				if ( $ligne === "sync" ) {
							echo '<div data-alert class="alert-box alert round">
										Vous avez entrer une syntaxe incorrecte pour le champ numero de l\'appele...
										<a href="#" class="close">&times;</a>
										</div>';
								}
			
						}

					$fichier_a_ouvrir = fopen ("./fichier/f_champ2.txt", "w+");
						fwrite($fichier_a_ouvrir,"rien");
						fclose ($fichier_a_ouvrir);
						
						
						$path = "./fichier/f_champ3.txt";
					$fichier = file($path);
					
					foreach ($fichier as $num => $ligne)
						{
				
	
				if ( $ligne === "sync" ) {
							echo '<div data-alert class="alert-box alert round">
										Vous avez entrer une syntaxe incorrecte pour le champ de la date...
										<a href="#" class="close">&times;</a>
										</div>';
								}
			
						}

					$fichier_a_ouvrir = fopen ("./fichier/f_champ3.txt", "w+");
						fwrite($fichier_a_ouvrir,"rien");
						fclose ($fichier_a_ouvrir);
						
							$path = "./fichier/f_champ4.txt";
					$fichier = file($path);
					
					foreach ($fichier as $num => $ligne)
						{
				
	
				if ( $ligne === "sync" ) {
							echo '<div data-alert class="alert-box alert round">
										Vous avez entrer une syntaxe incorrecte pour le champ de l\'heure...
										<a href="#" class="close">&times;</a>
										</div>';
								}
			
						}

					$fichier_a_ouvrir = fopen ("./fichier/f_champ4.txt", "w+");
						fwrite($fichier_a_ouvrir,"rien");
						fclose ($fichier_a_ouvrir);
						
			
						
						
						
                                  ?>								  

</div>

</div>

</div>

</div>
</div>
</div>