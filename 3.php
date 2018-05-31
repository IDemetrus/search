<?php
/*
    3) Всё то же самое из задания 2. Необходимо реализовать простейший пейджинг.
    Т.е. города показывать списком по 5 записей.
    Для просмотра следующих 5 записей должна быть кнопка (или ссылка) "вперед",
    для возврата к предыдущим результатам - кнопка "назад".
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
        $page = 0;

        if(isset($_POST['next'])){
            $page += 5;
        }
        if(isset($_POST['prev'])){
            $page = 0;
        }
        $query = "SELECT * FROM city WHERE country_id = $post ORDER BY NAME LIMIT $page, 5";
        $result = db()->query($query);
        $rows = $result->num_rows;
    }
    $page++;
    echo  "<ol start=". $page .">";
    if($rows){
        while ($city = $result->fetch_object()){
            echo "<li>".$city->name."</li>";
        }
        $result->close();
    }
    echo "</ol>";

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
    <h3>Part #3</h3>
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
    <form id="reForm" name="regions" action="<?$_SERVER['PHP_SELF']?>" method="POST">
        <select name="country" onchange="document.getElementById('reForm').submit()">;
            <?php getCountries()?>
        </select>
            <?php getCities()?>
        <input name="prev" type="submit" formmethod="post" value="Prev">
        <input name="next" type="submit" formmethod="post" value="Next">
    </form>
</div>
</body>
</html>

