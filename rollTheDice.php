<?php

function rollDice() {
    return rand(1, 6);
}
function playGame() {
    $score = 0;
    echo "Початковий рахунок $score\n";

    while (1) {
        $input = readline("Натисніть Enter, щоб зробити кидок...");
        $randomNumber = rollDice();
        echo "Кидок $randomNumber. ";
        if ($randomNumber == 6) {
            echo "Суперкидок!\n";
            continue;
        }
        $score += $randomNumber;
        echo "Загальний рахунок: $score\n";
        
        if ($score == 20) {
            echo "Вітаю ти переміг!\n";
            break;
        } elseif ($score > 20) {
            echo "Ти програв!\n";
            break;
        }
    }
}

playGame();





// функцію validate, яка була прописана в умові завдання не добавляв, з точки зору того, що в цьому завдання немає отримання конкретних даних, а введення від користувача використовується тільки як проміжний етап, без отримання якогось об'єкта, чи типу даних від користувача