<?php

/*
    2) В БД есть две таблицы:
    * страны (не менее 5 записей)
    * города (не менее 10 записей для каждой записи из первой таблицы)
    Связь 1-N, т.е. каждой стране может принадлежать несколько городов,
    но не наоборот. Сделать веб страницу, на которой будет dropw down со списком стран.
    При выборе страны выводится весь список городов этой страны.
*/

include('db.php');

function getCountries()
{
    $query = "SELECT * FROM country";

    if($result = db()->query($query)){
        while ($country = $result->fetch_object()){
            echo "<option ".sel($country->id, 'country')."value='$country->id'>".$country->name."</option>";
        }
        $result->close();
    }
    db()->close();
}

function getCities()
{
    if(isset($_POST['country'])){
        $post = $_POST['country'];
        $query = "SELECT * FROM city WHERE country_id = $post ORDER BY NAME";
        if($result = db()->query($query)){
            while ($city = $result->fetch_object()){
                echo "<li>".$city->name."</li>";
            }
            $result->close();
        }
    }
    db()->close();
}

function sel($a, $field)
{
    $b = isset($_POST[$field])?$_POST[$field]:NULL;
    if($a == $b) return 'selected="selected"';
}
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
    <h1>Part #2</h1>
</header>
<div id="regions">
    <a href="index.php">Home</a>
    <h3>Find cities of your country</h3>
    <form id="reForm" name="regions" action="<?$_SERVER['PHP_SELF']?>" method="POST">
        <select name="country" onchange="document.getElementById('reForm').submit()">
            <?php getCountries();?>
        </select>
    </form>
    <ol>
        <?php getCities();?>
    </ol>
</div>
</body>
</html>

