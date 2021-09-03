<?php 

    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 

         // include the config file that we created last week
        require "../config.php";
        require "common.php";

        // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
        //grab elements from form and set as varaible
        $work =[
            "id"         => $_POST['id'],
            "food" => $_POST['food'],
            "serving"  => $_POST['serving'],
            "kcal"   => $_POST['kcal'],
            "meal"   => $_POST['meal'],
            "date"   => $_POST['date'],
        ];

        // create SQL statement
        $sql = "UPDATE `diary` 
                SET id = :id, 
                    food = :food, 
                    serving = :serving, 
                    kcal = :kcal, 
                    meal = :meal, 
                    date = :date 
                WHERE id = :id";

  //prepare sql statement
  $statement = $connection->prepare($sql);

  //execute sql statement
  $statement->execute($work);   
            
            } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM diary WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        
        // quickly show the id on the page
        echo $_GET['id'];
?>

<?php include "templates/header.php"; ?>

    <h2>Update results</h2>

    <div class="form">
    <form method="post"> 
    
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>">
    
    <label for="food">Food</label>
    <input type="text" name="food" id="food" value="<?php echo escape($work['food']); ?>">

    <label for="serving">Serving (g)</label>
    <input type="text" name="serving" id="serving" value="<?php echo escape($work['serving']); ?>">

    <label for="kcal">Kcal</label>
    <input type="text" name="kcal" id="kcal" value="<?php echo escape($work['kcal']); ?>">

    <label for="meal">Meal</label>
    <input type="text" name="meal" id="meal" value="<?php echo escape($work['meal']); ?>">
    
    <label for="date"> Date</label>
    <input type="text" name="date" id="date" value="<?php echo escape($work['date']); ?>">

    <input type="submit" name="submit" value="Save">
    </form>
    </div> 

<?php
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    }
?>

<?php include "templates/footer.php"; ?>