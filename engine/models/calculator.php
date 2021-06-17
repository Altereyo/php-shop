<?php

function getCalculator() {
    $values = [
        'num1' => (int)$_POST['num1'],
        'num2' => (int)$_POST['num2'],
        'operation' => (string)$_POST['operation'],
    ];
    $values['result'] = calculate($values['num1'], $values['num2'], $values['operation']);
    return $values;
}

function calculate ($a, $b, $operation) {
    switch ($operation) {
        case "addition":
            return $a + $b;
        case "subtraction":
            return $a - $b;
        case "multiplication":
            return $a * $b;
        case "division":
            return $b == 0 ? "Ошибка деления на ноль" : ($a / $b);
    }
}