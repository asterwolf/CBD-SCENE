 <?php
include_once("config.php");
include("consoleLog.php");


try {
    $conn = new PDO("pgsql:host=$hostname;dbname=$db;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($conn){
        // echo "Connected successfully\n";

        $sql = "SELECT * FROM product";
        writeMsg("QUERY", $sql);

        $numOfColumns = 0;
        foreach ($conn->query($sql) as $row) {
            $numOfColumns += 1;
            // Create row if theres more columns
            if (($numOfColumns % 3) === 1) {
                echo "<div class=\"row\">";
            }

            echo "<div class=\"col-sm\">";
            echo "<div class=\"card border border-dark\" style=\"width: 18rem;\">";
            echo "<img src=\"./images/aponi.jpg\" class=\"card-img-top\" alt=\"...\">";
            echo "<div class=\"card-body\">";
            echo "<h5 class=\"card-title\">" . $row['name'] . "</h5>";
            echo "<p class=\"card-text\">" . $row['description'] . "</p>";
            echo "<p class=\"card-text\">$" . $row['price'] / 100 . "</p>";
            echo "<a href=\"viewProduct.html\" class=\"btn btn-primary\">View Product</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            // Row div end
            if (($numOfColumns % 3) === 0) {
                echo "</div>";
            }
            writeMsg("RESULT", $row['name']);
        }
    }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    echo "\n";
    }
?>
