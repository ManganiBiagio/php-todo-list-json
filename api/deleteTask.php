<?php

$taskList = file_get_contents("../tasks.json");
$taskList = json_decode($taskList,true);
$indice;
foreach($taskList as  $i=>$task){
    if($_POST["id"]===$task["id"]){
        $indice=$i;
    }
    
}
array_splice($taskList,$indice,1);

$tasksJson = json_encode($taskList, JSON_PRETTY_PRINT);
file_put_contents("../tasks.json", $tasksJson);
header("Content-Type: application/json");

