<?php

/*curl -u "{username}":"{password}" "https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2016-05-19&text=A%20word%20is%20dead%20when%20it%20is%20said,%20some%20say.%20Emily%20Dickinson"
*/
$text = $_POST['text'];
$text = urlencode($text);
$username = "aae7697b-3ffa-4b5f-9cd9-24ea65720e4e";
$password = "E03IT2NglRD5";
$header = ["Content-Type: application/json"];
//$params = ['version'=>'2016-05-19','text'=>'A%20word%20is%20dead%20when%20it%20is%20said,%20some%20say.%20Emily%20Dickinson'];
$defaults = array(
    CURLOPT_URL => "https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2016-05-19&text=".$text,
    CURLOPT_USERPWD => "$username:$password",
    CURLOPT_GET => true,
  //  CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch,$defaults);
if( ($postResult = curl_exec($ch))!=null){
    $result = file_get_contents($ch);

    $anger = $result["document_tone"]["tone_categories"];
    echo "<br><br>THIS<br><br>";
    echo $anger;

}else{
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
curl_close($ch);

?>
