<?php

########## Inline Queries ##########

function null_inline($inline_query, $inline_query_id, $chat) {

    switch($inline_query) {        
        case null :
			$reply = "🎯 -| Here is the list of *available commands* or simple text that you can use :
			
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
• /emoticon : Return a random emoticon";

			$result = [
				[
					'type' => "article",
					'id' => "1",
					'title' => "🤖 Everything you need to Know about WyRa",
					'description' => "Here is List of Command and everything i can do, so lets check it out 👾",
					'thumb_url'   => "http://s13.picofile.com/file/8403461176/photo_2020_07_20_17_14_07.jpg" ,
					'input_message_content' => [ 'message_text' => "$reply", 'parse_mode' => 'Markdown']
				],
			];

        break;
	}

    $json_result = json_encode($result);
    return bot('answerInlineQuery', [
        'inline_query_id' => $inline_query_id , 
        'results' => $json_result ,
    ]);
}

null_inline($inline_query, $inline_query_id, $chat);

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
• /emoji : Returns a custom emoji
• /count : Count to your entered number
• /ascii : Returns a random ascii art
• /emoticon : Return a random emoticon", $commands_inline_keyboards);
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

?>