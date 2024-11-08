<?php

$secret_number = rand(1, 100);

for ($i = 0; $i < 7; $i++) {
    $user_number = readline("Напиши число: ");
    if ($user_number > $secret_number) {
        echo "Спробуй менше\n";
    } elseif ($user_number < $secret_number) {
        echo "Спробуй більше\n";
    } else {
        echo "Молодець, ти переміг!\n";
        break;
    }
}