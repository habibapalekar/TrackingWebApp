<?php
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {

// include the config file that we created before
require "../config.php";

// this is called a try/catch statement
try {

// FIRST: Connect to the database
    $connection = new PDO($dsn, $username, $password, $options);

// SECOND: Get the contents of the form and store it in an array
    $new_food = array(
    "food" => $_POST['food'],
    "serving" => $_POST['serving'],
    "kcal" => $_POST['kcal'],
    "meal" => $_POST['meal'],
);

// THIRD: Turn the array into a SQL statement
    $sql = "INSERT INTO diary (food, serving, kcal, meal) VALUES (:food, :serving, :kcal, :meal)";

// FOURTH: Now write the SQL to the database
    $statement = $connection->prepare($sql);
    $statement->execute($new_food);
   
    } catch(PDOException $error) {

// if there is an error, tell us what it is
echo $sql . "<br>" . $error->getMessage();
}
}
?>

<?php include "templates/header.php"; ?>

<h2>Add new food</h2>
<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Meal successfully added.</p>
<?php } ?>

<!--form to collect data for each artwork-->
<div class="form">
<form method="post">
<label for="food">Food</label> 
<input type="text" name="food" id="food"> 
<label for="serving">Serving(g)</label> 
<input type="text" name="serving" id="serving"> 
<label for="kcal">kcal</label> 
<input type="text" name="kcal" id="kcal"> 
<label for="meal">Meal</label> 
<input type="text" name="meal" id="meal"> 
<input type="submit" name="submit" value="Submit">
</form>
</div>

<?php include "templates/footer.php"; ?>