# new_skills

#####
1. Складіть програму, яка перевіряє коректність балансу дужок у арифметичному вираженні, тобто. що дужки встановлені правильно і правильно їх входження, тобто якщо дужки так розташовані [({})] , то це правильне входження, а ось [([) - неправильне. Вхідний параметр - Рядок - арифметичний вираз; Вихідний параметр - "Вірно"; "Невірно". Використовувати функцію eval не можна.
##### there are two strings: correct and incorrect: 

```php
$stringCorrect = "[1(8*9{a + b = c})A - B]";
$stringInCorrect = "[(4-2[a-b)";

  ```
##### and two ways:
###### with regexp:

```php

  
$pattern = "/\[.*?\(.*?\{.*?\).*?\]/s";
$regexp1 = preg_match_all($pattern, $stringCorrect);
$regexp2 = preg_match_all($pattern, $stringInCorrect);
print_r($regexp1);
print_r($regexp2);
  ```
#### or array:
```php
$service = array("[" => "1", "(" => "2", "{" => "3",  "}"  => "3", ")" => "2", "]" => "1");
$result1 = check($stringCorrect, $service);
$result2 = check($stringInCorrect, $service);


function check(string $string, array$service): string 
{
    $chars = preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY);
   
    $testArray = [];
    foreach($chars as $char)
    {
        if(array_key_exists($char, $service))
        {
            $testArray[] = $char;
        }
    }
    $result = [];
    $i = 0;
    $x = count($testArray);
    $x--;
    for ($i = 0; $i < count($testArray); $i++) {
        if($service[$testArray[$i]]  == $service[$testArray[$x]]){
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
echo "result1:: ".$result1."<br>";
echo "result:: ".$result2."<br>";
  ```
##2
##### sql
2. Напишіть запит, який шукає неунікальні значення id в таблиці CREATE TABLE (id int not null, name text);
```sql
    SELECT id FROM table GROUP BY id HAVING COUNT(id)>1;
 ```
