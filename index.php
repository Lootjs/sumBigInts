<?php

/*
function sumStrings(...$args)
{
    return bcadd(...$args);
}*/


function sumStrings(string $firstOperand, string $secondOperand) 
{
    $firstOperandLength = strlen($firstOperand);
    $secondOperandLength = strlen($secondOperand);
    $maxLength = max($firstOperandLength, $secondOperandLength);
    
    if ($firstOperandLength < $maxLength) {
        $firstOperand = sprintf('%0' . $maxLength . 'd', $firstOperand);
    }
    
    if ($secondOperandLength < $maxLength) {
        $secondOperand = sprintf('%0' . $maxLength . 'd', $secondOperand);
    }
    
    $append = 0;

    for ($i = $maxLength - 1; $i >= 0; $i--) {
        $append += (int)$firstOperand[$i] + (int)$secondOperand[$i];
        $firstOperand[$i] = (string)($append % 10);
        $append = (int)($append / 10);
    }
    
    if ($append > 0) {
        $firstOperand = (string) $append . $firstOperand;
    }
    
    return $firstOperand;
}


echo sumStrings('4564575675734634523480234568679345345678568', '8956764567877895634585512344568784564748597');
