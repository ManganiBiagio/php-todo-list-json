<?php
$tasks=$_POST['list'];
$decostructingTasks=[];
foreach($tasks as $task){
    $decostructingTasks[]=[
        "message"=>$task["message"],
        "done"=>$task["done"]
    ];

}


$tasksJson = json_encode($decostructingTasks, JSON_PRETTY_PRINT);
file_put_contents("../tasks.json", $tasksJson);
header("Content-Type: application/json");
echo $decostructingTasks;