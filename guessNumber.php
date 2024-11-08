<?php

function validate($inputParam) {
    return is_numeric($inputParam) && $inputParam >= 1 && $inputParam <= 100;
}

function playGame($attempts) {
    $randomNumber = rand(1, 100);
    $tryCount = 0;

    echo "Загадано число від 1 до 100. У тебе є $attempts спроб щоб вгадати!\n";

    while ($tryCount < $attempts) {
        $userInput = readline("Введи своє число: ");

        if (!validate($userInput)) {
            echo "Будь ласка, введи число від 1 до 100!\n";
            continue;
        }

        $userGuess = (int)$userInput;
        $tryCount++;

        $compare = function($guess, $number) {
            if ($guess > $number) {
                return "Спробуй менше.\n";
            } elseif ($guess < $number) {
                return "Сробуй більше.\n";
            } else {
                return "Вітаю! Ти вгадав число!\n";
            }
        };

        $result = $compare($userGuess, $randomNumber);

        if ($result === "Вітаю! Ти вгадав число!\n") {
            echo $result;
            echo "Тобі знадобилось $tryCount спроб.\n";
            return;
        } else {
            echo $result;
        }        
    }
    echo "На жаль, ти не зміг вгадати число за $attempts спроб. Загадане число було: $randomNumber.\n";
}

playGame(7);