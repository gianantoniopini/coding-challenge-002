#!/usr/bin/php -q
<?php 
class Person
{
    public $name;
    public $nameLength;
    public $yearOfBirth;
}

$json = file_get_contents("./persons.json");
$jsonData = json_decode($json, true);

$persons = array();

foreach($jsonData as $jsonDataRow)
{
    $person = new Person();
    $person->name = $jsonDataRow["name"];
    $person->nameLength = mb_strlen($person->name, 'UTF-8');
    $person->yearOfBirth = $jsonDataRow["year of birth"];
    $persons[] = $person;
    //echo $person->name.' - '.$person->nameLength;
    //echo "\n";
}

usort($persons, fn($p1, $p2) => $p2->nameLength - $p1->nameLength);
$personWithLongestName = $persons[0];
//echo $personWithLongestName->name;
//echo "\n";
$personWithShortestName = $persons[count($persons) - 1];
//echo $personWithShortestName->name;
//echo "\n";
$yearsDifference = $personWithShortestName->yearOfBirth - $personWithLongestName->yearOfBirth;
echo $yearsDifference.' years difference';
echo "\n";
?>
