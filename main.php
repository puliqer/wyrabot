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
// leaveChat method
function leavechat($chat_id){
    bot('sendVideo', [
        'chat_id' => $chat_id,
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

// rps section
// sent text form user for rps game
$rps_user = $text;
// sent one of the three possible response
$a = ['Rock', 'Paper', 'Scissors'];
$rps = array_rand($a);
echo $a[$rps]."<br>";

// setting the score form 0
$rps_user_score = 0;
$rps_bot_score = 0;

// random section
$random_array = [
    '/help is not for decor 😡',
    'Bekiram in Perian = i love you',
    'I know you are such an asshole but you dont want that other know about it',
    'use /time to see the world clock!',
];

$randomer = array_rand($random_array);
echo $random_array[$randomer]."<br>";

$gayrand = rand(0, 100);

#########################  Usable String Here  #########################

// a simple switch for simple command with simple message
switch ($text) {

    case "/start":
    sendmessage($chat_id, "Welcome dear {$first_name} 🐱, 
add me to Chat and Have Fun. 
if you dont know how to use this bot, use /help command !");
    break;


    case "/help":
    sendmessage($chat_id, "• /help : Show the Command list with description
• /about : show an information about the bot and developer
• /me : Returns your Informations
• /say <text> : Echo your text as Parameter
• /random : Returns a random funny text
• /gaycheck : Randomly returns your gayness by percent
• /rps : Rock Paper Scissors game
• /everyone : Tag all member of the Group
• /shortlink : Make your links shorter");
    break;


// /say command without argument
    case "/say":
        sendmessage($chat_id, "Use this Command with a text !
for example : 
/say hello
Result :
hello");
    break;


    case "/me":
        sendmessage($chat_id, "Your Information :
Firstname : {$first_name}
Lastname : {$last_name}
Username : @{$username}
User ID : {$user_id}");
    break;


    case "/gaycheck":
        sendmessage($chat_id, "🏳️‍🌈 {$first_name} is {$gayrand}% Gay 🏳️‍🌈");
    break;

    case "/rps":
        sendmessage($chat_id, "Well well. Game time 🎮
as you know this is RPS ( Rock Paper Scissors ). In this game, we have three rounds.
and whoever gets more points at the end of these three rounds will be the winner.

Reply '/rock', '/paper' and '/scissors' and And wait for luck.
Lets Start 😈");
    break;

    case "/time":
        sendmessage($chat_id, "You suck, we dont have /time 😅");
    break;

    case "/getout":
        sendmessage($chat_id, "Ok, Its time to say goodbye !");
        leavechat($chat_id);
    break;

    case "/about":
        sendmessage($chat_id, "Hello, this is WyRa.
a funny multipurpose telegram bot.
        
a Damn bot by @Gogilo based on v1.0.1");
    break;

    case "/random":
        sendmessage($chat_id, "echo $random_array[$randomer]");
    break;

    case "/tag":
        sendmessage($chat_id, "{$username}, your tag is '$tag'");
    break;

    default:
    echo nl2br("Invalid Command !
        if you dont know how to use this bot,
        you can use /help command and check command list !
        ");
}

#########################  Conditions  #########################


// /say command with argument
if (strpos($text, '/say') === 0) {
    $new_text = substr($text, 5);
    sendmessage($chat_id, "**Echo** : 
$new_text");
} else {
    die("Please inter valid value with /say [argument]");
}

if ($rps_user_score == 3) {
    sendmessage($chat_id, "DONE.
🎉 We have a Winner now, Congratulate! {$username}, you win 🎉
Socreboard :
My Score : {$rps_bot_score}
{$username} Score : {$rps_user_score}");
}

if ($rps_bot_score == 3) {
    sendmessage($chat_id, "Hahaha...
    😎 You Lose but try again! {$username}, im waiting, come here and kiss my hand 😎
    Socreboard :
    My Score : {$rps_bot_score}
    {$username} Score : {$rps_user_score}");
}
// action to /rock with 3 possible response
if ($rps_user === '/rock') {
    sendmessage($chat_id, "echo $a[$rps]");

        if ($a[$rps] === 'Rock') {
            sendmessage($chat_id, "Ops!
This round has a draw result!
lets see next Chance.");

        } elseif ($a[$rps] === 'Paper') {
            $rps_bot_score += 1;
            sendmessage($chat_id, "Now lets check the Scores!
Your Score is : {$user_score}
and My Score is : {$bot_socre}");

        } elseif ($a[$rps] === 'Scissors') {
            $rps_user_score += 1;
            sendmessage($chat_id, "Now lets check the Scores!
Your Score is : {$user_score}
and My Score is : {$bot_socre}");
        }
}
// action to /pepar with 3 possible response
if ($text === "/paper") {
    sendmessage($chat_id, "echo $a[$rps]");

        if ($a[$rps] === 'Rock') {
            $rps_user_score += 1;
            sendmessage($chat_id, "Now lets check the Scores!
Your Score is : {$user_score}
and My Score is : {$bot_socre}"); 

        } elseif ($a[$rps] === 'Paper') {
            sendmessage($chat_id, "Ops!
This round has a draw result!
lets see next Chance.");

        } elseif ($a[$rps] === 'Scissors') {
            $rps_bot_score += 1;
            sendmessage($chat_id, "Now lets check the Scores!
Your Score is : {$user_score}
and My Score is : {$bot_socre}");
        }
}
// action to /scissors with 3 possible response
if ($rps_user === '/scissors') {
    sendmessage($chat_id, randomRPS($rps_bot));

        if (randomRPS($rps_bot) === 'Rock') {
            $rps_bot_score += 1;
            sendmessage($chat_id, "Now lets check the Scores!
Your Score is : {$user_score}
and My Score is : {$bot_socre}");

        } elseif (randomRPS($rps_bot) === 'Paper') {
            $rps_user_score += 1;
            sendmessage($chat_id, "Now lets check the Scores!
Your Score is : {$user_score}
and My Score is : {$bot_socre}");

        } elseif (randomRPS($rps_bot) === 'Scissors') {
            sendmessage($chat_id, "Ops!
This round has a draw result!
lets see next Chance.");
        }
}

// /tag command with argument
if (strpos($text, '/tag') === 0) {
    $tag = substr($text, 5);
    sendmessage($chat_id, "{$username} tag changed to '{$tag}'.
    send /tag to see your tag name!");
} else {
    die("Please inter valid value with /tag [argument]");
}

?>