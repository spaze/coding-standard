<?php
declare(strict_types = 1);

$rules = simplexml_load_file('src/ruleset.xml');
$refs = $refsSorted = [];
foreach ($rules->rule as $rule) {
	$refs[] = (string)$rule['ref'];
}
$refsSorted = $refs;
sort($refsSorted, SORT_NATURAL | SORT_FLAG_CASE);
$diff = array_diff_assoc($refs, $refsSorted);
if (count($diff)) {
	printf("Rules not sorted: %s should be listed before %s\n", $diff[array_key_last($diff)], $diff[array_key_first($diff)]);
	exit(1);
} else {
	echo "Rules sorted just about right\n";
	exit(0);
}
