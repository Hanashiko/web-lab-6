<?php

$options = ["scissors", "rock", "paper"];

function validate($inputParam) {
    global $options;
    return in_array($inputParam, $options);
}

function playRound($userChoice, $computerChoice) {
    if (($userChoice == "scissors" and $computerChoice == "paper")
    or ($userChoice == "rock" and $computerChoice == "scissors")
    or ($userChoice == "paper" and $computerChoice == "rock")) {
        return "user";
    } elseif ($userChoice == $computerChoice) {
        return "draw";
    } else {
        return "computer";
    }
}

function playGame() {
    $userScore = 0;
    $computerScore = 0;

    $randomChoice = function() {
        global $options;
        return $options[array_rand($options)];
    };

    for ($i=0; $i<3; $i++) {
        $inputOption = readline("Enter your choice (rock/scissors/paper): ");
        if (!validate($inputOption)) {
            echo "Please enter one of: rock/scissors/paper\n";
            continue;
        }
        $computerChoice = $randomChoice();
        $roundWinner = playRound($inputOption, $computerChoice);

        if ($roundWinner == "user") {
            echo "Your choice: $inputOption\nComputer's choice: $computerChoice\nRound result: you won\n";
            $userScore++;
        } elseif ($roundWinner == "draw") {
            echo "Your choice: $inputOption\nComputer's choice: $computerChoice\nRound result: draw\n";
            $userScore++;
            $computerScore++;
        } else {
            echo "Your choice: $inputOption\nComputer's choice: $computerChoice\nRound result: computer won\n";
            $computerScore++;
        }
    }
    echo "Game result:\nYour score: $userScore\nComputer score: $computerScore\nWinner: " . (($userScore == $computerScore) ? "Draw" : (($userScore > $computerScore) ? "You" : "Computer")) . "\n";

}
playGame();
