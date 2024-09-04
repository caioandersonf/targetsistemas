<?php

// Exemplo de dados de faturamento diário em formato JSON
$jsonFaturamento = '[
    {"dia": 1, "valor": 1000.00},
    {"dia": 2, "valor": 1500.00},
    {"dia": 3, "valor": 0.00},
    {"dia": 4, "valor": 2000.00},
    {"dia": 5, "valor": 0.00},
    {"dia": 6, "valor": 3000.00},
    {"dia": 7, "valor": 0.00},
    {"dia": 8, "valor": 3500.00}
]';

$faturamentoDiario = json_decode($jsonFaturamento, true);

if (!is_array($faturamentoDiario)) {
    die("Erro ao decodificar o JSON de faturamento diário.");
}

$menorFaturamento = PHP_FLOAT_MAX; 
$maiorFaturamento = PHP_FLOAT_MIN; 
$somaFaturamento = 0;
$diasComFaturamento = 0;

foreach ($faturamentoDiario as $dia) {
    $valor = $dia['valor'];
    
    if ($valor > 0) {
        if ($valor < $menorFaturamento) {
            $menorFaturamento = $valor;
        }
        if ($valor > $maiorFaturamento) {
            $maiorFaturamento = $valor;
        }
        $somaFaturamento += $valor;
        $diasComFaturamento++;
    }
}

if ($diasComFaturamento > 0) {
    $mediaMensal = $somaFaturamento / $diasComFaturamento;
} else {
    $mediaMensal = 0;
}

$diasAcimaDaMedia = 0;
foreach ($faturamentoDiario as $dia) {
    $valor = $dia['valor'];
    if ($valor > $mediaMensal) {
        $diasAcimaDaMedia++;
    }
}

if ($diasComFaturamento > 0) {
    echo "Menor valor de faturamento: R$ " . number_format($menorFaturamento, 2, ',', '.') . PHP_EOL;
    echo "Maior valor de faturamento: R$ " . number_format($maiorFaturamento, 2, ',', '.') . PHP_EOL;
    echo "Número de dias com faturamento acima da média: " . $diasAcimaDaMedia . PHP_EOL;
} else {
    echo "Não há dias com faturamento para calcular a média.";
}

?>
