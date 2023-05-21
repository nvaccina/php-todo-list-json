<?php

$json_string = file_get_contents('todo-list.json');
$list = json_decode($json_string, true);

if(isset($_POST['todo-text'])){
  $newItem = [
    "text" => $_POST["todo-text"],
    "done" => false
  ];
  $list[] = $newItem;
  filePut($list);
}

if(isset($_POST['taskToDelete'])){
  $index = $_POST['taskToDelete'];
  array_splice($list, $index, 1);
  filePut($list);
}

function filePut($list){
  file_put_contents('todo-list.json', json_encode($list));
}


header('Content-Type: application/json');
echo json_encode($list);

?>