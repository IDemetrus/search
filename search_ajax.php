<?php
include('db.php');

$coName = $_REQUEST["q"];

$coQuery = "SELECT * FROM country WHERE name LIKE '%{$coName}%'";
$coResult = db()->query($coQuery);
if ($countries = $coResult->fetch_assoc()){
    $countriesName = $countries['name'];
    echo "<div id='curResult'>".$countriesName."</div>";

    $coId = $countries['id'];
    $coRows = $coResult->num_rows;
    $pageNew = 0;
	
    if($coRows > 1){
        $count = 5;
    }else{
        $count = 5;
    }
    if($_GET['page'] == 'next'){
        $pageNew += 5;
    };
	
    $ciQuery = "SELECT * FROM city WHERE country_id = '{$coId}' ORDER BY NAME LIMIT $pageNew, $count";
    $ciResult = db()->query($ciQuery);
	
    while ($city = $ciResult->fetch_object()){	
        echo "<li>".$city->name."</li>";
    }
}
db()->close();
?>

