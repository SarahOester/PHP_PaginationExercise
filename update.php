<?php
    require ("src/fooddatabase.php");
    session_start();

    if($_GET['action'] == "search") {
        if(isset($_GET['searchInput'])) {
            $searchString = $_GET['searchInput'];

            $_SESSION['search'] = $searchString;

            // Creates an instance of the FoodDatabase object
            $foodData = new FoodDatabase();

            // Doing a search in the FoodDatabase
            $result = $foodData->SearchByName($searchString);

            // Creates an array of Food objects, based on the IDs returned in the search result
            $foodObjects = [];
            for($i = 0; $i < count($result); $i++) {
                $foodObjects[] = $foodData->GetFoodByID($result[$i]);
            }

            // Saves the array of Food objects in a session an redirects back to the index.php file
            $_SESSION['foodObjects'] = $foodObjects;
            header('location: index.php');
            exit;
        }
    }    
?>