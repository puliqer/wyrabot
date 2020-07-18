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
