<?php

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
• /count : Count to your entered number
• /ascii : Returns a random ascii art
• /emoticon : Return a random emoticon
• /imdb : Return full imdb info of a movie");
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
🍎 Apples Contain Compounds That Can Help Fight Asthma.", $msgid);
    break;

    case "🍏":
        $photo = "http://s13.picofile.com/file/8403457418/cover_1530016364.jpg";
        sendphoto($chat, $photo, "🍏 Low in fat: Green apples have low fat content and help in maintaining good blood flow in the body. ...
🍏 Rich Source of Vitamin A and C: ...
🍏 Good For Bones: ...
🍏 Fights Against Ageing.", $msgid);
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
🍐 May help you lose weight.", $msgid);
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
🍊 Lowers the risk of cancer.", $msgid);
    break;
    
    case "🍋":
        $photo = "http://s13.picofile.com/file/8403457950/lemons_tree.jpg";
        sendphoto($chat, $photo, "🍋 It promotes hydration. ...
🍋 It's a good source of vitamin C. ...
🍋 It supports weight loss. ...
🍋 It improves your skin quality. ...
🍋 It aids digestion. ...
🍋 It freshens breath. ...
🍋 It helps prevent kidney stones.", $msgid);
    break;

    case "🍌":
        $photo = "http://s12.picofile.com/file/8403458142/istockphoto_186012019_170667a.jpg";
        sendphoto($chat, $photo, "🍌 Bananas are respectable sources of vitamin C. ...
🍌 Manganese in bananas is good for your skin. ...
🍌 Potassium in bananas is good for your heart health and blood pressure. ...
🍌 Bananas can aid digestion and help beat gastrointestinal issues. ...
🍌 Bananas give you energy – minus the fats and cholesterol​", $msgid);
    break;

    case "🍉":
        $photo = "http://s13.picofile.com/file/8403458326/close_up_delicious_fruit_1068534.jpg";
        sendphoto($chat, $photo, "🍉 Helps You Hydrate. ...
🍉 Contains Nutrients and Beneficial Plant Compounds. ...
🍉 Contains Compounds That May Help Prevent Cancer. ...
🍉 May Improve Heart Health. ...
🍉 May Lower Inflammation and Oxidative Stress. ...
🍉 May Help Prevent Macular Degeneration. ...
🍉 May Help Relieve Muscle Soreness.", $msgid);
    break;

    case "🍇":
        $photo = "http://s13.picofile.com/file/8403458550/GettyImages_183217648_1.jpg";
        sendphoto($chat, $photo, "🍇 Packed With Nutrients, Especially Vitamins C and K. ...
🍇 High Antioxidant Contents May Prevent Chronic Diseases. ...
🍇 Plant Compounds May Protect Against Certain Types of Cancer. ...
🍇 Beneficial for Heart Health in Various Impressive Ways. ...
🍇 May Decrease Blood Sugar Levels and Protect Against Diabetes.", $msgid);
    break;

    case "🍓":
        $photo = "http://s12.picofile.com/file/8403458634/strawberries_1.jpg";
        sendphoto($chat, $photo, "The tiny strawberry is packed with vitamin C, fiber, antioxidants, and more. ...
🍓 The heart-shaped silhouette of the strawberry is the first clue that this fruit is good for you. ... 
🍓 These potent little packages protect your heart, increase HDL (good) cholesterol, lower your blood pressure, and guard against cancer. ...", $msgid);
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
🍒 Energy Fruit.", $msgid);
    break;

    case "🍑":
        $photo = "http://s13.picofile.com/file/8403459100/thinkstock_rf_peaches.jpg";
        sendphoto($chat, $photo, "🍑 Packed With Nutrients and Antioxidants. Peaches are rich in many vitamins, minerals, and beneficial plant compounds. ...
🍑 May Aid Digestion. ...
🍑 May Improve Heart Health. ...
🍑 May Protect Your Skin. ...
🍑 May Prevent Certain Types of Cancer. ...
🍑 May Reduce Allergy Symptoms. ...
🍑 Widely Available and Easy to Add to Your Diet.", $msgid);
    break;

    case "🍍":
        $photo = "http://s12.picofile.com/file/8403459268/download.jpeg";
        sendphoto($chat, $photo, "🍍 Loaded With Nutrients. ...
🍍 Contains Disease-Fighting Antioxidants. ...
🍍 Its Enzymes Can Ease Digestion. ...
🍍 May Help Reduce the Risk of Cancer. ...
🍍 May Boost Immunity and Suppress Inflammation. ...
🍍 May Ease Symptoms of Arthritis. ...
🍍 May Speed Recovery After Surgery or Strenuous Exercise.", $msgid);
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
🥝 Potential risks.", $msgid);
    break;

    case "🍅":
        $photo = "http://s13.picofile.com/file/8403459650/health_benefits_of_tomatoes.jpg";
        sendphoto($chat, $photo, "🍅 Tomatoes are the major dietary source of the antioxidant lycopene,
🍅 which has been linked to many health benefits, including reduced risk of heart disease and cancer.
🍅 They are also a great source of vitamin C, potassium, folate, and vitamin K.", $msgid);
    break;

    case "🍆":
        $photo = "http://s13.picofile.com/file/8403459718/two_eggplants_on_a_wooden_table.jpg";
        sendphoto($chat, $photo, "🍆 A GREAT SOURCE OF VITAMINS & MINERALS. The vitamin & mineral content of eggplants is quite extensive. ...
🍆 HELPS WITH DIGESTION. ...
🍆 IMPROVES HEART HEALTH. ...
🍆 PREVENTS CANCER. ...
🍆 IMPROVES BONE HEALTH. ...
🍆 PREVENTS ANEMIA. ...
🍆 INCREASES BRAIN FUNCTION.", $msgid);
    break;

    case "🥔":
        $photo = "http://s13.picofile.com/file/8403459868/baked_potatoes_in_a_sack_0.jpg";
        sendphoto($chat, $photo, "🥔 Just 110 calories.
🥔 No fat, sodium or cholesterol.
🥔 Nearly half your daily value of vitamin C.
🥔 More potassium than a banana.
🥔 A good source of vitamin B6.
🥔 Fiber, magnesium and antioxidants.
🥔 Resistant starch.", $msgid);
    break;

    case "🥕":
        $photo = "http://s12.picofile.com/file/8403460092/download_1_.jpeg";
        sendphoto($chat, $photo, "🥕 It is crunchy, tasty, and highly nutritious.
🥕 Carrots are a particularly good source of beta carotene, fiber, vitamin K1, potassium, and antioxidants.
🥕 They also have a number of health benefits.
🥕 They're a weight-loss-friendly food and have been linked to lower cholesterol levels and improved eye health", $msgid);
    break;

    case "/ascii" :
    case "/ascii@WyRaBot" :
        reply($array[$random_ascci]);
    break;

    case "/emoticon" :
    case "/emoticon@WyRaBot" :
        reply($array_emoface[$random_emo_face]);
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

    if (is_numeric($new_bar)) {
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
    } else {
        reply("Please use this command with a valid number !");
    }  
}

if ($text == '/imdb' || $text == '/imdb@WyRaBot') {
    reply("*Use this Command with a movie/series name !*
for example : 
/imdb stranger things");

} elseif (strpos($text, '/imdb') === 0) {

    $movie = substr($text, 6);
    $arr = explode(' ', $movie);
    $array = join('+', $arr);
    
    $url = "http://www.omdbapi.com/?apikey=".$omdb_token."&t=".$array;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    
    $main = json_decode($res);
    
    $title = $main->Title;
    $type = $main->Type;
    $year = $main->Year;
    $rated = $main->Rated;
    $released = $main->Released;
    $runtime = $main->Runtime;
    $genre = $main->Genre;
    $director = $main->Director;
    $writer = $main->Writer;
    $actors = $main->Actors;
    $plot = $main->Plot;
    $language = $main->Language;
    $country = $main->Country;
    $awards = $main->Awards;
    $poster = $main->Poster;
    $meta_score = $main->Metascore;
    $imdbRating = $main->imdbRating;
    $imdbVotes = $main->imdbVotes;
    $imdbID = $main->imdbID;
    $website = $main->Website;
    $respone = $main->Response;
    
    if ($respone == 'True') {
        $reply = "• Title : {$title}
• Type : {$type}
• Year : {$year}
• Released : {$released}
• Genre : {$genre}
• Runtime : {$runtime}
• Rated : {$rated}

• Director : {$director}
• Writer : {$writer}

• Actors : {$actors}

• Plot : {$plot}

• Language : {$language}
• Country : {$country}

• Awards : {$awards}
• Metascore : {$meta_score}
• imdb Rating : {$imdbRating}
• imdb Votes : {$imdbVotes}
• imdbID : {$imdbID}

• Website : {$website}";

        sendphoto($chat, $poster, $reply, $msgid);
    } else {
        reply("Nothing was found ❌");
    }
}

if ($text == '/loop') {
    reply("*Use this Command with a number (Loop) !*
for example : 
/loop 2");
} elseif (strpos($text, '/loop') === 0) {
    $new_loop = substr($text, 6);
    $emoji_array = [
        '😂',
        '😳',
        '😢',
        '😔',
        '😍',
        '❤️',
        '😡',
        '😱',
        '💔',
        '🤮',
    ];

    $result = reply("🧽");
    $reply_message_id = $result->result->message_id;

    if (is_numeric($new_loop)) {
        for ($i = 0; $i <= $new_loop; $i++) {
            editmessage($chat, $reply_message_id, $emoji_array[$i]);
        }
    }
}
// if ($text) {
//     for ($i = 0; $i <= 5; $i++) {
//         reply("TEST");
//         sleep(30);
//     }
// }
?>