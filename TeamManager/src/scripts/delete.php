<?php
  include_once "database/ConData.php";
  /*
    скрипт на удаление строки из базы данных
    Получить название таблицы и id удаляемого элемента таблицы
    проверить есть ли эти значение в базе данных
    удалить значение из базы данных,
    сделать редирект на главную страницу.

  */


  $table = $_GET['table'];
  $id = $_GET['id'];

  if(!(isset($table)) && !(isset($id))){
    echo $table.'<br>'.$id;

  }else{
    // Логика проверки sql запроса, почему-то не работает, нужно изучить обработку sql запросов
    $sql = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id` = $id");
    if($sql != false){
      $sql = mysqli_query($conn, "DELETE FROM `$table` WHERE `id` = $id");
      header("Location: ../../index.php?tables={$table}");

    }else{
      echo "<h1>Это не работает</h1>";
    }
  }

  