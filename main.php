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

null_inline($inline_query, $inline_query_id, $chat_id);

function null_inline($inline_query, $inline_query_id, $chat_id) {

    switch($inline_query) {        
        case null :
            $reply = "• /start : Start the bot
• /help : Show the list of Command
• /about : Show some info about bot
• /me : Returns your Info
• /random : Show a random text
• /rps : Rock Paper Scissors game
• /gaycheck : Randomly returns your gayness by percent
• /say : Show your written text entered after command 
• /dice : Return a dice emoji
• /dart : Return a dart emoji
• /basket : Return a Basketball emoji
• /char : Show a Custom text with your written text after command
            
• Use these heart emojis and get the meaning of each other (❤️🧡💛💚💙💜🖤💔)
            
• Use these fruit emojis and get the benefits of each other (🍏🍎🍐🍊🍋🍌🍉🍇🍓🍒🍑🍍🥝🍅🍆🥕)";
        break;
    }

    $result = [
                [
                    'type' => "article",
                    'id' => "1",
                    'title' => "🤖 Everything you need to Know about WyRa 🤖",
                    'description' => "Here is List of Command and everything i can do, so lets check it out 👾",
                    'thumb_url'   => "http://s13.picofile.com/file/8403461176/photo_2020_07_20_17_14_07.jpg" ,
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

// sendDice method
function send_dice($chat_id){
    bot('sendDice', [
        'chat_id' => $chat_id,
        'emoji' =>  '🎲',
    ]);
}

// sendDice method
function send_dart($chat_id){
    bot('sendDice', [
        'chat_id' => $chat_id,
        'emoji' =>  '🎯',
    ]);
}

// sendDice method
function send_basket($chat_id){
    bot('sendDice', [
        'chat_id' => $chat_id,
        'emoji' =>  '🏀',
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
    sendmessage($chat_id, "• /help : Show the list of Command
• /about : Show some info about bot
• /me : Returns your Info
• /random : Show a random text
• /rps : Rock Paper Scissors game
• /gaycheck : Randomly returns your gayness by percent
• /say : Echo your text
• /dice : Return a dice emoji
• /dart : Return a dart emoji
• /basket : Return a Basketball emoji
• /char : Show a Custom text with your written text
• /dog : Show a random dog image
• /emoji - Make a custom emoji

• Use these heart emojis and get the meaning of each other (❤️🧡💛💚💙💜🖤💔)

• Use these fruit emojis and get the benefits of each other (🍏🍎🍐🍊🍋🍌🍉🍇🍓🍒🍑🍍🥝🍅🍆🥕)");
    break;

    case "/me":
    sendmessage($chat_id, "Your Information :
    Firstname : {$first_name}
    Lastname : {$last_name}
    Username : @{$username}
    User ID : {$user_id}");
    break;

    case "/rps":
        sendmessage($chat_id, "*** Not working !
*** Adding this game soon ...
        
Well well. Game time 🎮
as you know this is RPS ( Rock Paper Scissors ). In this game, we have three rounds.
and whoever gets more points at the end of these three rounds will be the winner.

Reply '!rock', '!paper' and '!scissors' and And wait for luck.
Lets Start 😈
        
*** Not working !
*** Adding this game soon ...");
        break;

    case "/time":
        sendmessage($chat_id, "You suck, we dont have /time 😅");
    break;

    case "/about":
        sendmessage($chat_id, "Hello, this is WyRa.
a funny multipurpose telegram bot.
                
Follow us for updates & contacts on @imWyRa, based on v1.0.1");
    break;

    case "/random":
        sendmessage($chat_id, "$random_array[$randomer]");
    break;

    case "/dice":
        send_dice($chat_id);
    break;

    case "/dart":
        send_dart($chat_id);
    break;

    case "/basket":
        send_basket($chat_id);
    break;

    case "❤️":
        sendmessage($chat_id, "❤️ : The red heart emoji is used in warm emotional contexts.
It can be used to express gratitude, love, happiness, hope, or even flirtatiousness. ❤️");
    break;

    case "🧡":
        sendmessage($chat_id, "🧡 : The Orange Heart Emoji to express great care, comfort, and serenity.
The color orange is associated with meanings of joy, warmth, heat, sunshine, enthusiasm, creativity, success, encouragement. 
Also the orange heart emoji means you just wanna stick as friends and have nothing mutual. 🧡");
    break;

    case "💛":
        sendmessage($chat_id, "💛 : The yellow heart emoji, can convey love, just like any other heart symbol or emoji, but its yellow color often gets used to show liking and friendship (as opposed to romantic love). Its color also works with expressions of happines and with all things yellow, from sports team colors to dresses. 💛");
    break;

    case "💚":
        sendmessage($chat_id, "💚 : The Green Heart Emoji is known as Jealous Heart. A green heart can also be associated with envy, jealousy or possessive love. The Purple (Violet) Heart Emoji – A purple (violet) heart can symbolize a sensitive, understanding and compassionate love. This heart emoji is regularly used to portray glamour or wealth. 💚");
    break;

    case "💙":
        sendmessage($chat_id, "💙 : Humans have long associated the feeling of love with their heart. The symbol for Valentine's Day is a heart. A blue heart can symbolize a deep and stable love. Trust, harmony, peace and loyalty. 💙");
    break;

    case "💜":
        sendmessage($chat_id, "💜 - The Purple (Violet) Heart Emoji – A purple (violet) heart can symbolize a sensitive, understanding and compassionate love. This heart emoji is regularly used to portray glamour or wealth. The Blue Heart Emoji – A blue heart can also symbolize trust, harmony, peace and loyalty. They can symbolize deep attraction. 💜");
    break;

    case "🖤":
        sendmessage($chat_id, "🖤 : The black heart emoji is the perfect emoji for a rainy day when you are sitting inside, listening to My Chemical Romance or Dashboard Confessional, and feeling angst-y and misunderstood. It means you are feeling emo, have a dark twisted soul, morbid sense of humor, or just love sad stuff. 🖤");
    break;

    case "💔":
        sendmessage($chat_id, "💔 : One thing's for sure: they use the broken heart emoji. In texts and on social media, the emoji is used to express grief after a breakup, loss, or other setbacks. While often sincere, its tone can also be more playful, over-exaggerating a frustration or fawning over a crush. Related words: beating heart emoji. 💔");
    break;

    case "🍎":
        $photo = "http://s13.picofile.com/file/8403456826/Do_Apples_Affect_Diabetes_and_Blood_Sugar_Levels_732x549_thumbnail.jpg";
        sendphoto($chat_id, $photo, "🍎 Apples Are Nutritious. ...
🍎 Apples May Be Good for Weight Loss. ...
🍎 Apples May Be Good for Your Heart. ...
🍎 They're Linked to a Lower Risk of Diabetes. ...
🍎 They May Have Prebiotic Effects and Promote Good Gut Bacteria. ...
🍎 Substances in Apples May Help Prevent Cancer. ...
🍎 Apples Contain Compounds That Can Help Fight Asthma.");
    break;

    case "🍏":
        $photo = "http://s13.picofile.com/file/8403457418/cover_1530016364.jpg";
        sendphoto($chat_id, $photo, "🍏 Low in fat: Green apples have low fat content and help in maintaining good blood flow in the body. ...
🍏 Rich Source of Vitamin A and C: ...
🍏 Good For Bones: ...
🍏 Fights Against Ageing.");
    break;

    case "🍐":
        $photo = "http://s12.picofile.com/file/8403457726/two_pears_on_a_table.jpg";
        sendphoto($chat_id, $photo, "🍐 Highly nutritious. Pears come in many different varieties. ...
🍐 May promote gut health. ...
🍐 Contain beneficial plant compounds. ...
🍐 Have anti-inflammatory properties. ...
🍐 May offer anticancer effects. ...
🍐 Linked to a lower risk of diabetes. ...
🍐 May boost heart health. ...
🍐 May help you lose weight.");
    break;

    case "🍊":
        $photo = "http://s13.picofile.com/file/8403457850/29942_gettyimages_155302141.jpg";
        sendphoto($chat_id, $photo, "🍊 Benefits of eating oranges.
🍊 High in Vitamin C. Oranges are an excellent source of vitamin C. ...
🍊 Healthy immune system. ...
🍊 Prevents skin damage. ...
🍊 Keeps blood pressure under check. ...
🍊 Lowers cholesterol. ...
🍊 Controls blood sugar level. ...
🍊 Lowers the risk of cancer.");
    break;
    
    case "🍋":
        $photo = "http://s13.picofile.com/file/8403457950/lemons_tree.jpg";
        sendphoto($chat_id, $photo, "🍋 It promotes hydration. ...
🍋 It's a good source of vitamin C. ...
🍋 It supports weight loss. ...
🍋 It improves your skin quality. ...
🍋 It aids digestion. ...
🍋 It freshens breath. ...
🍋 It helps prevent kidney stones.");
    break;

    case "🍌":
        $photo = "http://s12.picofile.com/file/8403458142/istockphoto_186012019_170667a.jpg";
        sendphoto($chat_id, $photo, "🍌 Bananas are respectable sources of vitamin C. ...
🍌 Manganese in bananas is good for your skin. ...
🍌 Potassium in bananas is good for your heart health and blood pressure. ...
🍌 Bananas can aid digestion and help beat gastrointestinal issues. ...
🍌 Bananas give you energy – minus the fats and cholesterol​");
    break;

    case "🍉":
        $photo = "http://s13.picofile.com/file/8403458326/close_up_delicious_fruit_1068534.jpg";
        sendphoto($chat_id, $photo, "🍉 Helps You Hydrate. ...
🍉 Contains Nutrients and Beneficial Plant Compounds. ...
🍉 Contains Compounds That May Help Prevent Cancer. ...
🍉 May Improve Heart Health. ...
🍉 May Lower Inflammation and Oxidative Stress. ...
🍉 May Help Prevent Macular Degeneration. ...
🍉 May Help Relieve Muscle Soreness.");
    break;

    case "🍇":
        $photo = "http://s13.picofile.com/file/8403458550/GettyImages_183217648_1.jpg";
        sendphoto($chat_id, $photo, "🍇 Packed With Nutrients, Especially Vitamins C and K. ...
🍇 High Antioxidant Contents May Prevent Chronic Diseases. ...
🍇 Plant Compounds May Protect Against Certain Types of Cancer. ...
🍇 Beneficial for Heart Health in Various Impressive Ways. ...
🍇 May Decrease Blood Sugar Levels and Protect Against Diabetes.");
    break;

    case "🍓":
        $photo = "http://s12.picofile.com/file/8403458634/strawberries_1.jpg";
        sendphoto($chat_id, $photo, "The tiny strawberry is packed with vitamin C, fiber, antioxidants, and more. ...
🍓 The heart-shaped silhouette of the strawberry is the first clue that this fruit is good for you. ... 
🍓 These potent little packages protect your heart, increase HDL (good) cholesterol, lower your blood pressure, and guard against cancer. ...");
    break;

    case "🍒":
        $photo = "http://s12.picofile.com/file/8403458826/Cherries.jpg";
        sendphoto($chat_id, $photo, "🍒 Relives Insomnia. Cherries contain a hormone called melatonin which facilitates good, peaceful sleep. ...
🍒 Facilitates Weight Loss. ...
🍒 Lowers Hypertension. ...
🍒 Prevents Cardiovascular Diseases. ...
🍒 Anti-Ageing Properties. ...
🍒 Promotes Healthy Locks. ...
🍒 Maintains pH Balance. ...
🍒 Energy Fruit.");
    break;

    case "🍑":
        $photo = "http://s13.picofile.com/file/8403459100/thinkstock_rf_peaches.jpg";
        sendphoto($chat_id, $photo, "🍑 Packed With Nutrients and Antioxidants. Peaches are rich in many vitamins, minerals, and beneficial plant compounds. ...
🍑 May Aid Digestion. ...
🍑 May Improve Heart Health. ...
🍑 May Protect Your Skin. ...
🍑 May Prevent Certain Types of Cancer. ...
🍑 May Reduce Allergy Symptoms. ...
🍑 Widely Available and Easy to Add to Your Diet.");
    break;

    case "🍍":
        $photo = "http://s12.picofile.com/file/8403459268/download.jpeg";
        sendphoto($chat_id, $photo, "🍍 Loaded With Nutrients. ...
🍍 Contains Disease-Fighting Antioxidants. ...
🍍 Its Enzymes Can Ease Digestion. ...
🍍 May Help Reduce the Risk of Cancer. ...
🍍 May Boost Immunity and Suppress Inflammation. ...
🍍 May Ease Symptoms of Arthritis. ...
🍍 May Speed Recovery After Surgery or Strenuous Exercise.");
    break;

    case "🥝":
        $photo = "http://s12.picofile.com/file/8403459400/kiwi_fruit_health_benefits_7_reasons_why_you_should_add_this_food_to_your_diet_main.jpg";
        sendphoto($chat_id, $photo, "🥝 Helps treat asthma.
🥝 Aids digestion.
🥝 Boosts immune system.
🥝 Helps prevent sickness.
🥝 Manages blood pressure.
🥝 Reduces blood clotting.
🥝 Protects against vision loss.
🥝 Potential risks.");
    break;

    case "🍅":
        $photo = "http://s13.picofile.com/file/8403459650/health_benefits_of_tomatoes.jpg";
        sendphoto($chat_id, $photo, "🍅 Tomatoes are the major dietary source of the antioxidant lycopene,
🍅 which has been linked to many health benefits, including reduced risk of heart disease and cancer.
🍅 They are also a great source of vitamin C, potassium, folate, and vitamin K.");
    break;

    case "🍆":
        $photo = "http://s13.picofile.com/file/8403459718/two_eggplants_on_a_wooden_table.jpg";
        sendphoto($chat_id, $photo, "🍆 A GREAT SOURCE OF VITAMINS & MINERALS. The vitamin & mineral content of eggplants is quite extensive. ...
🍆 HELPS WITH DIGESTION. ...
🍆 IMPROVES HEART HEALTH. ...
🍆 PREVENTS CANCER. ...
🍆 IMPROVES BONE HEALTH. ...
🍆 PREVENTS ANEMIA. ...
🍆 INCREASES BRAIN FUNCTION.");
    break;

    case "🥔":
        $photo = "http://s13.picofile.com/file/8403459868/baked_potatoes_in_a_sack_0.jpg";
        sendphoto($chat_id, $photo, "🥔 Just 110 calories.
🥔 No fat, sodium or cholesterol.
🥔 Nearly half your daily value of vitamin C.
🥔 More potassium than a banana.
🥔 A good source of vitamin B6.
🥔 Fiber, magnesium and antioxidants.
🥔 Resistant starch.");
    break;

    case "🥕":
        $photo = "http://s12.picofile.com/file/8403460092/download_1_.jpeg";
        sendphoto($chat_id, $photo, "🥕 It is crunchy, tasty, and highly nutritious.
🥕 Carrots are a particularly good source of beta carotene, fiber, vitamin K1, potassium, and antioxidants.
🥕 They also have a number of health benefits.
🥕 They're a weight-loss-friendly food and have been linked to lower cholesterol levels and improved eye health");
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

}

#########################  Conditions  #########################

// /say command with argument
if ($text == '/say') {
    sendmessage($chat_id, "Use this Command with a text !
    for example : 
    /say hello
    Result :
    hello");

} elseif (strpos($text, '/say') === 0) {
    $new_text = substr($text, 5);
    sendmessage($chat_id, "**Echo** : 
    $new_text");
}


// /char command with argumant
if ($text == '/char') {
    sendmessage($chat_id, "Use this Command with a Simple text !
    for example : 
    /char hello
    Result :
    |￣￣￣￣￣￣￣￣￣￣￣|
|               hello                   |
|＿＿＿＿＿＿＿＿__＿＿| 
            \ (•_•) / 
              \      / 
                ---
                |   |");

} elseif (strpos($text, '/char') === 0) {
    $new_text = substr($text, 6);
    sendmessage($chat_id, "
    
    |￣￣￣￣￣￣￣￣￣￣￣|
|     $new_text                   |
|＿＿＿＿＿＿＿＿__＿＿| 
                \ (•_•) / 
                  \      / 
                    ---
                    |   |
    
    ");
} 

if ($text == '/dog') {
    $url = "https://dog.ceo/api/breeds/image/random";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);

    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        $main = json_decode($res);
        $image = $main->message;
        sendphoto($chat_id, $image, "Use /dog for another random dog image");
    }
}

if ($text == '/emoji') {
    sendmessage($chat_id, "Use this Command with a emoji !
for example : 
/emoji 😂
Result :
    
😂   . - .
‎(\_,'       ' .
  ‎/\
    
    
    ");

} elseif (strpos($text, '/emoji') === 0) {
    $e = substr($text, 7);
    sendmessage($chat_id, "    
$e   . - .
(\_,'       ' .
  ‎/\
");
}
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