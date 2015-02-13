<?php
/*
function GetRes($user,$pwd)
{
	require('config.php');   
	//echo "function GetRes";
	//echo $url_was_resources;
	$curl = curl_init($url_was_resources);
	//option curl
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//recevoir le résultat du transfert au lieu de l'afficher
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // autorisation des redirections
	curl_setopt($curl, CURLOPT_COOKIESESSION, true);//démarrer un nouveau cookie session
	curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($path_cookie_was));
	curl_setopt($curl, CURLOPT_COOKIEFILE, realpath($path_cookie_was));
	$return = curl_exec($curl);//La variable $return a alors récupéré la source de la page distante.
	//curl_close($curl);//ferme la session curl
	//echo $return;

	//déclaration des variable a envoyer
	$postfields = array();
	$postfields["username"] = $user;
	$postfields["password"] = $pwd;
	$postfields["lt"] = "";
	$postfields["execution"] = "";
	$postfields["_eventId"] ="submit";
	$postfields["submit"] = "SE CONNECTER";
	//matche les input hidden obligatoire
	$re_lt = "/name=\"lt\" value=\"(.*)\"/"; 
	preg_match($re_lt, $return, $matche_lt);
	$postfields["lt"] =$matche_lt[1];
	$re_exec = "/name=\"execution\" value=\"(.*)\"/";  
	preg_match($re_exec, $return, $matche_exec);
	$postfields["execution"] =$matche_exec[1];
	$re_action = "/action=\"(.*)\" method=\"post\"/";  
	preg_match($re_action, $return, $matche_action);

	foreach ($postfields as $index => $tmp)
	{
		echo '|' . $index . '=' . $tmp . "|<br />";
	}
	
	//$curl = curl_init();
	
	curl_setopt($curl, CURLOPT_URL,$url.$matche_action[1]);
	curl_setopt($curl, CURLOPT_COOKIESESSION, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // autorisation des redirections
	curl_setopt($curl, CURLOPT_POST, 1);// la fonction fait un HTTP POST
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postfields));
	curl_setopt($curl, CURLOPT_COOKIEFILE, realpath($path_cookie_was));

	$result = curl_exec($curl);
	curl_close($curl);//ferme la session curl

	$option = array();
	$option["projectId"] = "1";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL,$url_was_resources);
	curl_setopt($curl, CURLOPT_COOKIESESSION, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // autorisation des redirections
	curl_setopt($curl, CURLOPT_POST, 1);// la fonction fait un HTTP POST
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($option));
	curl_setopt($curl, CURLOPT_COOKIEFILE, realpath($path_cookie_was));

	curl_close($curl);//ferme la session curl
	//echo "result=" . $result;
	return $result;

}
	//*/
function GetCal($user,$pwd, $resource)
{
	require('config.php');
	//init curl
	$curl = curl_init($url_was.$url_was_param.$resource);

	//option curl
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//recevoir le résultat du transfert au lieu de l'afficher
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // autorisation des redirections
	curl_setopt($curl, CURLOPT_COOKIESESSION, true);//démarrer un nouveau cookie session
	curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($path_cookie));
	curl_setopt($curl, CURLOPT_COOKIEFILE, realpath($path_cookie));

	$return = curl_exec($curl);//La variable $return a alors récupéré la source de la page distante.

	//déclaration des variable a envoyer
	$postfields = array();
	$postfields["username"] = $user;
	$postfields["password"] = $pwd;
	$postfields["lt"] = "";
	$postfields["execution"] = "";
	$postfields["_eventId"] ="submit";
	$postfields["submit"] = "SE CONNECTER";

	//matche les input hidden obligatoire
	$re_lt = "/name=\"lt\" value=\"(.*)\"/"; 
	preg_match($re_lt, $return, $matche_lt);
	$postfields["lt"] =$matche_lt[1];
	$re_exec = "/name=\"execution\" value=\"(.*)\"/";  
	preg_match($re_exec, $return, $matche_exec);
	$postfields["execution"] =$matche_exec[1];
	$re_action = "/action=\"(.*)\" method=\"post\"/";  
	preg_match($re_action, $return, $matche_action);

	//$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL,$url.$matche_action[1]);//recherche l'autentification avec le ticket de la première demande
	curl_setopt($curl, CURLOPT_COOKIESESSION, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // autorisation des redirections
	curl_setopt($curl, CURLOPT_POST, 1);// la fonction fait un HTTP POST
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postfields));
	curl_setopt($curl, CURLOPT_COOKIEFILE, realpath($path_cookie));

	$result = curl_exec($curl);

	curl_close($curl);//ferme la session curl
	return $result;
}

function SetResources()
{
	$re_resources = "/check\\((.*), 'true'\\);\\\">(.*)<\\/a>/"; 
	$files = file_get_contents('resources.txt');
	preg_match_all($re_resources,$files,$matches);
	for($i=1;$i<count($matches[0]);$i++)
	{
		$resources[$matches[2][$i]]=$matches[1][$i];
	}
	return $resources;
}

?>