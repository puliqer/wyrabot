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

function say($text){
    $replaced_text = str_replace("/say","",$text);
    return $replaced_text;
}


#########################  Usable String Here  #########################

if ($text == '/start') {
    sendmessage($chat_id,
        "Welcome dear {$first_name} 🐱," .PHP_EOL. 
        'add me to Chat and Have Fun.' .PHP_EOL. 
        'if you dont know how to use this bot, use /help command !' 
    );
}

if ($text == '/help') {
    sendmessage($chat_id,
        '• /help : Show the Command list with description' .PHP_EOL. 
        '• /me : Returns your Informations' .PHP_EOL. 
        '• /say <text> : Echo your text as Parameter' .PHP_EOL. 
        '• /random : Returns a random funny text' .PHP_EOL. 
        '• /gaycheck : Randomly returns your gayness by percent' .PHP_EOL. 
        '• /rps : Rock Paper Scissors game' .PHP_EOL. 
        '• /everyone : Tag all member of the Group' .PHP_EOL. 
        '• /shortlink : Make your links shorter' 
    );
}
if ($text == '/say') {
    sendmessage($chat_id,
        'Use this Command with a text !' .PHP_EOL. 
        'for example :' .PHP_EOL. 
        '/say hello' .PHP_EOL. 
        'Result :' .PHP_EOL. 
        'hello'
    );
} else {
    sendmessage($chat_id,
        'Result :' .PHP_EOL. 
        say($text));
}
?>