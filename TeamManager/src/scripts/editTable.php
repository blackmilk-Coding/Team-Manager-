<?php
  include 'database/ConData.php';


  $table = $_GET['table'];
  $id = $_GET['id'];
  $FormInfo = $_POST; //Данные с формы редактирования
  $sql = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id` = $id");

  $AsocMass = mysqli_fetch_assoc($sql);


  if(!empty($FormInfo)){
    foreach($AsocMass as $key => $value){

      if($key == 'В работе'){
        $keyRequest = 'В_работе';
        $InfoRequest = $FormInfo[$keyRequest];
        $sql = mysqli_query($conn, "UPDATE `$table` SET `$key`='$InfoRequest' WHERE id='$id'");
        print_r($sql);
      }

      else{
        $InfoRequest = $FormInfo[$key];
        $sql = mysqli_query($conn, "UPDATE `$table` SET `$key`='$InfoRequest' WHERE id='$id'");
        header("Location: ../../index.php?tables=$table");
      }


    }
  }else{
    echo "<h1 class='message-form message-form_warning'>Редактируйте нужные данные и отправте их</h1>";
  }
  
?>
<link rel="stylesheet" href="../../assets/style/editTable.css">
<form action="" method="POST" class="EditTable-form">
  <?php
    foreach($AsocMass as $key => $value){
     echo "<label for='{$key}' class='EditTable-form__label'>{$key}:</label>";
    
     if($key == 'описание'){
      echo "<textarea name=$key class='EditTable-form__input EditTable-form__input_description'>$value</textarea>";
     }
     else if($key == 'Дата'){
      echo "<input type='date'value='{$value}' name='{$key}' id='name'  class='EditTable-form__input'>";
     }
     else if($key == 'id'){
      echo "<input text='text'value='{$value}' name='{$key}' id='name'  readonly class='EditTable-form__input'>";
     }
     else{
      echo "<input text='text'value='{$value}' name='{$key}' id='name'  class='EditTable-form__input'>";
     }
    
    }
?>
  <button type='submit' class="EditTable-form__send">отправить</button>
</form>