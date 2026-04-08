<?php

function validate($inputParam) {
    return is_numeric($inputParam) && $inputParam >= 1 && $inputParam <= 100;
}

function playGame($attempts) {
    $randomNumber = rand(1, 100);
    $tryCount = 0;

    echo "A number from 1 to 100 has been chosen. You have $attempts attempts to guess it!\n";

    while ($tryCount < $attempts) {
        $userInput = readline("Enter your number: ");

        if (!validate($userInput)) {
            echo "Please enter a number between 1 and 100!\n";
            continue;
        }

        $userGuess = (int)$userInput;
        $tryCount++;

        $compare = function($guess, $number) {
            if ($guess > $number) {
                return "Try lower.\n";
            } elseif ($guess < $number) {
                return "Try higher.\n";
            } else {
                return "Congratulations! You guessed the number!\n";
            }
        };

        $result = $compare($userGuess, $randomNumber);

        if ($result === "Congratulations! You guessed the number!\n") {
            echo $result;
            echo "It took you $tryCount attempts.\n";
            return;
        } else {
            echo $result;
        }
    }
    echo "Unfortunately, you failed to guess the number in $attempts attempts. The number was: $randomNumber.\n";
}

playGame(7);
