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
if (strpos($text, '/tag') === 0) {
    $_SESSION['tag'] = substr($text, 5);
    sendmessage($chat_id, "{$username} tag changed to '{$_SESSION['tag']}'.
    send /tag to see your tag name!");
} else {
    die("Please inter valid value with /tag [argument]");
}

?>
