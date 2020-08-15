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

// apis keys here
$token = '1007063839:AAFQD5Xg_tglB1W6bwA6RnXfz0f1j7Grz5w';
$weather_token = '45ad31179a047c6e43833eccc2cb7412';
$omdb_token = '';

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
$inline_query = $update->inline_query->query;
$inline_query_id = $update->inline_query->id;

define('FROM', $from);
define('CHAT', $chat);
define('MSGID', $msgid);

require_once 'methods.php';
require_once 'inline-queries.php';
require_once 'ascii.php';
require_once 'conditions.php';
require_once 'dictionary.php';

?>