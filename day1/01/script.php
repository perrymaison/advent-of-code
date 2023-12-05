<?php

$fileName = 'input.txt';

$handle = fopen($fileName ,'r');
if (!$handle) {
	echo "Ошибка при открытии файла $fileName";
}
$nums = [];
$sum = 0;
while (false !== ($char = fgetc($handle))) {
	switch ($char) {
		case is_numeric($char):
			$nums[] = (int)$char;
			break;
		case $char == PHP_EOL:
			$count = count($nums);
			$first = $nums[0];
			if ($count == 1) {
				$finalNum = (int)"$first$first";
				$sum += $finalNum;
			} else {
				$last = $nums[$count - 1];
				$finalNum = (int)"$first$last";
				$sum += $finalNum;
			}
			$nums = [];
			break;
		case !is_numeric($char):
			break;
	}
}

echo $sum;