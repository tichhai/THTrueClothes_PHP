<?php 
    require __DIR__ . '/vendor/autoload.php';
    $client = new Google_Client();

    $client->setClientId("386522037035-aipn684182cu0dhj6d7pfga7q0ptpja9.apps.googleusercontent.com");
    $client->setClientSecret("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");
    $client->setRedirectUri("http://localhost/THTrueClothes/redirect.php");
    if(!isset($_GET["code"])){
        exit("Login Failed");
    }
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    var_dump($email);
?>