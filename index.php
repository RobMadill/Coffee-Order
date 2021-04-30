<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css"/>
    </head>
    <body>
        <?php

        function check_input($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = $size = "";
        $coffee = 1;
        $cream = $sugar = 0;
        $nameErr = $coffeeErr = $sizeErr = $creamErr = $sugarErr = "";
        $isValid = true;
        if (isset($_REQUEST['submit'])) {
            if (empty($_REQUEST['name'])) {
                $nameErr = "Please enter a name for the order";
            } else {
                $name = check_input($_REQUEST['name']);
            }
            if (is_numeric($_REQUEST['coffee'])) {
                $numOfCoffee = check_input($_REQUEST['coffee']);
            } else {
                $numOfCoffeeErr = "Please enter how many coffee's you'd like to order";
            }
            if (empty(($_REQUEST['size']))) {
                $sizeErr = "Please select a size";
            } else {
                $size = $_REQUEST['size'];
            }
            if (is_numeric($_REQUEST['cream'])) {
                $numOfCream = check_input($_REQUEST['cream']);
            } else {
                $numOfCreamErr = "Please enter how many creams you'd like in your coffee(s)";
            }
            if (is_numeric($_REQUEST['sugar'])) {
                $numOfSugar = check_input($_REQUEST['sugar']);
            } else {
                $numOfSugarErr = "Please enter how many sugar you'd like in your coffee";
            }
        }
        if ($nameErr != "" || $coffeeErr != "" || $sizeErr != "" || $creamErr != "" || $sugarErr != "") {
            $isValid = false;
        }
        ?>
        <img src="images/logo-en.png"/>
        <h1>Welcome to Starbucks!</h1>
        <form action="order.php" method="post">
            <h2>What is your order today?</h2>
            <p class="error">* required</p>
            <div class="form">
                <label>Name for the order:
                    <span class="error">*<?php echo $nameErr; ?></span><br>
                    <input type="text" name="name" value="<?php echo $name ?>" required>
                </label><br>
                <label>How many drinks:
                    <span class="error">*<?php echo $coffeeErr; ?></span><br>
                    <input type="number" min="1" max="10" name="coffee"  value="<?php echo $coffee ?>"required  >
                </label>
                <p>Choose a size: <span class="error">*<?php echo $sizeErr; ?></span></p>
                <div class="size">
                    <input type="radio" name="size" value="Small"<?php if ($size == "Small") echo "checked"; ?> required>
                    <label for="size">Small</label>
                    <input type="radio" name="size" value="Medium"<?php if ($size == "Medium") echo "checked"; ?>>
                    <label for="size">Medium</label>
                    <input type="radio" name="size" value="Large"<?php if ($size == "Large") echo "checked"; ?>>
                    <label for="size">Large</label>
                    <input type="radio" name="size" value="Extra-Large"<?php if ($size == "Extra-Large") echo "checked"; ?>>
                    <label for="size">Extra-Large</label>
                </div>
                <p></p>
                <label>How many creams:
                    <span class="error">*<?php echo $creamErr; ?></span><br>
                    <input type="number" min="0" max="10" name="cream" value="<?php echo $cream; ?>"required >
                </label><br>
                <label>How many sugars: 
                    <span class="error">*<?php echo $sugarErr; ?></span><br>
                    <input type="number" min="0" max="10" name="sugar" value="<?php echo $sugar; ?>"required >    
                </label>
            </div>
            <br><br>
            <input type="submit" name="submit" value="Order" id="submit" >
        </form>
    </body>
</html>
