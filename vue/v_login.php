
    <div class="row">
	 <div class="twelve columns text-center"><br />
  <img class="th" data-interchange="[./vue/img/logofinal.png, (default)]">
		</div>
    </div>

    <div class="row">
    <div align="center"><h2>Connexion</h2></div>
	   <div align="center"><h2>&laquo;Module OpenCall&raquo; </h2></div>
       <br />
	   
	   <?php
					$path = "./fichier/f_connect.txt";
					$fichier = file($path);
					foreach ($fichier as $num => $ligne)
						{
				
				if ( $ligne === "vide" ) {
     				echo '<div class="medium-6 medium-centered large-centered large-6 columns"><div data-alert class="alert-box alert round">
										Login n\'existe pas dans la base de donnée.
										<a href="#" class="close">&times;</a>
										</div></div>';
								}
				if ( $ligne === "pass" ) {
							echo '<div class="medium-6 medium-centered large-centered large-6 columns"><div data-alert class="alert-box warning round">
										Login ou Mot de passe incorrect.
										<a href="#" class="close">&times;</a>
										</div></div>';
								}
			
						}

					$fichier_a_ouvrir = fopen ("./fichier/f_connect.txt", "w+");
						fwrite($fichier_a_ouvrir,"rien");
						fclose ($fichier_a_ouvrir);
                                  ?>
								  
       <div class="medium-6 medium-centered large-centered large-6 columns">
     <form data-abide action="index.php?menu=connect" method="post">
          <div class="name-field">
          <label>Login</label>
          <input name="login_wait_name" type="text" required>
          <small class="error" data-error-message="">Login obligatoire.</small>
          </div>
         

           <label for="password">Password</label>
           <input id="password" type="password" required name="login_wait_pass">
           <small class="error" data-error-message="">Mot de passe obligatoire.</small>


           
     

          <br />         
          <button type="submit" class="button [tiny small large]">Connexion</button>
          <br />
          
      </form>
      </div>
</div>
    


