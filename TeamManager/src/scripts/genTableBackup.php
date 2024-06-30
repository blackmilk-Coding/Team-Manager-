
<?php
  include_once "database/ConData.php";
  /*
    Идея для генерации таблицы,
    собрать свой ассоциативный массив,
    где на один ключ, будет приходить несколько значений,
    От каждого ключа, берём по одному значению, и добавляем их в таблицу,
    Одна итерация цикла - одна строка таблицы.

    По ключам во вложенных ассоциативных массивах, найти все значения,
    и составить свой, сортированный массив.
  */
  function GenerationTable($conn , $table){
    //Функция для генерации таблицы
    $sql = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id`");
    $sql = mysqli_query($conn, "INSERT INTO `$table` ('В работе') VALUES ('да')");
    $AsocMass = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    $AsocMassKey = array_keys($AsocMass[0]);
    var_dump($AsocMass);

    $SortMass = array();
    
    foreach($AsocMassKey as $key){
      $SortMass[$key] = array();
      foreach($AsocMass as $mass => $value){
        array_push($SortMass[$key], $value[$key]);
      }
    }

    $SortMassKey = array_keys($SortMass);
    ?>
    <table class='bd-table'>
      <thead class='bd-table-head'>

       <tr>
        <?php
          array_push($SortMass,"информация");
          foreach($SortMass as $key => $value){
            echo "<td>$key</td>";
          ?>
        <?php } ?>
        </tr>
        
      </thead>
      <tbody class='bd-table-body'>
        <?php
          foreach($AsocMass as $key => $value){
           echo "<tr>";
            foreach($value as $key){
                echo "<td>".$key."</td>";
            }
            echo "</tr>";
            echo "</tr>";
            
          }
        ?>
      </tbody>
    </table>
<?php } 