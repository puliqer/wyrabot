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

#########################  Other Config for editing the messages  #########################

function send_reply($url, $post_params) {

    $cu = curl_init();
    curl_setopt($cu, CURLOPT_URL, $url);
    curl_setopt($cu, CURLOPT_POSTFIELDS, $post_params);
    curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);  // get result
    $result = curl_exec($cu);
    curl_close($cu);
    return $result;
}

#########################  Bot api Variables Here  #########################

$main = json_decode(file_get_contents('php://input')); // getting data from user
var_dump($update);
$update_id = $main->update_id; // getting the update id
$message = $main->message; // getting the message full data
$message_id = $message->message_id; // getting the message id
$from_id = $message->from->id; // getting the user id 
$chat_id = $message->chat->id; // getting the user id in chat
$textid = $message->text->id; // getting the sent text id from user
$text = $message->text; // getting the sent text
$date = $message->date; // getting the date of sent message

$first_name = $message->from->first_name; // getting the first name of user
$last_name = $message->from->last_name; // getting the last name of user
$username = $message->from->username; // getting the username of user
$user_id = $message->from->id;


include_once 'public/methods.php';

include_once 'public/variables.php';

include_once 'public/commands.php';

include_once 'public/conditions.php';

include_once 'public/rps_game.php';

?>