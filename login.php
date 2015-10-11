<div id='loginbox' class="mainbox col-md-4" style="width: 293px; margin-left:-295px;margin-top:350px;" >                    
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Logovanje</div>
        </div>     
        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">
			</div>     
            <form id="loginform" class="form-horizontal" role="form" method="POST" action="index.php?page=login">       
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="korisnicko" value="" placeholder="username">
				</div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="lozinka" placeholder="password">
                </div>
                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
						<input type="submit" value="Uloguj se" name="dugme_logovanje" class="btn btn-info"/> 
                        <a id="btn-login" href="index.php?page=registracija" class="btn btn-info">Registruj se</a>
                    </div>
                </div>                  
            </form>     
        </div>                     
    </div>  
</div>
<?php
if(isset($_POST['dugme_logovanje'])){
	include('konekcija.inc');
	$username=trim($_POST['korisnicko']);
	$password=md5(trim($_POST['lozinka']));
	
	$greske=array();
	
	$reg_username="/^[a-z0-9\_]+$/";
	$reg_password="/[^\/.,<>:;*?A-Z]$/";	
	
	if(!preg_match($reg_username,$username)){
		$greske[]="Za username se mogu koristiti samo mala slova, brojevi i _ !!!";
	}
	
	if(!preg_match($reg_password,$password)){
		$greske[]="Za lozinku se mogu koristiti samo mala slova i brojevi !!!";
	}
	
	if(count($greske)==0){
		$status=1;
		$upit="select * from korisnici where korisnicko_ime='".$username."' and lozinka='".$password."' and status='".$status."'";
		$rezultat=mysql_query($upit,$konekcija);
		if(mysql_num_rows($rezultat)==1){
			$red=mysql_fetch_array($rezultat);
			$uloga=$red['uloga'];
			$username=$red['korisnicko_ime'];
			$id_kor=$red['id_korisnika'];
			$ime=$red['ime'];
			$prezime=$red['prezime'];
			$mail=$red['email'];			
			$_SESSION['email']=$mail;
			$_SESSION['uloga']=$uloga;
			$_SESSION['korisnicko_ime']=$username;
			$_SESSION['ime']=$ime;
			$_SESSION['prezime']=$prezime;
			$_SESSION['id_korisnika']=$id_kor;	
			switch($red['uloga']){
				case 'admin': ?>
					<script type="text/javascript">
						window.location.assign("admin.php");
					</script>
				<?php break;
				case 'korisnik': ?>
					<script type="text/javascript">
						window.location.assign("index.php");
					</script>	
				<?php break;				
			}
		}
		else{
			echo("U bazi ne postoji korisnik sa ovim nalogom!");
		}
	}
}
?>