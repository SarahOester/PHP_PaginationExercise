<?php
    // Getting access to the Food class object
    require ('food.php');

    class FoodDatabase {
        private $server = "127.0.0.1"; // Change to domain name, e.g. www.iloveunicorns.com
        private $username = "root"; // Change to the admins username of the server
        private $password = "abc123"; // Change to the admins password of the server
        private $database = "foodwaste"; // Change to the name of the database you would like to connect to on the server

        private $mySQL;

        // The constructor that aautomatically connects when an instance of this object is created
        function __construct() {
            $this->mySQL = new mysqli($this->server, $this->username, $this->password, $this->database);
        }

        // Search method that finds all food products, which name contains the search input
        public function SearchByName($searchInput) {
            $allResults = [];
            
            // SQL for finding food products that BEGINS with the search input
            $sql = "SELECT id FROM food WHERE foodName LIKE ('$searchInput%')";

            // Get all the results and save them in an array
            $result = $this->mySQL->query($sql);
            while($row = $result->fetch_assoc()) {
                $allResults[] = $row['id'];
            }

            // SQL for finding food products that CONTAINS the search input
            $sql = "SELECT id FROM food WHERE foodName LIKE ('%$searchInput%')";

            // Get all the results and save them in an array
            $result = $this->mySQL->query($sql);
            while($row = $result->fetch_assoc()) {
                // Checking for duplicates. Do NOT add the result if it's already in the array
                if(!in_array($row['id'], $allResults)) {
                    $allResults[] = $row['id'];
                }
            }

            // Return an array of food IDs
            return $allResults;
        }

        // Returns a Food object based on a specific ID
        public function GetFoodByID($foodID) {
            $sql = "SELECT * FROM food WHERE id = '$foodID' LIMIT 1";
            $result = $this->mySQL->query($sql);
            return $result->fetch_object("Food");
        }
    }


?>