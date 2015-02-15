 <?php
// Log les accès pour voir la charge générée
$log = fopen('ical_access.log', 'a');
fwrite($log, 'date='.date("Y-m-d H:i:s").' \\\\ ip='.$_SERVER['REMOTE_ADDR'].' \\\\ '.$_SERVER['HTTP_USER_AGENT']."\r\n");
fclose($log);
require('function.php');
$i=0;
while(isset($_GET['resource' . $i]))
{
    $ical = $ical . GetCal(htmlspecialchars($_GET['username']),htmlspecialchars($_GET['password']),htmlspecialchars($_GET['resource'. $i]));
    $i++;
}
str_replace("/(END:VCALENDA.*ORIAN)/s",'',$ical);
header('Content-Type: text/calendar;charset=UTF-8');
header("Content-disposition: attachment; filename=\"ENSIBS.ics\"");
echo $ical;
?>
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
