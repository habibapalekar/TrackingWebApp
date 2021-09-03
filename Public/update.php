<?php

// include the config file that we created before
require "../config.php";

// this is called a try/catch statement
try {
    // FIRST: Connect to the database
    $connection = new PDO($dsn, $username, $password, $options);
    // SECOND: Create the SQL
    $sql = "SELECT * FROM diary";
    // THIRD: Prepare the SQL
    $statement = $connection->prepare($sql);
    $statement->execute();
    // FOURTH: Put it into a $result object that we can access in the page
    $result = $statement->fetchAll();
    } catch(PDOException $error) {
    // if there is an error, tell us what it is
    echo $sql . "<br>" . $error->getMessage();
    }
?>

<?php include "templates/header.php"; ?>

<h2>Edit results</h2>

<?php
// This is a loop, which will loop through each result in the array
foreach($result as $row) {
?>

<table id="data">
    <tr>
        <th>ID</th>
        <th>Food</th>
        <th>Serving (g)</th>
        <th>Kcal</th>
        <th>Meal</th>
        <th></th>
    </tr>

    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row['food']; ?></td>
        <td><?php echo $row['serving']; ?></td>
        <td><?php echo $row['kcal']; ?></td>
        <td><?php echo $row['meal']; ?></td>
        <td><a href='update-entry.php?id=<?php echo $row['id']; ?>'>Edit</a></td>
    </tr>
</table>

<?php
// this willoutput all the data from the array
//echo '<pre>'; var_dump($row);
?>

<hr>
<?php }; //close the foreach

?>

<form method="post">
<input type="submit" name="submit" value="View all">
</form>

<?php include "templates/footer.php"; ?>