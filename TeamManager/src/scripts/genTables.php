<?php

include_once "database/ConData.php";


function GenerationTable($conn , $table){
  //Функция для генерации таблицы
  $sql = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`");
  $AsocMass = mysqli_fetch_all($sql, MYSQLI_ASSOC);

  // $sql2 = mysqli_query($conn, "INSERT INTO $table (id,Название) VALUES ('2','Александр')"); 
  if($AsocMass == false){
    echo "<h1 style='color:red;'>Таблица пуста!</h1>";
  }else{
    $AsocMassKey = array_keys($AsocMass[0]);

    echo "<table class='bd-table'>";

      echo "<thead class='bd-table-head'>";
      echo "<tr><td><a href=src/scripts/addTable.php?tables=$_GET[tables]>Добавить поле</a></td></tr>";
      //Ключами заполняем названия ячеек
        echo "<tr class='bd-table-head__item'>";
        array_push($AsocMassKey, 'информация' , 'удалить', 'редактировать');
          foreach($AsocMassKey as $key){
            
            if($key == 'описание'){
              echo "<td class='description-table'>{$key}</td>";
            }else{
              echo "<td>{$key}</td>";
            }
          }
        echo "</tr>";
  
      echo "</thead>";
      echo "<tbody class='bd-table-body'>";
      //Получаем сами значения массива
        foreach($AsocMass as $key => $value){
          echo "<tr class='bd-table-body__item'>";
          foreach($value as $key){
            echo '<td><p class="bd-table-body__item__text">'.$key.'</p></td>';
          }
          
          echo "<td><a href=src/scripts/genPage.php?table={$table}&id={$value['id']}>информация</a></td>";
          echo "<td><a href=src/scripts/delete.php?table={$table}&id={$value['id']}>Удалить</a></td>";
          echo "<td><a href='src/scripts/editTable.php?table={$table}&id={$value['id']}'>редактировать</a></td>";
  
          echo "</tr>";
        }
      echo "</tbody>";
    echo "</table>";
  }
}
