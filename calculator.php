<?php

function validate($inputParam) {
    $splitedInput = explode(" ", $inputParam);
    return (count($splitedInput) === 3)
    and is_numeric($splitedInput[0])
    and is_numeric($splitedInput[2])
    and in_array($splitedInput[1], ["+","-","*","/","**","%"]);
}

function calculate($num1, $operator, $num2) {
    switch($operator) {
        case "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case "*":
            return $num1 * $num2;
        case "/":
            return $num1 / $num2;
        case "**":
            return pow($num1, $num2);
        case "%":
            return $num1 % $num2;
    }
}

while(1) {
    $userInput = readline("Введіть вираз (напр. 11 - 3): ");
    if (!validate($userInput)) {
        echo "Введіть в форматі: 12 * 32. Можливі оператори - +; -; *; /; **; %\n";
        continue;
    }
    $splitedInput = explode(" ", $userInput);
    $number1 = $splitedInput[0];
    $number2 = $splitedInput[2];
    $operator = $splitedInput[1];

    $resultNumber = calculate($number1, $operator, $number2);
    echo "Результат: $resultNumber \n";
}
