<?php

#########################  Public Variables Here  #########################

// rps section
// sent text form user for rps game
// sent one of the three possible response
$a = ['Rock', 'Paper', 'Scissors'];
$rps = array_rand($a);

// setting the score form 0
$rps_user_score = 0;
$rps_bot_score = 0;

// random section
$random_array = [
    '/help is not for decor 😡',
    'Bekiram in Perian = i love you',
    'I know you are such an asshole but you dont want that other know about it',
    'use /time to see the world clock!',
];

$randomer = array_rand($random_array);
echo $random_array[$randomer]."<br>";

$gayrand = rand(0, 100);

?>