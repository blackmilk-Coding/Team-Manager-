<?php
  include_once "database/ConData.php";

  $id = $_GET['id'];
  $table = $_GET['table'];
  $sql = mysqli_query($conn, "SELECT * FROM `$table` WHERE `id` = $id");
  $AsocMass = mysqli_fetch_all($sql, MYSQLI_ASSOC);
  $MyAsocMass = $AsocMass[0]; 

?>

<main>
<link rel="stylesheet" href="../../assets/style/genPage.css">
  <h1>Таблица: <?php echo  $table ?></h1>
  <div class='GenPageCard'>
    <nav class='GenPageCard-nav'>
      <div class='GenPageCard-nav__id'>
        <h3><?php echo $MyAsocMass['id']?></h3>
        <?php unset($MyAsocMass['id']);?>
      </div>
      <div class='GenPageCard-nav__name'>
          <h3><?php echo $MyAsocMass['Название']?></h3>
          <?php unset($MyAsocMass['Название']) ?>
      </div>
    </nav> 
    <div class="GenPageCard-description">
      <h2>Описание:</h2>
      <div class="GenPageCard-description__text">
        <?php echo $MyAsocMass['описание']?>
        <?php unset($MyAsocMass['описание']);?>
      </div>
    </div>

    <div class="GenPageCard-description__otherInfo">
      <h2>Другая информация:</h2>
      <?php
        foreach($MyAsocMass as $key => $value){
          echo '<p>'.$key.':<p>';
          echo '<p class="GenPageCard-description__otherInfo_info">'.$MyAsocMass[$key].'<p>';
        }
      ?>
    </div>
  </div>
</main>