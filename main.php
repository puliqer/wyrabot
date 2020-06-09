<?php

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

#########################  Method List Here  #########################

// sendMessage method
function sendmessage($chat_id, $text){
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
    ]);
}
// sendPhoto method
function sendphoto($chat_id, $photo, $caption){
    bot('sendPhoto', [
        'chat_id' => $chat_id,
        'photo' => $photo,
        'caption' => $caption,
    ]);
}
// sendAudio method
function sendaudio($chat_id, $audio, $caption){
    bot('sendPhoto', [
        'chat_id' => $chat_id,
        'audio' => $audio,
        'caption' => $caption,
    ]);
}
// sendSticker method
function sendsticker($chat_id, $sticker){
    bot('sendSticker', [
        'chat_id' => $chat_id,
        'sticker' => $sticker,
    ]);
}
// sendVideo method
function sendvideo($chat_id, $video, $caption){
    bot('sendVideo', [
        'chat_id' => $chat_id,
        'video' => $video,
        'caption' => $caption,
    ]);
}

#########################  Public Variable Here  #########################

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


#########################  Public Functions Here  #########################

function startMessage($first_name){
    echo nl2br("Welcome dear {$first_name} 🐱, 
        add me to Chat and Have Fun. 
        if you dont know how to use this bot, use /help command !");
}

function helpMessage(){
    echo nl2br("• /help : Show the Command list with description
        • /me : Returns your Informations
        • /say <text> : Echo your text as Parameter
        • /random : Returns a random funny text
        • /gaycheck : Randomly returns your gayness by percent
        • /rps : Rock Paper Scissors game
        • /everyone : Tag all member of the Group
        • /shortlink : Make your links shorter");
}

function sayMessage(){
    echo nl2br("Use this Command with a text !
        for example : 
        /say hello
        Result :
        hello");
}
// /say command with argument
function say($text){
    if (strpos($text, '/say') === 0) {
    $new_text = substr($text, 5);
    echo nl2br("Result :
        $new_text");
    }
}    

#########################  Usable String Here  #########################

if ($text === '/start') {
    sendmessage($chat_id, startMessage($first_name));
}

if ($text === '/help') {
    sendmessage($chat_id, helpMessage());
}

if ($text === '/say') {
    sendmessage($chat_id, sayMessage());

} else {
    sendmessage($chat_id, say($text));
}


?>