<?php
session_start();
#########################  Main Config Here  #########################

$token = '1007063839:AAF4JA2vEbTzg8NSCZpQnSRr9gjytsCcnkk'; // bot token here (this is old token)
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

$inline_query = $main->inline_query->query;
$inline_query_id = $main->inline_query->id;


#########################  Inline Methods  #########################

random_inline($inline_query, $inline_query_id);
function random_inline($inline_query, $inline_query_id) {

    switch($inline_query) {        
        case "gay" :
            $gayrand = rand(0, 100);
            $reply = "🏳️‍🌈 Wow i am {$gayrand}% Gay 🏳️‍🌈";
        break;
    }
    $result = [
                        [
                            'type' => "article",
                            'id' => "1",
                            'title' => "🏳️‍🌈 How gay your are 🏳️‍🌈",
                            'description' => "with this command check your gayness easy !",
                            'input_message_content' => [ 'message_text' => "$reply" ],
                        ]
                    ];
                
    $json_result = json_encode($result);

    bot('answerInlineQuery', [
        'inline_query_id' => $inline_query_id , 
        'results' => $json_result ,
    ]);
}

#########################  Public Variables Here  #########################

// rps section
// sent text form user for rps game
// sent one of the three possible response
$a = ['Rock', 'Paper', 'Scissors'];
$rps = array_rand($a);

// random section
$random_array = [
    '/help is not for decor 😡',
    'Not Funny',
    'I know you are such an asshole but you dont want that other know about it',
    'use /time to see the world clock!',
];

$randomer = array_rand($random_array);

$gayrand = rand(0, 100);

#########################  Gaycheck command (New Edition)  #########################

if (strpos($text, '/gaycheck') === 0) {
    $reply = "Calculating ...";
    $url = "https://api.telegram.org/bot1007063839:AAF4JA2vEbTzg8NSCZpQnSRr9gjytsCcnkk" . "/sendMessage";
    $post_params = [ 'chat_id' => $chat_id , 'text' => $reply ];
 
    $result = send_reply($url, $post_params);
    $result_array = json_decode($result, true);
    $msg_id  = $result_array["result"]["message_id"];
 
    sleep(3);
 
    $reply = "🏳️‍🌈 {$first_name} is {$gayrand}% Gay 🏳️‍🌈";
    $url = "https://api.telegram.org/bot1007063839:AAF4JA2vEbTzg8NSCZpQnSRr9gjytsCcnkk" . "/editMessageText";
    $post_params = [ 'chat_id' => $chat_id , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);
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

// editMessage method
function editmessage($chat_id, $text){
    bot('editMessageText', [
        'chat_id' => $chat_id,
        'text' => $text,
    ]);
}

function inline($inline_query_id, $json_result){
    bot('answerInlineQuery', [
        'inline_query_id' => $inline_query_id , 
        'results' => $json_result ,
    ]);
}

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
    • /rps : Rock Paper Scissors game");
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

    case "/rps":
        sendmessage($chat_id, "Well well. Game time 🎮
        as you know this is RPS ( Rock Paper Scissors ). In this game, we have three rounds.
        and whoever gets more points at the end of these three rounds will be the winner.

        Reply '!rock', '!paper' and '!scissors' and And wait for luck.
        Lets Start 😈
        
        *** Not working !
        ***Adding this game soon ...");
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
                
        a Damn bot by @Raxinus based on v1.0.1");
    break;

    case "/random":
        sendmessage($chat_id, "$random_array[$randomer]");
    break;

    /* adding soon ( Tag and Rps Game )
    case "/tag":
    sendmessage($chat_id, "@{$username}, your tag is {$tag}");
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
*/ 
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

// /tag command with argument
/* adding soon
if (strpos($text, '/tag') === 0) {

	    $new_text = substr($text, 5);
    sendmessage($chat_id, "**Echo** : 
$new_text");
} else {
    die("Please inter valid value with /say [argument]");
}
*/


// adding soon ...
// winner checker with monitoring the scores section

/*
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

*/

?>