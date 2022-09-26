<?php

$currency = 500;

$billets = array(500, 200, 100, 50, 20, 10, 5);
$cents = array(2, 1, 0.5, 0.20, 0.10, 0.05, 0.02, 0.01);
$money = array();

$count = 0;

while($currency >= 0){
    foreach ($billets as $value){
        if($currency <= $value){
            $money[$count] = $value; 
            $currency -= $value;

            echo "$currency\n\n";
            $count++;
            break;
        }
    };
};

var_dump($money)

?>