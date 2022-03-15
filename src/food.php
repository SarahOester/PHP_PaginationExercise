<?php
    class Food {
        private $id;
        private $foodGroup;
        private $foodName;
        private $eneryKJ;
        private $energyKCAL;
        private $protein;
        private $fat;
        private $carb;
        private $fiber;
        private $waste;
        
        // Simple display of the most basic nutritions
        public function DisplayFoodInfo() {
            $returnString = "<b>" . $this->foodName . "</b>";
            $returnString .= "<br>Kcal: " . $this->energyKCAL;
            $returnString .= "&nbsp;&nbsp;&nbsp;&nbsp;";
            $returnString .= "Protein: " . $this->protein;
            $returnString .= "&nbsp;&nbsp;&nbsp;&nbsp;";
            $returnString .= "Fat: " . $this->fat;
            $returnString .= "&nbsp;&nbsp;&nbsp;&nbsp;";
            $returnString .= "Carbs: " . $this->carb;
            return $returnString;
        }
    } 
?>