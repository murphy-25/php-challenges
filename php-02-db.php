<html>

<body>
<h1>DB Challenge</h1>
<p>Looking Further on:</p>
<ul>
    <li>A Stored Procedure could be used.</li>
    <li>A class to handle the connection to the database.</li>
    <li>The use of an object-relational-mapping framework.</li>
</ul>
<br>
<form action="php-02-db.php" method="post">
    <input type="text" name="customer_id" placeholder="Customer ID">
    <input type="submit" value="Submit" name="submit">
</form>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])){
        $id = $_POST['customer_id'];
        if(ctype_digit($id) && !empty($id)) {
            define("username", "root");
            define("password", "root");
            $columnList = array ('First Name', 'Surname', 'Address');
            try {
                $connection = new PDO('mysql:host=localhost:3306;dbname=test', username, password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

                $statement = $connection->prepare('SELECT FirstName, Surname, Address FROM customer WHERE CustomerID = :id');
                $statement->execute(array('id' => $id));

                $result = $stmt->fetchAll();

                if (count($result)) {
                    foreach($result as $row) {
                        for($i = 0; $i < count($columnList); $i++) {
                            echo '<br>'.$columnList[$i].': '.$row[$i];
                        }
                    }
                } else {
                    echo "Nothing matched this ID.";
                }
            } catch(PDOException $e) {
                echo 'Error: '.$e->getMessage();
            }
        } else {
            echo 'Incorrect Input';
        }
    }
/*
 * Sources:
 * http://code.tutsplus.com/tutorials/pdo-vs-mysqli-which-should-you-use--net-24059
 * http://www.php.net/manual/en/book.pdo.php
 */
?>
</body>
</html>