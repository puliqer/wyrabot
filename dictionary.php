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
	
	case "Hello" :
	case "hello" :
	case "Hi" :
	case "hi" :
	case "Hey" :
	case "hey" :
		$random_voice = [
			'https://ir11.uploadboy.com/d/wtaryehgk1cc/ubnlfjerjay6feoh64vxtwwq73sylnr24ls4z7fatelwjvpt4i3cqn2njg7bydehlil2j6yv/H1.ogg',
			'https://ir11.uploadboy.com/d/y2tsq0vslgp2/ubnlhjerjay6feoh64vxphgf77xjx6n5zl2kqmymqdfkk4kzscxyyqo6gb7r54pancyjyrmx/H2.ogg',
			'https://ir11.uploadboy.com/d/qzz4y8hspwph/ubnlbjerjay6feoh64vx7vglxd6qa3643irwb43odaeopciwo67ee3bnfzxutvosafdn3wv5/H3.ogg',
			'https://ir11.uploadboy.com/d/zytnqdticxnz/ubnldjerjay6feoh64vxjv6f4jhziclrqtq6r2vzfykq6zhugh2w6rwm4cimrrmdhpio3yxw/H4.ogg',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;
	
	case "Goodbye" :
	case "goodbye" :
	case "Bye" :
	case "bye" :
		$random_voice = [
			'https://ir11.uploadboy.com/d/iqzf2ht2trar/ubnhvw4rjay6feoh64vwpx6l5lywf46x5l5act3gnyaokzyzdcteeowrsxgatau3jdyx277w/4_5850277118268672695.ogg',
			'https://ir11.uploadboy.com/d/xdrg9w07g86q/ubnhrw4rjay6feoh64vxnswd5oack45ozcwlz7ogvcrrtlwlsgh7ygy2skqunfx4aofkfxqm/4_5850277118268672697.ogg',
			'https://ir11.uploadboy.com/d/u5axeituvlc9/ubnhxw4rjay6feoh64vxxg6q6rmevegghsmbge565fzmtodzihdw3lm23hrnc5m7up6emlf6/4_5850277118268672696.ogg',
			'https://ir11.uploadboy.com/d/3er9tr0dvr7v/ubnhlw4rjay6feoh64vt3s6dwxlltsdgnn4qdaeecti3efktljsv2nejymwdunw5vh27grlm/4_5850277118268672694.ogg',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;

	case "Wow" :
	case "wow" :
	case "WOW" :
		$random_voice = [
			'https://ir12.uploadboy.com/d/6353moa8u56z/xbnfzw4rjay6feoh64vtrhmex5qmoaja6ljkksp2uetysoomkwzhg4vr3dgyzij3xkjmn2n3/4_5850277118268672702.ogg',
			'https://ir12.uploadboy.com/d/1tw9sghbnaue/xbnf3w4rjay6feoh64vt7wwgwxkyxsdbyhe65ho6ludmsiyzbbss7co3nzqfeh2jysyyfei7/4_5850277118268672703.ogg',
			'https://ir12.uploadboy.com/d/wn1685fqrpuc/xbnf7w4rjay6feoh64vxtqeaxikj6c2htm6d6pthmqz6o2axufbgeg5cddtrlwittit3y5sw/4_5850277118268672700.ogg',
			'https://ir12.uploadboy.com/d/9u4sdkw3bobw/xbnf5w4rjay6feoh64vtpw4f77q4x34yipm75yfotn67a26pi7s54h4xg4i6ogeyikslbxw6/4_5850277118268672699.ogg',
			'https://ir12.uploadboy.com/d/sadmtrl21cpy/xbnefw4rjay6feoh64vx3t6v4fxbeijf4bk7zexyu23qof6pin2rj6spi6eta4xpgmf7malm/4_5850277118268672704.ogg',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;

	case "Fuck" :
	case "fuck" :
	case "Fuck you" :
	case "fuck you" :
		$random_voice = [
			'',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;

	case "Shit" :
	case "shit" :
		$random_voice = [
			'',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;

	case "Damn" :
	case "damn" :
		$random_voice = [
			'',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;

	case "OK" :
	case "ok" :
	case "Ok" :
	case "oK" :
		$random_voice = [
			'',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;

	case "OPS" :
	case "Ops" :
	case "ops" :
		$random_voice = [
			'',
		];
		$randomer = array_rand($random_voice);

		sendvoice($chat, $random_voice[$randomer], '', $msgid);
	break;

}

?>