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

include_once 'methods.php';

include_once 'api_vars.php';


#########################  Public Variables Here  #########################

// rps section
// sent text form user for rps game
// sent one of the three possible response
$a = ['Rock', 'Paper', 'Scissors'];
$rps = array_rand($a);

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

Reply 'rock.me', 'paper.me' and 'scissors.me' and And wait for luck.
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

    case "!rock":
        sendmessage($chat_id, "My Side :
        $a[$rps]");
        $match_saver = "Rock";    
    break;

    case "!paper":
        sendmessage($chat_id, "My Side :
        $a[$rps]");
        $match_saver = "Paper";
    break;   

    case "!scissors":
        sendmessage($chat_id, "My Side :
        $a[$rps]");
        $match_saver = "Scissors";    
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

// winner checker with monitoring the scores section


if ($_SESSION['user'] == 3) {
    sendmessage($chat_id, "DONE.
    🎉 We have a Winner now, Congratulate! {$username}, you win 🎉
    Socreboard :
    My Score : {$_SESSION['bot']}
    {$username} Score : {$_SESSION['user']}.
    for start a new game use /rps command !");

    $_SESSION['user'] = 0;
    $_SESSION['bot'] = 0;
}

if ($_SESSION['bot'] == 3) {
    sendmessage($chat_id, "Hahaha...
    😎 You Lose but try again! {$username}, im waiting, come here and kiss my hand 😎
    Socreboard :
    My Score : {$_SESSION['bot']}
    {$username} Score : {$_SESSION['user']}.
    for start a new game use /rps command !");

    $_SESSION['user'] = 0;
    $_SESSION['bot'] = 0;
}



// action to !rock with 3 possible response

if ($a[$rps] == 'Rock' && $text == '!rock') {
    sendmessage($chat_id, "oh yes roooooock , some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}
    ");
}

if ($a[$rps] == 'Paper' && $text == '!rock') {
    $_SESSION['bot'] += 1;
    sendmessage($chat_id, "oh yes Papeeeeeeer , some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}");
}

if ($a[$rps] == 'Scissors' && $text == '!rock') {
    $_SESSION['user'] += 1;
    sendmessage($chat_id, "oh yes Scscscscs , some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}");
}


// action to !paper with 3 possible response

if ($a[$rps] == 'Rock' && $text == '!paper') {
    $_SESSION['user'] += 1;
    sendmessage($chat_id, "oh yes Rooooock, some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}");
}


if ($a[$rps] == 'Paper' && $text == '!paper') {
    sendmessage($chat_id, "oh yes PApapaer , some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}");
}

if ($a[$rps] == 'Scissors' && $text == '!paper') {
    $_SESSION['bot'] += 1;
    sendmessage($chat_id, "oh yes Scscscscs , some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}");
}


// action to !scissors with 3 possible response


if ($a[$rps] == 'Rock' && $text == '!scissors') {
    $_SESSION['bot'] += 1;
    sendmessage($chat_id, "oh yes Roooooock , some is :
    Me : {$_SESSION['bot']} 
    You : {$_SESSION['user']}");
}


if ($a[$rps] == 'Paper' && $text == '!scissors') {
    $_SESSION['user'] += 1;
    sendmessage($chat_id, "oh yes Ppapaer , some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}");
}

if ($a[$rps] == 'Scissors' && $text == '!scissors') {
    sendmessage($chat_id, "oh yes scscscscs , some is :
    Me : {$_SESSION['bot']},
    You : {$_SESSION['user']}");
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