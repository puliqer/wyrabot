<?php

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

?>