<?php
//This gist is part of a video tutorial at https://youtu.be/TSWVm9VO-_U
require_once 'restclient.php';
$url = "https://api.github.com/users/";
$api = new RestClient([
    'base_url' => $url, 
    'format' => "json" 
]);
$result = $api->get("kamransyed");
echo "<pre>";
if($result->info->http_code == 200){
    print_r($result->decode_response());
	
}else{
	print_r($result);
}
?>