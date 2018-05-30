<?php
/*
    4) Таблицы из задания 2. Сделать веб страницу, на которой будет input field и кнопка "поиск".
    В поле ввода вводится название страны (целиком или частично), по нажатию на кнопку показываются все города,
    которые принадлежат стране, в названии которой есть строка из поля ввода. Плюс пейджинг из задания 3.
    Пример: если вводим строку "шве" в поле ввода, то показываются города для Швеции, Швейцарии и т.д.
*/
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Second test task</title>
    <link rel="stylesheet" href="countries.css?<?php echo time(); ?>">
</head>
<body>
<header>
    <h1>Part #4</h1>
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
    <form action="<?$_SERVER['REQUEST_URI']?>" method="get">
        <input type="text" name="query">
        <input type="submit" name="search" value="search">
    </form>

<?php
if(isset($_GET['search']) && !empty($_GET['query'])){
    $countryName = strip_tags($_GET['query']);
    $countryName = strtolower(preg_replace("#[^a-zA-Z0-9-_\.~]#","", $countryName));
    $countryQuery = "SELECT * FROM country WHERE name LIKE '%{$countryName}%'";
    $countryResult = db()->query($countryQuery);
    $country = $countryResult->fetch_assoc();
}
if(isset($_GET['prev'])){
    $page = 0;
}else if(isset($_GET['next'])){
    $page += 5;
}else{
    $page = 0;
}
$cityQuery = "SELECT * FROM city WHERE country_id = '{$country['id']}' ORDER BY NAME LIMIT $page, 5";
$cityResult = db()->query($cityQuery);
$page++;

echo "<ol start='$page'>";
while($city = $cityResult->fetch_assoc()){
    echo "<li>".$city['name'] ."</li>";
}
echo "</ol>";
echo "<a href=\"?query=$countryName&search=search&prev\">Prev</a>";
echo "<a href=\"?query=$countryName&search=search&next\">Next</a>";

$cityResult->close();
db()->close();

?>
</div>
</body>
</html>
