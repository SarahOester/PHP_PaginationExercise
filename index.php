<?php
    require ("src/fooddatabase.php");
    require ("src/pagination.php");
    session_start();
?>

<body>
    <center>
        <form action="update.php" method="get">
            <b>Search:</b><br>
            <input type="text" name="searchInput"
                <?php
                    // Checks if a search session has been set (in update.php), and sets it as the value of the input search field
                    if(isset($_SESSION['search'])) {
                        echo " value=" . $_SESSION['search'];
                    }
                ?>
            ><br>
            <input type="hidden" name="action" value="search">
            <input type="submit" value="Search">
        </form>

        <?php
            if(isset($_SESSION['foodObjects'])) {
                // Saves the SESSION in a local variable
                $foodObjects = $_SESSION['foodObjects'];

                // +------------------+
                // | Pagination START |
                // +------------------+
                // Read the page number from the URL, if it exists - Otherwise the page number is 1
                $pageToShow = 1;

                if (isset($_GET['pageToShow'])){
                    $pageToShow = $_GET['pageToShow'];
                } if ($_GET['pageToShow'] <= 0) {
                    $pageToShow = 1;
                }

                // Instantiate a pagination object (Instantiate = laver en ny kopi af en class eller et object)
                $pagination = new Pagination($foodObjects);
                echo "Total search results: " . $pagination->GetTotalObjects();
                

                // Get and Set the needed information about pagination (objects per page etc.)
                $setObjectsPage = 10;
                $pagination->SetObjectsPerPage($setObjectsPage);
                

                // Get the objects to display on the selected page
                echo "<br>" . "Total pages " . $pagination->GetTotalPages();
                // +----------------+
                // | Pagination END |
                // +----------------+

                // Display a list with all the page numbers

                // Display the total amount of results found from the search
                echo "<br><br>";
                // Displays the page content
                $pageContent = $pagination->GetPageContent($pageToShow);

                for($i = 0; $i < $pagination->GetTotalPages(); $i++) {
                    $pageNumber = $i + 1;
                    echo "<a href='index.php?pageToShow=$pageNumber'>" . $pageNumber . "</a> ";
                }

                echo "<br><br>";

                for($i = 0; $i < count($pageContent); $i++) {
                    echo $pageContent[$i]->DisplayFoodInfo() . "<br><br>";
                }

            }
        ?>

    </center>
</body>