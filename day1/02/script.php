<?php

$fileName = 'input.txt';

$sum = 0;
$preparedArr = [];
$strNum = 0;
$finalSum = 0;
foreach (file($fileName) as $str) {
	$strArr = str_split(trim($str));
	$finalStrArr = [];

	for ($i = 0; $i < count($strArr); $i++) {
		if (is_numeric($strArr[$i])) {
			$finalStrArr[$strNum][] = (int)$strArr[$i];
		} else {
			$strForNum = checkStrForNum($strArr, $i);
			if (!is_null($strForNum)) {
				$finalStrArr[$strNum][] = $strForNum;
			}
		}
	}

	$count = count($finalStrArr[$strNum]) - 1;
	$firstNum = $finalStrArr[$strNum][0];
	$lastNum = $finalStrArr[$strNum][$count];
	$finalNum = (int)"$firstNum$lastNum";
	$finalSum += $finalNum;
	$strNum++;
}

echo $finalSum;

function checkStrForNum($str, $i) {
	$max = 5;
	$word = '';
	$word .= $str[$i];
	for ($c = 1; $c != $max; $c++) {
		if (!isset($str[$i + $c])) {
			return null;
		}
		$word .= $str[$i + $c];
		switch ($word) {
			case "one":
				return 1;
			case "two":
				return 2;
			case "three":
				return 3;
			case "four":
				return 4;
			case "five":
				return 5;
			case "six":
				return 6;
			case "seven":
				return 7;
			case "eight":
				return 8;
			case "nine":
				return 9;
		}
	}

	return null;
}

