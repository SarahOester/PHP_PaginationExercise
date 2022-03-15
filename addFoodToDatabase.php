<?php
    require ("src/mysql.php");

    $mysql = new MySQL();
    $mysql->SetDatabase("eaaa");
    $mysql->Connect();

    $sqlCreateTable = file_get_contents("sql/foodTable.sql");
    $mysql->mySQL->query($sqlCreateTable);

    $database = json_decode(file_get_contents("json/Food Database.json"), true);
    $food = $database['data'];

    for($i = 1; $i < count($food); $i++) {
        $id = $food[$i]['Id'];
        $group = $food[$i]['Group'];
        $name = $food[$i]['Name'];
        $kj = $food[$i]['Energy(kJ)'];
        $kcal = $food[$i]['Energy(kcal)'];
        $protein = $food[$i]['Protein'];
        $fat = $food[$i]['Fat'];
        $carb = $food[$i]['Carb'];
        $fiber = $food[$i]['Fiber'];
        $waste = $food[$i]['Waste'];

        $sql = "INSERT INTO food (id, foodGroup, foodName, energyKJ, energyKCAL, protein, fat, carb, fiber, waste) VALUES ('$id','$group','$name','$kj','$kcal','$protein','$fat','$carb','$fiber','$waste')";
        echo $mysql->mySQL->query($sql);
    }
?>