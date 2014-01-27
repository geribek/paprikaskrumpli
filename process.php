<?php
//RegExp szűrő az e-mailek kiszedésére
$filter="/address='([\w\d.-_]+@[\w\d.-_]+)'/";
//Query URL, felépítése: alapcím?max-results=[maximum kiadandó kontaktok]&access_token=[előző fázisban, javascripttal megkapott hitelesítő kulcs]
$url='https://www.google.com/m8/feeds/contacts/default/full?max-results=10000&access_token='.$_GET['accesstoken'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Bumm
$return=curl_exec($ch);
curl_close($ch);
//Végeredmény szétcincálása emailcímekre
preg_match_all($filter,$return,$emails);
//Json formában visszadás
echo json_encode($emails[1]);
?>
