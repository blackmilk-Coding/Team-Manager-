<?php
  //Дописать систему добавление полей!!
  /*
    Получить название ячеек+
    сгенерировать форму для ввода данных+
    проверить данные на валидность, проверить данные на пустоту+ 
  
    отправить данные в базу
    Редирект обратно
  */
  include 'database/ConData.php';

  $table = $_GET['tables'];
  $FormInfo = $_POST;
  $sql = mysqli_query($conn, "SELECT * FROM `$table`");
  $AsocMass = mysqli_fetch_assoc($sql);
  $AsocMassKey = array_keys($AsocMass);


  if(empty($FormInfo)){
    echo "<h1 class='message-form message-form_warning'>Введите нужные данные и отправте их</h1>";
  }else{
    $checkInfo = true;

    foreach($FormInfo as $key => $value){
        if($checkInfo == true){
          if(!empty($FormInfo[$key])){
          echo "<h2 class='message-form message-form_warning'>Проверка</h2>";
          }else{
            echo "<h2 class='message-form message-form_warning'>Вы ввели не все значения!</h2>";
            $checkInfo = false;
          }
        }else{
          break;
        }
      
    }

    if($checkInfo == true){
      $FormInfoID = $FormInfo['id'];
      foreach($AsocMassKey as $key){
        if($key == 'id'){
          $InfoRequest = $FormInfo[$key];
          $sql = mysqli_query($conn, "INSERT INTO `$table` (`$key`) VALUES ('$InfoRequest')");
        }
        else if($key == 'В работе'){
          $keyRequest = 'В_работе';
          $InfoRequest = $FormInfo[$keyRequest];
          $sql = mysqli_query($conn, "UPDATE `$table` SET `$key`='$InfoRequest' WHERE id='$FormInfoID'");
          print_r($sql);
        }else{
          $InfoRequest = $FormInfo[$key];
          $sql = mysqli_query($conn, "UPDATE `$table` SET `$key`='$InfoRequest' WHERE id='$FormInfoID'");
          header("Location: ../../index.php?tables=$table");
        }
      }
    }else{
      echo "С вашими данными что-то не так";
    }
  }
?>


<link rel="stylesheet" href="../../assets/style/editTable.css">
<form action="" method="POST" class="EditTable-form">
  <?php
    foreach($AsocMassKey as $key){
     echo "<label for='{$key}' class='EditTable-form__label'>{$key}:</label>";

     if($key == 'описание'){
      echo "<textarea name=$key class='EditTable-form__input EditTable-form__input_description'></textarea>";
     }
     else if($key == 'Дата'){
      echo "<input type='date'value='' name='{$key}' id='name'  class='EditTable-form__input'>";
     }
     else{
      echo "<input text='text'value='' name='{$key}' id='name'  class='EditTable-form__input'>";
     }
    
    }
?>
  <button type='submit' class="EditTable-form__send">отправить</button>
</form>