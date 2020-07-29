<?php

########## Bot Config ##########

error_reporting(0);

// json encoder
function jencode($array, $status = 0) {
	return json_encode($array, $status);
}
// json decoder
function jdencode($array, $status = 0) {
	return json_decode($array, $status);
}

// requset to api and get respone
$token = '1007063839:AAGBjoGxk_1E2TwuvjwxScX700KVLcSZ8fk';
$weather_token = '45ad31179a047c6e43833eccc2cb7412';
define('API_KEY', $token);

function bot($method, $data=[], $token = API_KEY) {
	$ch = curl_init('https://api.telegram.org/bot'.$token.'/'.$method);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => 1, CURLOPT_POSTFIELDS => $data]);
	return jdencode(curl_exec($ch));
}

// check the bot if works
$bot = bot('getme')->result;
$userbot = $bot->username;
$namebot = $bot->first_name;
$botid = $bot->id;

$update = jdencode(file_get_contents('php://input'));

// check if entered data was message type
if ($msg = $update->message) {
	$text = $msg->text;
	$date = $msg->date;
	$from = $msg->from;
	$from_first_name = $from->first_name;
	$from_last_name = $from->last_name;
	$from_username = $from->username;
	$from_is_bot = $from->is_bot;
	$from = $from->id;
	$chat = $msg->chat;
	$type = $chat->type;
	$chat_type = $type;
	$chat_title = $chat->title;
	$chat = $chat->id;
	$reply_to_message = $msg->reply_to_message;
	$reply_to_message_photo = $reply_to_message->photo;
	$reply_to_message_photo = $reply_to_message->sticker_file_id;
	$rp = $reply_to_message;
	$rp_from = $rp->from;
	$rp_from_id = $rp_from->id;
	$rp_from_username = $rp_from->username;
	$rp_message_id = $rp->message_id;
	$msgid = $msg->message_id;
	$message_id = $msgid;
	$left_chat_member = $msg->left_chat_member;
	$new_chat_member = $msg->new_chat_member;
	$new_chat_members = $msg->new_chat_members;
	$photo = $msg->photo;
	$sticker = $msg->sticker;
	$forward_from = $msg->forward_from;
	$forward_from_chat = $msg->forward_from_chat;
	$video = $msg->video;
	$voice = $msg->voice;
	$document = $msg->document;
	$video_note = $msg->video_note;
	$game = $msg->game;
	$location = $msg->location;
	$contact = $msg->contact;
	$entities = $msg->entities;
	$caption = $msg->caption;
	$caption_entities = $msg->caption_entities;
	$audio = $msg->audio;
}

// check if entered data was callback type
if ($query = $update->callback_query) {
	$msg = $query->message;
	$text = $msg->text;
	$date = $msg->date;
	$from = $query->from;
	$msgid = $msg->message_id;
	$message_id = $msgid;
	$from_first_name = $from->first_name;
	$from_last_name = $from->last_name;
	$from_username = $from->username;
	$from = $from->id;
	$chat = $msg->chat;
	$type = $chat->type;
	$chat_type = $type;
	$chat_title = $chat->title;
	$chat = $chat->id;
	$idc = $query->id;
	$data = $query->data;
}

// check if entered data was edited message type
if ($msg = $update->edited_message) {
	$text = $msg->text;
	$date = $msg->date;
	$msgid = $msg->message_id;
	$message_id = $msgid;
	$from = $msg->from;
	$from_first_name = $from->first_name;
	$from_last_name = $from->last_name;
	$from_username = $from->username;
	$from = $from->id;
	$chat = $msg->chat;
	$chat_type = $chat->type;
	$chat_title = $chat->title;
	$chat = $chat->id;
	$type = $chat_type;
	$photo = $msg->photo;
	$sticker = $msg->sticker;
	$forward_from = $msg->forward_from;
	$forward_from_chat = $msg->forward_from_chat;
	$video = $msg->video;
	$voice = $msg->voice;
	$document = $msg->document;
	$video_note = $msg->video_note;
	$game = $msg->game;
	$location = $msg->location;
	$contact = $msg->contact;
	$entities = $msg->entities;
	$caption = $msg->caption;
	$caption_entities = $msg->caption_entities;
	$audio = $msg->audio;
}
// get inline queries 
$inline_query = $main->inline_query->query;
$inline_query_id = $main->inline_query->id;

define('FROM', $from);
define('CHAT', $chat);
define('MSGID', $msgid);

########## Mehtods ##########

// sendmessage method
function sendmessage($chat, $text, $key = '', $reply = '') {
	return bot('sendmessage',[
		'chat_id' => $chat,
		'text' => $text,
		'reply_markup' => $key,
		'reply_to_message_id' => $reply,
		'parse_mode' => 'markdown'
	]);
}

//  reply message method
function reply($text, $key = '', $reply = '') {
	global $chat, $msgid;
	return sendmessage($chat, $text, $key, $reply ?: $msgid);
}

// forward message method
function forward_message($chat, $from, $msgid) {
	return bot('forwardmessage',[
		'chat_id' => $chat,
		'from_chat_id' => $from,
		'message_id' => $msgid
	]);
}

// edit message method
function editmessage($chat, $msgid, $text, $key = '') {
	return bot('editmessagetext',[
		'chat_id' => $chat,
		'message_id' => $msgid,
		'text' => $text,
		'reply_markup' => $key,
		'parse_mode' => 'markdown'
	]);
}

function edit($text, $key = '') {
	global $chat, $msgid;
	return editmessage($chat, $msgid, $text, $key);
}

// sendPhoto method
function sendphoto($chat, $photo, $caption, $reply = '') {
    return bot('sendPhoto', [
        'chat_id' => $chat,
        'photo' => $photo,
        'caption' => $caption,
		'reply_to_message_id' => $reply,
		'parse_mode' => 'markdown'
    ]);
}
// sendAudio method
function sendaudio($chat, $audio, $caption, $reply = '') {
    return bot('sendPhoto', [
        'chat_id' => $chat,
        'audio' => $audio,
		'caption' => $caption,
		'reply_to_message_id' => $reply,
		'parse_mode' => 'markdown'
    ]);
}
// sendSticker method
function sendsticker($chat, $sticker, $reply = '') {
    return bot('sendSticker', [
        'chat_id' => $chat,
		'sticker' => $sticker,
		'reply_to_message_id' => $reply,
    ]);
}
// sendVideo method
function sendvideo($chat, $video, $caption, $reply = '') {
    return bot('sendVideo', [
        'chat_id' => $chat,
        'video' => $video,
		'caption' => $caption,
		'reply_to_message_id' => $reply,
		'parse_mode' => 'markdown'
    ]);
}

// sendDice method
function send_dice($chat, $reply_id){
    bot('sendDice', [
        'chat_id' => $chat,
        'emoji' =>  '🎲',
        'reply_to_message_id' => $reply_id,
    ]);
}

// sendDice method
function send_dart($chat, $reply_id){
    bot('sendDice', [
        'chat_id' => $chat,
        'emoji' =>  '🎯',
        'reply_to_message_id' => $reply_id,
    ]);
}

// sendDice method
function send_basket($chat, $reply_id){
    bot('sendDice', [
        'chat_id' => $chat,
        'emoji' =>  '🏀',
        'reply_to_message_id' => $reply_id,
        
    ]);
}

########## Inline Keyboards ##########

$start_inline_keyboards = jencode(['inline_keyboard' => [

	[['text' => 'Commands List', 'callback_data' => 'command']],
	[['text' => 'Available emojis', 'callback_data' => 'emoji']]

]]);

$commands_inline_keyboards = jencode(['inline_keyboard' => [

	[['text' => 'Available emojis', 'callback_data' => 'emoji']],
	[['text' => 'Back', 'callback_data' => 'back-start']]

]]);

$emoji_inline_keyboards = jencode(['inline_keyboard' => [

	[['text' => 'Commands List', 'callback_data' => 'command']],
	[['text' => 'Back', 'callback_data' => 'back-start']]

]]);

$gay_inline_keyboards = jencode(['inline_keyboard' => [

	[['text' => 'Show my Gay rate', 'callback_data' => 'gay']],

]]);

########## Inline Keyboards Callback answer ##########

switch ($data) {

	case "back-start" :
		edit("Welcome dear {$from_first_name} 🐱, 
add me to Chat and Have Fun.
🔴 Follow @Puliqers for Updates & Contacts ⚫️", $start_inline_keyboards);
	break;

	case "command" :
		edit("🎯 -| Here is the list of *available commands* or simple text that you can use :

• /about : Returns info about bot
• /me : Returns your Info
• /wyra : Returns a random text
• /rps : Rock Paper Scissors game
• /gay : Returns your gayness
• /say : Echo your text
• /char : Returns a Custom with your text
• /dog : Returns a random dog image
• /weather : Returns weather of entered city
• /emoji - Returns a custom emoji
• /count : Count to your entered number", $commands_inline_keyboards);
	break;
	
	case "emoji" :
		edit("You can use this emojis and get the different respone for each other :

Hearts : ❤️🧡💛💚💙💜🖤
Fruits : 🍏🍎🍐🍊🍋🍌🍉🍇🍓🍒🍑🍍🥝🍅🍆🥕", $emoji_inline_keyboards);
	break;

	case "gay" :
		$gayrand = rand(0, 100);
		edit("🏳️‍🌈 *{$from_first_name}* is {$gayrand}% Gay 🏳️‍🌈");
	break;
}


########## Usable String ##########

switch ($text) {
	
	case "/start" :
	case "/start@WyRaBot" :
		sendmessage($chat, "Welcome dear {$from_first_name} 🐱, 
add me to Chat and Have Fun.
🔴 Follow @Puliqers for Updates & Contacts ⚫️", $start_inline_keyboards);
	break;

	case "/help" :
	case "/help@WyRaBot" :
		sendmessage($chat, "🎯 -| Here is the list of *available commands* or simple text that you can use :

• /about : Returns info about bot
• /me : Returns your Info
• /wyra : Returns a random text
• /rps : Rock Paper Scissors game
• /gay : Returns your gayness
• /say : Echo your text
• /char : Returns a Custom with your text
• /dog : Returns a random dog image
• /weather : Returns weather of entered city
• /emoji : Returns a custom emoji
• /count : Count to your entered number");
	break;

	case "/me" :
	case "/me@WyRaBot" :
		reply("*Your Information* :
Firstname : {$from_first_name}
Lastname : {$from_last_name}
Username : @{$from_username}
User ID : {$from}");
	break;

	case "/about" :
	case "/about@WyRaBot" :
		sendmessage($chat, "Hello, this is *WyRa*.
a funny multipurpose telegram bot.
						
Follow us for updates & contacts on @Puliqers, based on v1.0.1");
	break;

	case "/wyra" :
	case "/wyra@WyRaBot" :

		$random_array = [
			'/help is not for decor 😡',
			'Not Funny',
			'use /time to see the world clock!',
		];

		$randomer = array_rand($random_array);

		reply("$random_array[$randomer]");
	break;

	case "/rps" :
	case "/rps@WyRaBot" :
		reply("*Not working !*
*Adding this game soon ...*
				
Well well. Game time 🎮
as you know this is RPS ( Rock Paper Scissors ). In this game, we have three rounds.
and whoever gets more points at the end of these three rounds will be the winner.
		
Reply '!rock', '!paper' and '!scissors' and And wait for luck.
Lets Start 😈
				
*Not working !*
*Adding this game soon ...*");
	break;

	case "/dog" :
	case "/dog@WyRaBot" :
		$url = "https://dog.ceo/api/breeds/image/random";
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		$res = curl_exec($ch);
		
		$main = json_decode($res);
		$image = $main->message;
		sendphoto($chat, $image, "Use /dog for another random dog image", $msgid);
	break;

	case "/time":
	case "/time@WyRaBot" :
		reply("_You suck_, we dont have /time 😅");
	break;
	
	case "dice":
		send_dice($chat, $msgid);
	break;
	
	case "dart":
		send_dart($chat, $msgid);
	break;
	
	case "basket":
		send_basket($chat, $msgid);
	break;

	case "❤️":
        reply("❤️ : The red heart emoji is used in warm emotional contexts.
It can be used to express gratitude, love, happiness, hope, or even flirtatiousness. ❤️");
    break;

    case "🧡":
        reply("🧡 : The Orange Heart Emoji to express great care, comfort, and serenity.
The color orange is associated with meanings of joy, warmth, heat, sunshine, enthusiasm, creativity, success, encouragement. 
Also the orange heart emoji means you just wanna stick as friends and have nothing mutual. 🧡");
    break;

    case "💛":
        reply("💛 : The yellow heart emoji, can convey love, just like any other heart symbol or emoji, but its yellow color often gets used to show liking and friendship (as opposed to romantic love). Its color also works with expressions of happines and with all things yellow, from sports team colors to dresses. 💛");
    break;

    case "💚":
        reply("💚 : The Green Heart Emoji is known as Jealous Heart. A green heart can also be associated with envy, jealousy or possessive love. The Purple (Violet) Heart Emoji – A purple (violet) heart can symbolize a sensitive, understanding and compassionate love. This heart emoji is regularly used to portray glamour or wealth. 💚");
    break;

    case "💙":
        reply("💙 : Humans have long associated the feeling of love with their heart. The symbol for Valentine's Day is a heart. A blue heart can symbolize a deep and stable love. Trust, harmony, peace and loyalty. 💙");
    break;

    case "💜":
        reply("💜 - The Purple (Violet) Heart Emoji – A purple (violet) heart can symbolize a sensitive, understanding and compassionate love. This heart emoji is regularly used to portray glamour or wealth. The Blue Heart Emoji – A blue heart can also symbolize trust, harmony, peace and loyalty. They can symbolize deep attraction. 💜");
    break;

    case "🖤":
        reply("🖤 : The black heart emoji is the perfect emoji for a rainy day when you are sitting inside, listening to My Chemical Romance or Dashboard Confessional, and feeling angst-y and misunderstood. It means you are feeling emo, have a dark twisted soul, morbid sense of humor, or just love sad stuff. 🖤");
    break;

    case "💔":
        reply("💔 : One thing's for sure: they use the broken heart emoji. In texts and on social media, the emoji is used to express grief after a breakup, loss, or other setbacks. While often sincere, its tone can also be more playful, over-exaggerating a frustration or fawning over a crush. Related words: beating heart emoji. 💔");
    break;

    case "🍎":
        $photo = "http://s13.picofile.com/file/8403456826/Do_Apples_Affect_Diabetes_and_Blood_Sugar_Levels_732x549_thumbnail.jpg";
        sendphoto($chat, $photo, "🍎 Apples Are Nutritious. ...
🍎 Apples May Be Good for Weight Loss. ...
🍎 Apples May Be Good for Your Heart. ...
🍎 They're Linked to a Lower Risk of Diabetes. ...
🍎 They May Have Prebiotic Effects and Promote Good Gut Bacteria. ...
🍎 Substances in Apples May Help Prevent Cancer. ...
🍎 Apples Contain Compounds That Can Help Fight Asthma.");
    break;

    case "🍏":
        $photo = "http://s13.picofile.com/file/8403457418/cover_1530016364.jpg";
        sendphoto($chat, $photo, "🍏 Low in fat: Green apples have low fat content and help in maintaining good blood flow in the body. ...
🍏 Rich Source of Vitamin A and C: ...
🍏 Good For Bones: ...
🍏 Fights Against Ageing.");
    break;

    case "🍐":
        $photo = "http://s12.picofile.com/file/8403457726/two_pears_on_a_table.jpg";
        sendphoto($chat, $photo, "🍐 Highly nutritious. Pears come in many different varieties. ...
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
        sendphoto($chat, $photo, "🍊 Benefits of eating oranges.
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
        sendphoto($chat, $photo, "🍋 It promotes hydration. ...
🍋 It's a good source of vitamin C. ...
🍋 It supports weight loss. ...
🍋 It improves your skin quality. ...
🍋 It aids digestion. ...
🍋 It freshens breath. ...
🍋 It helps prevent kidney stones.");
    break;

    case "🍌":
        $photo = "http://s12.picofile.com/file/8403458142/istockphoto_186012019_170667a.jpg";
        sendphoto($chat, $photo, "🍌 Bananas are respectable sources of vitamin C. ...
🍌 Manganese in bananas is good for your skin. ...
🍌 Potassium in bananas is good for your heart health and blood pressure. ...
🍌 Bananas can aid digestion and help beat gastrointestinal issues. ...
🍌 Bananas give you energy – minus the fats and cholesterol​");
    break;

    case "🍉":
        $photo = "http://s13.picofile.com/file/8403458326/close_up_delicious_fruit_1068534.jpg";
        sendphoto($chat, $photo, "🍉 Helps You Hydrate. ...
🍉 Contains Nutrients and Beneficial Plant Compounds. ...
🍉 Contains Compounds That May Help Prevent Cancer. ...
🍉 May Improve Heart Health. ...
🍉 May Lower Inflammation and Oxidative Stress. ...
🍉 May Help Prevent Macular Degeneration. ...
🍉 May Help Relieve Muscle Soreness.");
    break;

    case "🍇":
        $photo = "http://s13.picofile.com/file/8403458550/GettyImages_183217648_1.jpg";
        sendphoto($chat, $photo, "🍇 Packed With Nutrients, Especially Vitamins C and K. ...
🍇 High Antioxidant Contents May Prevent Chronic Diseases. ...
🍇 Plant Compounds May Protect Against Certain Types of Cancer. ...
🍇 Beneficial for Heart Health in Various Impressive Ways. ...
🍇 May Decrease Blood Sugar Levels and Protect Against Diabetes.");
    break;

    case "🍓":
        $photo = "http://s12.picofile.com/file/8403458634/strawberries_1.jpg";
        sendphoto($chat, $photo, "The tiny strawberry is packed with vitamin C, fiber, antioxidants, and more. ...
🍓 The heart-shaped silhouette of the strawberry is the first clue that this fruit is good for you. ... 
🍓 These potent little packages protect your heart, increase HDL (good) cholesterol, lower your blood pressure, and guard against cancer. ...");
    break;

    case "🍒":
        $photo = "http://s12.picofile.com/file/8403458826/Cherries.jpg";
        sendphoto($chat, $photo, "🍒 Relives Insomnia. Cherries contain a hormone called melatonin which facilitates good, peaceful sleep. ...
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
        sendphoto($chat, $photo, "🍑 Packed With Nutrients and Antioxidants. Peaches are rich in many vitamins, minerals, and beneficial plant compounds. ...
🍑 May Aid Digestion. ...
🍑 May Improve Heart Health. ...
🍑 May Protect Your Skin. ...
🍑 May Prevent Certain Types of Cancer. ...
🍑 May Reduce Allergy Symptoms. ...
🍑 Widely Available and Easy to Add to Your Diet.");
    break;

    case "🍍":
        $photo = "http://s12.picofile.com/file/8403459268/download.jpeg";
        sendphoto($chat, $photo, "🍍 Loaded With Nutrients. ...
🍍 Contains Disease-Fighting Antioxidants. ...
🍍 Its Enzymes Can Ease Digestion. ...
🍍 May Help Reduce the Risk of Cancer. ...
🍍 May Boost Immunity and Suppress Inflammation. ...
🍍 May Ease Symptoms of Arthritis. ...
🍍 May Speed Recovery After Surgery or Strenuous Exercise.");
    break;

    case "🥝":
        $photo = "http://s12.picofile.com/file/8403459400/kiwi_fruit_health_benefits_7_reasons_why_you_should_add_this_food_to_your_diet_main.jpg";
        sendphoto($chat, $photo, "🥝 Helps treat asthma.
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
        sendphoto($chat, $photo, "🍅 Tomatoes are the major dietary source of the antioxidant lycopene,
🍅 which has been linked to many health benefits, including reduced risk of heart disease and cancer.
🍅 They are also a great source of vitamin C, potassium, folate, and vitamin K.");
    break;

    case "🍆":
        $photo = "http://s13.picofile.com/file/8403459718/two_eggplants_on_a_wooden_table.jpg";
        sendphoto($chat, $photo, "🍆 A GREAT SOURCE OF VITAMINS & MINERALS. The vitamin & mineral content of eggplants is quite extensive. ...
🍆 HELPS WITH DIGESTION. ...
🍆 IMPROVES HEART HEALTH. ...
🍆 PREVENTS CANCER. ...
🍆 IMPROVES BONE HEALTH. ...
🍆 PREVENTS ANEMIA. ...
🍆 INCREASES BRAIN FUNCTION.");
    break;

    case "🥔":
        $photo = "http://s13.picofile.com/file/8403459868/baked_potatoes_in_a_sack_0.jpg";
        sendphoto($chat, $photo, "🥔 Just 110 calories.
🥔 No fat, sodium or cholesterol.
🥔 Nearly half your daily value of vitamin C.
🥔 More potassium than a banana.
🥔 A good source of vitamin B6.
🥔 Fiber, magnesium and antioxidants.
🥔 Resistant starch.");
    break;

    case "🥕":
        $photo = "http://s12.picofile.com/file/8403460092/download_1_.jpeg";
        sendphoto($chat, $photo, "🥕 It is crunchy, tasty, and highly nutritious.
🥕 Carrots are a particularly good source of beta carotene, fiber, vitamin K1, potassium, and antioxidants.
🥕 They also have a number of health benefits.
🥕 They're a weight-loss-friendly food and have been linked to lower cholesterol levels and improved eye health");
    break;
}

########## Usable Commands ##########

// /say command with argument
if ($text == '/say' || $text == '/say@WyRaBot') {
    reply("*Use this Command with a text !*
for example :     
/say hello
Result :
hello");

} elseif (strpos($text, '/say') === 0) {
    $new_text = substr($text, 5);
    reply("*Result :* 
$new_text");
}

// /gay command with argument 
if ($text == '/gay' || $text == '/gay@WyRaBot') {
	
	$result = reply("_Calculating ..._");
	$reply_message_id = $result->result->message_id;

	sleep(5);
	
	editmessage($chat, $reply_message_id, "🏳️‍🌈 Your Gay rate is ready ! 🏳️‍🌈", $gay_inline_keyboards);

}

// /char command with argumant
if ($text == '/char' || $text == '/char@WyRaBot') {
    reply("*Use this Command with a Simple text !*
for example : 
/char hello
Result :

|￣￣￣￣￣￣￣￣￣￣￣|
|               hello                   |
|＿＿＿＿＿＿＿＿__＿＿|
			\ (•_•) /
			  \      /
				---
				|   |
");
				
} elseif (strpos($text, '/char') === 0) {

	$new_text = substr($text, 6);
	
    reply("
    
    |￣￣￣￣￣￣￣￣￣￣￣|
|     $new_text                   |
|＿＿＿＿＿＿＿＿__＿＿| 
                \ (•_•) / 
                  \      / 
                    ---
                    |   |");
}

// /emoji command with argument 
if ($text == '/emoji' || $text == '/emoji@WyRaBot') {
    reply("*Use this Command with a emoji !*
for example : 
/emoji 😂
Result :
    
😂   . - .
‎(\_,'       ' .
  ‎/\
");

} elseif (strpos($text, '/emoji') === 0) {
    $e = substr($text, 7);
    reply("    
$e   . - .
(\_,'       ' .
  ‎/\
");
}

// /weather command with argument
if ($text == '/weather' || $text == '/weather@WyRaBot') {
    reply("*Use this Command with a city name !*
for example : 
/weather berlin");
}

elseif (strpos($text, '/weather') === 0) {

    $location = substr($text, 9);
	
    $url = "http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=".$weather_token;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);

		$main = json_decode($res);
		
        $lon = $main->coord->lon;
        $lat = $main->coord->lat;
        $temp = $main->main->temp;
        $pressure = $main->main->pressure;
        $humidity = $main->main->humidity;
        $wind_speed = $main->wind->speed;
        $wind_deg = $main->wind->deg;

        reply("Lon : {$lon}
Lat : {$lat}

Temperature : {$temp}
Pressure : {$pressure}
Humidity : {$humidity}

Wind Speed : {$wind_speed}
Wind Degree : {$wind_deg}");
}

// /count command with argument
if ($text == '/count' || $text == '/count@WyRaBot') {
    reply("*Use this Command with a Number !*
for example : 
/count 6");
}

elseif (strpos($text, '/count') === 0) {
    $new_bar = substr($text, 7);

    if ($new_bar <= 50) {
		$result = reply("*Counting will starting soon ...*");
		$reply_message_id = $result->result->message_id;

		sleep(5);
		
		editmessage($chat, $reply_message_id, "*Counting in progress 📟*");

		for ($i = 0; $i <= $new_bar; $i++) {
			sendmessage($chat, $i);
			if ($i == $new_bar) {
				sendmessage($chat, "*Counting completed successfully ✅*");
				editmessage($chat, $reply_message_id, "*Counting completed successfully ✅*");
			}
		}
		
    } else {
        reply("Up to 50 is allowed ⚠️");
    }
}


?>