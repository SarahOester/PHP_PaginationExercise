<?php

class Pagination {
    private $fullObjectArray = [];
    private $objectsPerPage = 10;

    function __construct(array $fullArray) {
        $this->fullObjectArray = $fullArray;
    }

    public function SetObjectsPerPage($value) {
        // Makes sure the value can not be 0 or negative
        $this->objectsPerPage = $value;
    }

    public function GetTotalPages() {
        // Return the number of total pages    
        $x = ceil($this->GetTotalObjects() / $this->objectsPerPage);
        return $x;
    }

    public function GetTotalObjects() {
        // Return the number of total objects
        return count($this->fullObjectArray);
    }

    public function GetPageContent($pageToShow) {
        // Restrict the current page to be within the boundaries of pages available, and must not be less than 1
        $offset = ($pageToShow - 1) * $this->objectsPerPage;

        // Calculate the offset, used for slicing the array, to display the correct objects
        $slicedArray = array_slice($this->fullObjectArray, $offset, $this->objectsPerPage);
        return $slicedArray;
        // Slice the full array into a chunk

        // Return the sliced array
    }
}

?>