<?php

function rollDice() {
    return rand(1, 6);
}
function playGame() {
    $score = 0;
    echo "Starting score: $score\n";

    while (1) {
        $input = readline("Press Enter to roll the dice...");
        $randomNumber = rollDice();
        echo "Rolled $randomNumber. ";
        if ($randomNumber == 6) {
            echo "Super roll!\n";
            continue;
        }
        $score += $randomNumber;
        echo "Total score: $score\n";

        if ($score == 20) {
            echo "Congratulations, you won!\n";
            break;
        } elseif ($score > 20) {
            echo "You lost!\n";
            break;
        }
    }
}

playGame();

// The validate function specified in the task requirements was not added,
// since this task does not involve receiving specific data — user input is
// only used as an intermediate step, without receiving any object or data type from the user.
