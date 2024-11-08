<?php

$options = ["ножиці", "камінь", "папір"];

function validate($inputParam) {
    global $options;
    return in_array($inputParam, $options);
}

function playRound($userChoice, $computerChoice) {
    if (($userChoice == "ножиці" and $computerChoice == "папір")
    or ($userChoice == "камінь" and $computerChoice == "ножиці")
    or ($userChoice == "папір" and $computerChoice == "камінь")) {
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
        $inputOption = readline("Введіть ваш варіант (камінь/ножиці/папір): ");
        if (!validate($inputOption)) {
            echo "Введіть один з наступних варіантів камінь/ножиці/папір\n";
            continue;
        }
        $computerChoice = $randomChoice();
        $roundWinner = playRound($inputOption, $computerChoice);
        
        if ($roundWinner == "user") {
            echo "Ваш вибір - $inputOption\nВибір комп'ютера - $computerChoice\nРезультат раунду - ви перемогли\n";
            $userScore++;
        } elseif ($roundWinner == "draw") {
            echo "Ваш вибір - $inputOption\nВибір комп'ютера - $computerChoice\nРезультат раунду - нічия\n";
            $userScore++;
            $computerScore++;
        } else {
            echo "Ваш вибір - $inputOption\nВибір комп'ютера - $computerChoice\nРезультат раунду - комп'ютер переміг\n";
            $computerScore++;
        }
    }
    echo "Результат гри:\nВаші очки - $userScore\nОчик комп'ютера - $computerScore\nПереможець: " . (($userScore == $computerScore) ? "Нічия" : (($userScore > $computerScore) ? "Ви" : "Комп'ютер")) . "\n";

}
playGame();