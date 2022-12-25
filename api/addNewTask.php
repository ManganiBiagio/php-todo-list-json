<?php

$tasks = file_get_contents("../tasks.json");

$tasks = json_decode($tasks, true);

$newTask = [
  "message" => $_POST["message"],
  "done" => $_POST["done"],
  "id"=>uniqid(),
  "createdAt"=>date("G:i  d/n/Y")
];

$tasks[] = $newTask;

$tasksJson = json_encode($tasks, JSON_PRETTY_PRINT);

file_put_contents("../tasks.json", $tasksJson);

header("Content-Type: application/json");
echo json_encode($newTask);