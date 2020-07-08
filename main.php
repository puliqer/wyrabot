<?php
session_start();
#########################  Main Config Here  #########################

$token = '1007063839:AAGXask-4Irff_Ka6DKcCmZs3Y5JJihy3kU'; // bot token here
$bot = "WyRaBot"; // bot username here
define('TOKEN',$token);

// The main function for execute methods
function bot($method, $datas=[]){
    $url = "https://api.telegram.org/bot".TOKEN."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

include_once 'public/methods.php';

include_once 'public/api_vars.php';

include_once 'public/variables.php';

include_once 'public/commands.php';

include_once 'public/conditions.php';

include_once 'public/rps_game.php';

?>