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
      <h3>Part #1</h3>
  </header>
    <div id="nav">
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="1.php">Part #1</a></li>
            <li><a href="2.php">Part #2</a></li>
            <li><a href="3.php">Part #3</a></li>
            <li><a href="4.php">Part #4</a></li>
            <li><a href="5.php">Part #5</a></li>
            <li><a href="6.php">Part #6</a></li>
        </ul>
    </div>
    <div id="regions">
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
