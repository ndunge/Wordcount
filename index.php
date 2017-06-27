<?php

/*concatenate content from the three files*/
$contents = '';
$files = [ 'one.txt', 'two.txt', 'three.txt' ]; 
$dir='C:\xampp\htdocs\counting\\';
foreach($files as $file) {
    $filename = $dir . $file;
    $contents .= file_get_contents($filename);
}

/*split $contents into array of substrings  */

$wordArray = preg_split('/[^a-z]/', strtolower($contents), -1, PREG_SPLIT_NO_EMPTY);

/* "stop words", filter them */

$filteredArray = array_filter($wordArray, function($x){

return !preg_match("/^(.|a|an|and|the|this|at|in|or|of|is|for|to)$/",$x);

});

/* get associative array of values from $filteredArray as keys and their frequency count as value */

$wordFrequencyArray = array_count_values($filteredArray);

/* Sort array from higher to lower, keeping keys */

arsort($wordFrequencyArray);
echo '<pre>';
print_r($wordFrequencyArray);
echo '</pre>';