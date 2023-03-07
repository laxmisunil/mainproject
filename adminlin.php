
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Regression\LeastSquares;

$samples = [[2022], [2023]];
$targets = [7, 9];

$regression = new LeastSquares();
$regression->train($samples, $targets);

$result_regression = $regression->predict([2024]);

echo $result_regression;





?>