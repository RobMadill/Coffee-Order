<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/order.css"/>
    </head>
    <body>
        <?php
        if (isset($_REQUEST['submit']) == false) {
            header("location: index.php");
        }

        $name = $_REQUEST['name'];
        $coffee = $_REQUEST['coffee'];
        $size = $_REQUEST['size'];
        $cream = $_REQUEST['cream'];
        $sugar = $_REQUEST['sugar'];

        $smallCup = "<img src='images/cup.jpg' width='50px' height='75px'/>";
        $mediumCup = "<img src='images/cup.jpg' width='75px' height='100px'/>";
        $largeCup = "<img src='images/cup.jpg' width='100px' height='125px'/>";
        $extraLargeCup = "<img src='images/cup.jpg' width='125px' height='150px'/>";

        $sugarPic = "<img src='images/sugar.jpg' width='30px' height='50px'/>";
        $creamPic = "<img src='images/cream.jpg' width='30px' height='50px'/>";
        $plus = "<img src='images/plus.jpg' width='30px' height='50px'/>";

        $smallCoffee = 1;
        $mediumCoffee = 1.25;
        $largeCoffee = 1.50;
        $extraLargeCoffee = 1.75;

        $total = "";
        $tax = 0.13;
        ?>
        <img src="images/logo-en.png"/>
        <h1>Thank you <?php echo $name ?>!</h1>
        <div class="border">
            <h2>Here's your order:</h2><br><br>
            <p><?php echo $coffee . " " . $size; ?> Coffee<br>
                <?php echo $cream ?> Cream(s)<br>
                <?php echo $sugar ?> Sugar(s)<br>
            </p>
            <div class="pics">
                <?php
                for ($i = 1; $i <= $coffee; $i++) {
                    if ($size == "Small") {
                        echo $smallCup . " ";
                        $total += $smallCoffee;
                    } else if ($size == "Medium") {
                        echo $mediumCup . " ";
                        $total += $mediumCoffee;
                    } else if ($size == "Large") {
                        echo $largeCup . " ";
                        $total += $largeCoffee;
                    } else if ($size == "Extra-Large") {
                        echo $extraLargeCup . " ";
                        $total += $extraLargeCoffee;
                    }
                }
                for ($i = 1; $i <= $cream; $i++) {
                    if ($cream > 0) {
                        echo $creamPic . " ";
                    }
                }
                for ($i = 1; $i <= $sugar; $i++) {
                    if ($sugar > 0) {
                        echo $sugarPic . " ";
                    }
                }
                ?>   
            </div>
            <div class="space">
                <?php
                $T = ($total * $tax) + $total;
                $Tr = round($T, 2);
                echo"Cream & Sugar are complimentry!";
                echo"<br>Your total is: $$total + %$tax = $$Tr";
                ?>
            </div>
        </div>
    </body>
</html>