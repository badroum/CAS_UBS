<?php
//initialisation de l'environement
set_time_limit(0);
//====configuration des variable====//
$firstDate="2014-08-31";
$lastDate="2015-08-31";
$url = "https://cas.univ-ubs.fr";
$url_cas = "https://cas.univ-ubs.fr/login";
$url_was = "https://was.univ-ubs.fr/ade/custom/modules/plannings/direct_cal.jsp";
//$url_was_param = "?calType=ical&firstDate=2014-08-31&lastDate=2015-08-31&projectId=1&resources=";
$url_was_param = "?calType=ical&firstDate=".$firstDate."&lastDate=". $lastDate . "&projectId=1&resources=";
$url_was_resources = "https://was.univ-ubs.fr/ade/custom/myplanning/myPlanning.jsp";

//$url_was_resources = "https://was.univ-ubs.fr/ade/custom/standard/direct_planning.jsp?showTree=true&showPianoDays=true&showPianoWeeks=true&displayConfName=web&code=06V,912,icyb02,ville=vannes&top=top.planning";

//création du ficher cookie
$path_cookie = 'cas_cookie.txt';
$path_cookie_was = 'was_cookie.txt';
if (!file_exists(realpath($path_cookie))) touch($path_cookie);
if (!file_exists(realpath($path_cookie_was))) touch($path_cookie_was);
?>