<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Second test task</title>
    <link rel="stylesheet" href="countries.css?<?php echo time(); ?>">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
</head>
<body>
<header>
    <h3>Part #6</h3>
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
        <form>
            <input type="text" id="inp" placeholder="Search.." onkeyup="showResults(this.value)">
        </form>
        <div id="map" style="width: 100ex; height: 50ex">
            <script type="text/javascript">
                ymaps.load(init);
                    let myMap;
                    function init(){
                        myMap = new ymaps.Map("map", {
                            center: [51.51, -0.08],
                            zoom: 2
                        });
                    }
            </script>
        </div>
        <ol id="matches"></ol>
        <div id="btn">
            <input type="button" value="prev" onclick="showPagination(this.value)">
            <input type="button" value="next" onclick="showPagination(this.value)">
        </div>
        <div id="mapResults"></div>
    </div>
</body>
</html>