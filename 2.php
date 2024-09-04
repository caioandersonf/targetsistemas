<?php
// Exemplo de entrada de numero informado
$numeroInformado = 21;

function pertenceFibonacci($numero) {
    $a = 0;
    $b = 1;

    if ($numero == $a || $numero == $b) {
        return true;
    }

    while ($b < $numero) {
        $temp = $b;
        $b = $a + $b; 
        $a = $temp;  
    }

    return $b == $numero;
}

if (pertenceFibonacci($numeroInformado)) {
    echo "O número {$numeroInformado} pertence à sequência de Fibonacci.";
} else {
    echo "O número {$numeroInformado} não pertence à sequência de Fibonacci.";
}

?>
