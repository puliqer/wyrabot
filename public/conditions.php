<?php
#########################  Conditions  #########################

// /say command with argument
if (strpos($text, '/say') === 0) {
    $new_text = substr($text, 5);
    sendmessage($chat_id, "**Echo** : 
$new_text");
} else {
    die("Please inter valid value with /say [argument]");
}


if ($text = '/test') {
    $reply = "this is a message";
    $url = "https://api.telegram.org/bot1007063839:AAGXask-4Irff_Ka6DKcCmZs3Y5JJihy3kU" . "/sendMessage";
    $post_params = [ 'chat_id' => $chat_id , 'text' => $reply ];
 
    $result = send_reply($url, $post_params);
    $result_array = json_decode($result, true);
    $msg_id  = $result_array["result"]["message_id"];
 
    sleep(3);
 
    $reply = "this is updated message";
    $url = "https://api.telegram.org/bot1007063839:AAGXask-4Irff_Ka6DKcCmZs3Y5JJihy3kU" . "/editMessageText";
    $post_params = [ 'chat_id' => $chat_id , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);
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
?>
