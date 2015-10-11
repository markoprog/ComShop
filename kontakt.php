<script type="text/javascript">
	function provera(){
		var ime=document.getElementById("ime").value;
		var mail = document.getElementById("email").value;
		var poruka= document.getElementById("poruka").value;
		
		var reg_ime=/^[A-Z][a-z]{1,14}$/;
		var reg_mail=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
		
		var provera=true;
		
		if(!reg_ime.test(ime)){
			document.getElementById('ime').style.borderColor="#ff0000";
			provera=false;
		}
		
		if(!reg_mail.test(mail)){
			document.getElementById('email').style.borderColor="#ff0000";
			provera=false;
		}
		
		if(poruka==''){
			document.getElementById('poruka').style.borderColor="#ff0000";
			provera=false;
		}
		return provera;
	}
</script>
<!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.2921228305345!2d20.45916480000001!3d44.81561310000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7ab261fd751d%3A0xdbc9cb319522166f!2zMzIg0J7QsdC40LvQuNGb0LXQsiDQstC10L3QsNGGLCDQkdC10L7Qs9GA0LDQtA!5e0!3m2!1ssr!2srs!4v1432403977954" width="600" height="450" frameborder="0" style="border:0"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
			<br/><br/><br/><br/>
			<span class='formular_slova'>Adresa:</span><span style='color:#337ab7; font-size:14px;  font-style:italic;'> Obilićev venac 32</span> <br/><br/>
			<span class='formular_slova'>Mob:</span><span style='color:#337ab7; font-size:14px;  font-style:italic;'> +38166000000</span> <br/><br/>
			<span class='formular_slova'>Fix:</span><span style='color:#337ab7; font-size:14px;  font-style:italic;'> 011887000</span> <br/><br/>
			<span class='formular_slova'>Fax:</span><span style='color:#337ab7; font-size:14px;  font-style:italic;'> 0118870000</span> <br/><br/>
			<span class='formular_slova'>E-mail:</span><span style='color:#337ab7; font-size:14px;  font-style:italic;'> comshop@gmail.com</span> <br/><br/>
        </div>
    </div>
    <!-- /.row -->
    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
        <div class="col-md-8">
            <h4>Ako imate bilo kakve primedbe, sugestije i pohvale pišite nam!</h4>
                <form name="sentMessage" id="contactForm"  method="Post" action="index.php?page=kontakt" onSubmit="return provera();">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Ime:</label>
                            <input type="text" class="form-control" id="ime" name="ime" required data-validation-required-message="Unesite vase ime.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>E-mail adresa:</label>
                            <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Unesite email.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Tekst poruke:</label>
                            <textarea rows="10" cols="100" class="form-control" id="poruka" required data-validation-required-message="Unesite poruku." maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
					<input type="submit" name='submit' id='posalji' class="btn btn-info" value="Pošalji poruku" onClick="provera();"/> 
                </form>
            </div>
    </div>
	<?php
		if(isset($_POST['posalji'])){
			$ime=$_POST['ime'];
			$mail=$_POST['email'];
			$poruka=$_POST['poruka'];
				
			$reg_ime="/^[A-Z][a-z]{1,14}$/";
			$reg_mail="/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/";
			
			$greske=array();	
					
			if(!preg_match($reg_ime,$ime)){
				$greske[]="Greška!";
			}
			
			if(!preg_match($reg_mail,$mail)){
				$greske[]="Greška!";
			}
			
			if($poruka==''){
				$greske[]="Greška!";
			}
			
			if(count($greske)>0){
				print "<ul style='color:red;'>";
				foreach($greske as $greska){
					print "<li>".$greska."</li>";
				}
				print "</ul>";
			}
			else{
				mail('comshop@gmail.com','Poruka sa sajta',$poruka,$mail);
			}
		}
	?>