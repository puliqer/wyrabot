<?php

#########################  Public Variables Here  #########################

// rps section
// sent text form user for rps game
// sent one of the three possible response
$a = ['Rock', 'Paper', 'Scissors'];
$rps = array_rand($a);

// random section
$random_array = [
    '/help is not for decor 😡',
    'Not Funny',
    'I know you are such an asshole but you dont want that other know about it',
    'use /time to see the world clock!',
];

$randomer = array_rand($random_array);
echo $random_array[$randomer]."<br>";

$gayrand = rand(0, 100);

?>