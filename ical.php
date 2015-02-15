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
<?php include("admin/piwik.php"); ?>
