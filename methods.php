<?php

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

// sendVoice method
function sendvoice($chat, $voice, $caption, $reply = '') {
    return bot('sendVoice', [
        'chat_id' => $chat,
        'audio' => $voice,
		'caption' => $caption,
		'reply_to_message_id' => $reply,
		'parse_mode' => 'markdown'
    ]);
}

?>