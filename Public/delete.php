<?php 

    // include the config file that we created before
    require "../config.php"; 

    require "common.php";
    
    // This code will only run if the delete button is clicked
    if (isset($_GET["id"])) {
	    // this is called a try/catch statement 
        try {
            // define database connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set id variable
            $id = $_GET["id"];
            
            // Create the SQL 
            $sql = "DELETE FROM diary WHERE id = :id";

            // Prepare the SQL
            $statement = $connection->prepare($sql);
            
            // bind the id to the PDO
            $statement->bindValue(':id', $id);
            
            // execute the statement
            $statement->execute();

            // Success message
            $success = "Entry successfully deleted";

        } catch(PDOException $error) {
            // if there is an error, tell us what it is
            echo $sql . "<br>" . $error->getMessage();
        }
    };

    // This code runs on page load
    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM diary";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?> 

<?php include "templates/header.php"; ?>


            <h2>Delete results</h2>
            <h3>This is permanent!</h3>

            <?php // This is a loop, which will loop through each result in the array
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
        <td><a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a></td>
    </tr>
</table>

            
<?php   // this will output all the data from the array
       // echo '<pre>'; var_dump($row); 
?>

<hr>
<?php }; //close the foreach
  
?>

<form method="post">
<input type="submit" name="Submit" value="View all">
</form>

<?php include "templates/footer.php"; ?>