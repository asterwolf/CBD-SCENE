 <?php
include_once("config.php");


try {
    $conn = new PDO("pgsql:host=$hostname;dbname=$db;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($conn){
        // echo "Connected successfully\n";

        $sql = "SELECT first_name, last_name, birthdate FROM customer";
        echo "$sql\n";

        foreach ($conn->query($sql) as $row) {
            print $row['first_name'] . "\t";
            print $row['last_name'] . "\t";
            print $row['birthdate'] . "\n";
}
        }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    echo "\n";
    }
?>