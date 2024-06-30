<?php
  $host = 'localhost';
  $db_name = "officemanager";
  $user = "root";
  $password = "";


  $conn = @mysqli_connect($host, $user, $password, $db_name);

  if($conn == false){
    die("Ошибка подключения к базе данных");
  }else{
  

  }