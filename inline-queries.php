<?php

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

?>