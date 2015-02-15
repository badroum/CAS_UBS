
 <?php
//*
if(isset($_POST['username'])&&isset($_POST['password']))
{
    $generate=true;

    $ical= str_replace("index.php","",$_SERVER['REQUEST_URI']);

    $ical=$ical."ical.php";

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
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css">

    </head>
    <!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//casbllpbds53.qsml.fr/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//casbllpbds53.qsml.fr/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
    <body>
        <div class="container">
        <div id="label-container">
            			<div id="label">
            				<p>BETA</p>
            			</div>
            		</div>
            <!-- Codrops top bar -->
            <header>
                
                <h1>Génération d'une adresse de Calendrier</h1>
            </header>
            <section>
                <div id="container" >
                    
                  <a class="hiddenanchor" id="tofaq"></a>
                  <a class="hiddenanchor" id="togenerated"></a>
                    <div id="div_form">
                    
                      <div id="generated" class="animate form">
                           <form  action="#tofaq" autocomplete="on" method="post">
                           
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
                <p class="change_link">
                  Des questions?
                  <a href="#tofaq" class="to_faq">FAQ</a>
                </p>
                            </form>

                        </div>

                        <div id="faq" class="animate form">
                          <h1>FAQ</h1>
                             <?php
                              if(isset($generate)&& $generate==true)
                              {
                                  //echo "<span class=\"url\">" . $url . "</span>";
                                  echo "<input value=".$url."/>";

                              }
                            ?>

                            <div class="accordeon">
                              <ul>
                                <li>
                                  <p class="titre">Configuration de Google Calendar</p>
                                  <div class="faq_info">
                                    Si vous n’avez pas encore de compte Google (Gmail ou autres), commencez par en créer un.<br />
                    Rendez vous ensuite sur Google Calendar.<br />
                    Sur la gauche dans l’onglet Mes agendas, vous pouvez créer un nouveau calendrier. <br />
                                  </div>
                              </li>
                              <li>
                                <p class="titre">Configuration de l'iPhone</p>
                                <div class="faq_info img">
                                  Depuis l’iPhone, allez dans Réglages:
                                  <article >
                                    <span>Cliquez sur Mail, Contacts, Calendrier, puis sur Ajouter un compte</span>
                                    <img src="images/faq/iphone/iPhone1.jpeg" alt="Mail, Contacts, Calendrier" />
                                    <span>Cliquez sur Autre</span>
                                    <img src="images/faq/iphone/iPhone2.jpeg" alt="Alternative texte de l'image" />
                                    <span>Cliquez sur Ajouté un cal avec abonnement</span>
                                    <img src="images/faq/iphone/iPhone3.jpeg" alt="Alternative texte de l'image" />
                                    <span>Rentrez l'adresse générée dans le serveur</span>
                                    <img src="images/faq/iphone/iPhone4.jpeg" alt="Alternative texte de l'image" />
                                    <span>Si une erreur intervient verifier bien que la connection SSL est desactivé</span>
                                    <img src="images/faq/iphone/iPhone5.jpeg" alt="Alternative texte de l'image" />
                                    <span>Exemple de syncronisation</span>
                                    <img src="images/faq/iphone/iPhone6.jpeg" alt="Alternative texte de l'image" />
                                    <img src="images/faq/iphone/iPhone7.jpeg" alt="Alternative texte de l'image" />
                                </div>
                            </li>
                            <li>
                              <p class="titre">Configuration d'Android</p>
                              <div class="faq_info">
                              	<span>à venir</span>
                              </div>
                          </li>
                          <li>
                            <p class="titre">Configuration de WindowsPhone</p>
                            <div class="faq_info">
                            	<span>Ça tombera certainement en marche un jour </span>
                            	<a href="http://windows.microsoft.com/fr-fr/windows/outlook/calendar-import-vs-subscribe">lien sur la doc officiel</a>
                        	</div>
                            </li>
                    </ul>
                </div>
                        <p class="change_link">
                Généré un lien.
                <a href="#togenerated" class="to_generated">Generated</a>
              </p>
                      </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
