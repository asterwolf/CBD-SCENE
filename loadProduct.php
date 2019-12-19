 <?php
include('./config.php');

function writeMsg($action, $msg) {
    echo "<script>console.log('" . $action . ": " . $msg . "' );</script>";
}

function viewProduct(){
    try {
        $conn = new PDO("pgsql:host=" . hostname . ";dbname=" . db .";", username, password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($conn){
            $prodName = $_GET['name'];
            // writeMsg("INPUT", $prodName);
            $sql = "SELECT * FROM product WHERE name=" . $prodName;
            $row = $conn->query($sql)->fetch();
            echo "<div class=\"col-sm-8\">";
            echo "<img src = \"images/" . $row['name'] . ".jpg\"> </img>";
            echo "</div>";
            echo "<div class=\"col-sm-4\">";
            echo "<h1><strong>" . $row['name'] . "</strong></h1>";
            echo "<h2><strong> $" . $row['price'] / 100 . "</strong> </h2>";
            echo "<h6><strong> Description: </strong><h6>";
            echo "<p>" . $row['description'] .  "</p>";
            echo "<form>";
            echo "<div class=\"qty mt-5\">";
            echo "<h6><strong>  Quantity </strong> <h6>";
            echo "<input type=\"number\" class=\"count\" id=\"qty\" value=\"1\">";
            echo "</div>";
            echo "<button type=\"button\" class=\"btn btn-primary\" onclick='addToCart(\"" . $row['id'] . "\", document.getElementById(\"qty\").value)'>Add to Cart</button>";
            echo "</form>";
            echo "</div>";

        }
    }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        echo "\n";
        }
}

function loadCart($id){
    try {
        $conn = new PDO("pgsql:host=" . hostname . ";dbname=" . db .";", username, password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($conn){
            echo "<p>" . $_SESSION['18'] . "</p>";
            foreach ($_SESSION as $cartItem => $quantity) {
                $subtotal = 0;
                $sql = "SELECT name, price, description FROM product WHERE id=" . $cartItem;
                $row = $conn->query($sql)->fetch();
                echo "<tr>";
                echo "<td data-th=\"Product\">";
                echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3 hidden-xs\"><img src=\"http://placehold.it/     100x100\" alt=\"...\" class=\"img-responsive\"/></div>";
                echo "<div class=\"col-sm-9\">";
                echo "<h4 class=\"nomargin\">" . $row['name'] . "1</h4>";
                echo "<p>" . $row['description'] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</td>";
                echo "<td data-th=\"Price\">$1.99</td>";
                echo "<td data-th=\"Quantity\">";
                echo "<input type=\"number\" class=\"form-control text-center\"         value=\"1\">";
                echo "</td>";
                echo "<td data-th=\"Subtotal\" class=\"text-center\">1.99</td>";
                echo "<td class=\"actions\" data-th=\"\">";
                echo "<button class=\"btn btn-info btn-sm\"><i class=\"fa   fa-refresh\"></   i></button>";
                echo "<button class=\"btn btn-danger btn-sm\"><i class=\"fa     fa-trash-o\"></ i></button>";
                echo "</td>";
                echo "</tr>";
                echo "</tbody>";
                echo "<tfoot>";
                echo "<tr class=\"visible-xs\">";
                echo "<td class=\"text-center\"><strong>Total 1.99</strong></td>";
                echo "</tr>";
            }
        }
    }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        echo "\n";
        }
}

function loadAll($option){
    try {
        $conn = new PDO("pgsql:host=" . hostname . ";dbname=" . db .";", username, password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($conn){
            // echo "Connected successfully\n";
            $sql = "SELECT * FROM product ";

            switch ($option) {
                case 'drops':
                case 'edible':
                case 'smoke':
                    $sql .= "name WHERE type='" . $option . "'";
                    break;
                case 'DESC':
                case 'ASC':
                    $sql .= "ORDER BY price " . $option;
                    break;
                default :
                    $sql .= "ORDER BY name";
            }
            writeMsg("QUERY", $option);

            $numOfColumns = 0;
            foreach ($conn->query($sql) as $row) {
                $numOfColumns += 1;
                // Create row if theres more columns
                if (($numOfColumns % 3) === 1) {
                    echo "<div class=\"row\">";
                }

                echo "<div class=\"col-sm\">";
                echo "<br>";
                echo "<div class=\"card border border-dark\" style=\"width: 18rem;  \">";
                echo "<img src=\"./images/" . $row['name'] . ".jpg\"  class=\"card-img-top\" alt=\"...\">";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\">" . $row['name'] . "</h5>";
                echo "<p class=\"card-text\">" . $row['description'] . "</p>";
                echo "<p class=\"card-text\">$" . $row['price'] / 100 . "</p>";
                echo "<a href=\"viewProduct.php?name='" . $row['name'] . "'\" class=\"btn btn-primary\">View   Product</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                // Row div end
                if (($numOfColumns % 3) === 0) {
                    echo "</div>";
                    echo "<br>";
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
}

?>
