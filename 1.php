<?php
/*
     1) В БД есть одна таблица, которая содержит страны (не менее 5 записей).
    Сделать веб страницу, на которой будет выводится весь список стран из этой таблицы
*/
include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Second test task</title>
    <link rel="stylesheet" href="countries.css?<?php echo time(); ?>">
</head>
<body>
  <header>
      <h1>Part #1</h1>
  </header>
  <div id="regions">
      <a href="index.php">Home</a>
      <h3>Find all countries</h3>
      <?php
      if($result = db()->query("SELECT * FROM country")){
          echo "<ol type='1'>";
          while ($country = $result->fetch_object()){
              echo "<li>".$country->name."</li>";
          }
          $result->close();
          echo "</ol>";
          db()->close();
      }
      ?>
  </div>
</body>
</html>
