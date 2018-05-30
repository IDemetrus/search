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
    <h1>Part #6</h1>
</header>
<div id="regions">
    <a href="index.php">Home</a>
    <h3>Find cities of your country</h3>
    <form>
        Search: <input type="text" id="inp" onkeyup="showResults(this.value)">
    </form>
    <ol id="matches"></ol>
    <div id="btn">
        <button value="prev" onclick="showPagination(this.value)">Prev</button>
        <button value="next" onclick="showPagination(this.value)">Next</button>
    </div>
</div>
</body>
</html>

