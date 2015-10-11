<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style='font-size:24px;'><b><i>ComShop</i></b></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php
				include ('konekcija.inc');
				echo("<ul class='nav navbar-nav'>");
				$upit1="select * from meni";
				$rez1=mysql_query($upit1,$konekcija);
				while($red1=mysql_fetch_array($rez1)){
					echo("<li><a href=index.php?page=".$red1['putanja'].">".$red1['naziv']."</a></li>");
				}
				echo("</ul>");
			?>
        </div>
        <!-- /.navbar-collapse -->
		<div class="pull-right" style='margin-top:-38px'><input type="text" name='trazi' id='trazi' style="border-radius:5px;" placeholder='Naziv proizvoda...'/>
		</div>
		<div id="rezultat" class="pull-right" style="position:absolute; right:100px; background-color:#222; color:white; border-radius:2px;">
		</div>
    </div>
    <!-- /.container -->
</nav>