<?php

    function lastfm() {
        $api_key = "7637822e4c2aad625bd05b86a1a28c56";
        $val = $_GET['val'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,
        "http://ws.audioscrobbler.com/2.0/?method=album.search&album=".$val."&api_key=".$api_key."&format=json"
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
                
        echo $result;
        curl_close($curl);
    }

    function spotify() {
        $id = '2ac7e9d0250e43039d633b6ad4162172'; 
        $secret = '6fea43cd69ce45d09d5c29ef66f55ed5'; 
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($id.':'.$secret))); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);    
        $val = urldecode($_GET['val']);
        $url = 'https://api.spotify.com/v1/search?type=album&q='.$val;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
        $result=curl_exec($ch);
        curl_close($ch);
    
        echo $result;
    }
    

   if (isset($_GET['service']) && $_GET['service'] == '1') {
        lastfm();
   } else if (isset($_GET['service']) && $_GET['service'] == '2') {
        spotify();
   }
    else echo ("Accesso non consentito");



?>