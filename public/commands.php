<?php

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

?>