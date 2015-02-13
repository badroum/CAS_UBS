<?php
//*
if(isset($_POST['username'])&&isset($_POST['password']))
{
    $generate=true;
    if( strstr("index.php",$_SERVER['REQUEST_URI']))
    {
		$ical= str_replace("index.php","ical.php",$_SERVER['REQUEST_URI']);
    }
    else
    {
		$ical=$_SERVER['REQUEST_URI']."ical.php";
        
    }
    $tmp_Array = $_POST['resources'];

	$multipl_result="";
    foreach ($tmp_Array as $index => $tmp)
    {
        $multipl_result = $multipl_result. "&resource" . $index . "=" . $tmp;
    }





    $url = dirname($_SERVER['SERVER_PROTOCOL']) . "://" . $_SERVER['HTTP_HOST'].$ical . 
"?username=" . $_POST['username'] ."&password=" .$_POST['password'] . $multipl_result;


}
//*/
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="fr" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="fr" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="fr" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="fr" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="fr" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Generated a url for a ubs ical" />
        <meta name="keywords" content="ensibs,ical,calendar,ubs" />
        <meta name="author" content="Dufee-j" />
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <header>
                <h1>Génération d'une adresse de Calendrier</h1>
			</header>
            <section>
                <div id="container" >
                    <div id="div_form">
                        <div id="login" class="animate form">
                        <?php
                            if(isset($generate)&& $generate==true)
                            {
                                echo "<span class=\"url\">" . $url . "</span>";
                            }
                            else
                            {
                            ?>
                            <form  action="#" autocomplete="on" method="post">
                                <h1>Information</h1>
                                <p>
                                    <label for="username" class="uname info" data-icon="u" >
										Votre identifiant ubs 
										<span>Rentrez votre identifiant ubs sous la forme e1234567</span>
									</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="identifiant ubs"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd  info" data-icon="p">
										Votre mots de passe 
										<span>Rentrez votre mots de passe ubs</span>
									</label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg.X8df!90EO" />
                                </p>
                                <p class="resource">
									<label for="resources[]" class="youresource info"> 
										Votre / Vos formation 
										<span>Sélectionner votre ou vos formation. C'est un champ à sélection multiple, maintenez Ctrl pour sélectionné plusieurs champs</span>
									</label>
									<SELECT NAME="resources[]" MULTIPLE SIZE=6 required="required">
										<?php
										require('function.php');
										$resources = SetResources();
										foreach ($resources as $index => $tmp)
										{
											echo "<OPTION VALUE=" . $tmp . ">" . $index . "</option><br />";
										}
										?>
									</SELECT>
								</p>
								<p class="login button">
                                    <input type="submit" value="Generated" />
								</p>
                            </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
