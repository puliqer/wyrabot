<?php 

switch ($text) {

    case "dice":
		send_dice($chat, $msgid);
	break;
	
	case "dart":
		send_dart($chat, $msgid);
	break;
	
	case "basket":
		send_basket($chat, $msgid);
    break;

}

?>