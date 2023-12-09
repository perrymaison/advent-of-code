<?php
$fileName = 'input.txt';

const BLUE = 'blue';
const GREEN = 'green';
const RED = 'red';

$cubesArr = [
	BLUE => 0,
	GREEN => 0,
	RED => 0
];

$red = 12;
$green = 13;
$blue = 14;

$gameNum = 1;
$finalSum = 0;
foreach (file($fileName) as $str) {
	$parse = explode(':', $str);
	$gameNum = (int)trim($parse[0], "Game ");
	$game = trim($parse[1]);
	$rounds = explode(';', $game);
	$roundNum = 0;
	$needSum = true;
	foreach ($rounds as $round) {
		$resultArr[$roundNum] = $cubesArr;
		$round = trim($round);
		$roundArr = explode(',', $round);
		foreach ($roundArr as $cube) {
			$cube = trim($cube);
			list($num, $color) = parseColor($cube);
			if (!is_null($color)) {
				$resultArr[$roundNum][$color] += $num;
			}
		}

		if ($resultArr[$roundNum][BLUE] > $blue || $resultArr[$roundNum][RED] > $red || $resultArr[$roundNum][GREEN] > $green) {
			$needSum = false;
			break;
		}
	}

	if ($needSum) {
		$finalSum += $gameNum;
	}
}

if (1);

function parseColor($cube) {
	$cubeArr = str_split($cube);
	$count = count($cubeArr);

	$num = '';
	$word = '';
	$max = 6;
	for ($i = 0; $i < $count; $i++) {
		if (is_numeric($cubeArr[$i])) {
			$num .= $cubeArr[$i];
			continue;
		}

		if ($cubeArr[$i] === " ") {
			continue;
		}
		$word .= $cubeArr[$i];
		for ($c = 1; $c != $max; $c++) {
			if (!isset($cubeArr[$i + $c])) {
				return null;
			}
			$word .= $cubeArr[$i + $c];
			switch ($word) {
				case BLUE:
					return [$num, BLUE];
				case GREEN:
					return [$num, GREEN];
				case RED:
					return [$num, RED];
			}
		}
	}
}
