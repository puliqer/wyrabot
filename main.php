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

#########################  Public Variables Here  #########################

$rps_user = $text;

$a = ['Rock', 'Paper', 'Scissors'];
$rps_bot = array_rand($a);

$rps_user_score = 0;
$rps_bot_score = 0;

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
    $new_text = substr($text, 5);
    echo nl2br("Result :
        $new_text");
}    

function meMesaage($first_name, $last_name = null, $username, $user_id){
    echo nl2br("Your Information :
        Firstname : {$first_name}
        Lastname : {$last_name}
        Username : @{$username}
        User ID : {$user_id}
        ");
}

function gaycheck($first_name){
    $rand = rand(0, 100);
    echo "🏳️‍🌈 {$first_name} is {$rand}% Gay 🏳️‍🌈";
}

function rpsMessage(){
    echo nl2br("Well well. Game time 🎮
        as you know this is RPS ( Rock Paper Scissors ). In this game, we have three rounds.
        and whoever gets more points at the end of these three rounds will be the winner.

        Reply 'rock', 'paper' and 'scissors' and And wait for luck.

        Lets Start 😈
        ");
}

function randomRPS($random){
    echo nl2br("{$random}");
}

function scoreRPS($user_score, $bot_socre){
    echo nl2br("Now lets check the Scores!
    Your Score is : {$user_score}
    and My Score is : {$bot_socre}");
}

function drawRPS(){
    echo nl2br("Ops!
    This round has a draw result!
    lets see next Chance.");
}

#########################  Usable String Here  #########################

// a simple switch for simple command with simple message
switch ($text) {
    case "/start":
    sendmessage($chat_id, startMessage($first_name));
    break;

    case "/help":
    sendmessage($chat_id, helpMessage());
    break;
// /say command without argument
    case "/say":
        sendmessage($chat_id, sayMessage());
    break;

    case "/me":
        sendmessage($chat_id, meMesaage($first_name, $last_name, $username, $user_id));
    break;

    case "/gaycheck":
        sendmessage($chat_id, gaycheck($first_name));
    break;

    case "/rps":
        sendmessage($chat_id, rpsMessage());
    break;

    default:
    echo nl2br("Invalid Command !
        if you dont know how to use this bot,
        you can use /help command and check command list !
        ");
}

// /say command with argument
if (strpos($text, '/say') === 0) {
    sendmessage($chat_id, say($text));
}
if ($rps_user === '/rock') {
    sendmessage($chat_id, randomRPS($rps_bot));

        if (randomRPS($rps_bot) === 'Rock') {
            sendmessage($chat_id, drawRPS());

        } elseif (randomRPS($rps_bot) === 'Paper') {
            $rps_bot_score += 1;
            sendmessage($chat_id, scoreRPS($rps_user_score, $rps_bot_score));

        } elseif (randomRPS($rps_bot) === 'Scissors') {
            $rps_bot_score += 1;
            sendmessage($chat_id, scoreRPS($rps_user_score, $rps_bot_score)); 
        }
}
?>