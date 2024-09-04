<?php

// Exemplo de string que será invertida
$stringOriginal = "target sistemas";

function inverterString($str) {
    $stringInvertida = '';
    $tamanho = strlen($str);

    for ($i = $tamanho - 1; $i >= 0; $i--) {
        $stringInvertida .= $str[$i]; 
    }

    return $stringInvertida;
}

$stringInvertida = inverterString($stringOriginal);
echo "String original: $stringOriginal\n";
echo "String invertida: $stringInvertida\n";

?>
