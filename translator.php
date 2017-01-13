<?php
session_start();
$text = $_POST['text'];
$lang = $_SESSION['lang'];
$prevlang = 'en';
/*$text = 'Hello';
$lang = 'es';
$prevlang = 'en';
*/
if($prevlang != $lang&&lang!=null){
$username = "cff66ee8-d43f-4ce2-9464-41ca94be78a6";
$password = "w4GlPFXEoluu";
$params = ['source'=>$prevlang,'target'=>$lang,'text'=>$text];
$defaults = array(
    CURLOPT_URL => 'https://gateway.watsonplatform.net/language-translator/api',
    CURLOPT_USERPWD => "$username:$password",
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch,$defaults);
if( ($postResult = curl_exec($ch))!=null){
    $result = file_get_contents($ch);
    echo json_encode($result);
}else{
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
curl_close($ch);
}else{
    echo json_encode($text);
}
?>
