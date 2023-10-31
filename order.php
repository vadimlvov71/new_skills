<?php

$service = array("[" => "1", "(" => "2", "{" => "3",  "}"  => "3", ")" => "2", "]" => "1"); //Add your actual array here
$stringCorrect = "[1(8*9{a + b = c})A - B]";
$stringInCorrect = "[(4-2[a-b)";

$result1 = check($stringCorrect, $service);
$result2 = check($stringInCorrect, $service);


function check(string $string, array $service): string
{
    $chars = preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY);

    $testArray = [];
    foreach ($chars as $char) {
        if (array_key_exists($char, $service)) {
            $testArray[] = $char;
        }
    }
    $result = [];
    $i = 0;
    $x = count($testArray);
    $x--;
    for ($i = 0; $i < count($testArray); $i++) {
        if ($service[$testArray[$i]] == $service[$testArray[$x]]) {
            $result[$service[$testArray[$i]]] = $service[$testArray[$x]];
        }
        $x--;
    }

    if (count($result) == 3) {
        return "true";
    } else {
        return "false";
    }
}
echo "result1:: " . $result1 . "<br>";
echo "result:: " . $result2 . "<br>";

$pattern = "/\[.*?\(.*?\{.*?\).*?\]/s";
$regexp1 = preg_match_all($pattern, $stringCorrect);
$regexp2 = preg_match_all($pattern, $stringInCorrect);
print_r($regexp1);
print_r($regexp2);


//SELECT id FROM table GROUP BY id HAVING COUNT(id)>1;
