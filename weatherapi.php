<?php
$city = $_POST['city'];
$fulladdr = $_POST['fulladdr'];
session_start();
$_SESSION['city'] =  $city;
$_SESSION['fulladdr'] = $fulladdr;
/*
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
*/
$key = 'af1d7670685d4b8389723009161212';

$url = "https://api.apixu.com/v1/current.json?key=$key&q=$city";
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$json_output=curl_exec($ch);
$weather = json_decode($json_output);

$return = array("City: ".$city,"Temperature: ". $weather->current->temp_c,"Condition:".$weather->current->condition->text."<br><img src='".$weather->current->condition->icon."'>");
echo json_encode($return);
?>
