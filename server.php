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

function filePut($list){
  file_put_contents('todo-list.json', json_encode($list));
}


header('Content-Type: application/json');
echo json_encode($list);

?>