<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Second test task</title>
    <link rel="stylesheet" href="countries.css?<?php echo time(); ?>">
    <script type="text/javascript" src="ajax.js"></script>
</head>
<body>
  <header>
      <h1>The second task</h1>
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
    <div id="intro">
    <ol>
        <h3><li>Part #1: Shows list of countries we have</li></h3>
        <h3><li>Part #2: Shows cities of current country</li></h3>
        <h3><li>Part #3: Shows cities of current country, with pagination</li></h3>
        <h3><li>Part #4: Shows cities of current country, with pagination<br> by using "Search" button</li></h3>
        <h3><li>Part #5: Shows cities of current country, using only "Search" input <br>(by "AJAX")</li></h3>
        <h3><li>Part #6: Shows cities of current country, <br>using "Search"(by "AJAX"), and marker them on the "Map"</li></h3>
    </ol>
    </div>
</body>
</html>