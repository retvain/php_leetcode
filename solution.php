<?php

declare(strict_types=1);

use Solutions\S47\Solution as Solution47;

require_once 'vendor/autoload.php';

$solutionNum = $argv[1] ?? null;

if (empty($solutionNum)) {
    throw new Exception("Please, enter num of solution. Example: php solution.php 47");
}

switch ((int)$solutionNum) {
    case 47:
        $solution = new Solution47;
        break;
    default:
        throw new Exception("$solutionNum - is the number of a non-existent solution.");
}

$solution->run();