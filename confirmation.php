<?php
    if($_POST["age"] < 18 || $_POST["name"] === "First Last" || $_POST["candidate"] === "none"){
        header("Location: mainPage.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <form action="mainPage.php">
            <button type="submit">Back</button>
        </form>
        <br>
        <?php
            $total = 0;
            echo "<div>Dear " . $_POST["name"] . ",</div><br>";
            
            echo "<div>Thank you for supporting your candidate <b>" . $_POST["candidate"] . "</b>.</div>";            
            
            echo "<br>";
            
            echo "<div>You Ordered These Products:</div>";
            
            echo "<br>";
            
            if($_POST["mug"] === "on"){
                echo "<div class='list'>Mug (\$15) </div>";
                echo "<br>";
                $total += 15;
            }
            
            if($_POST["cap"] === "on"){
                echo "<div class='list'>Cap (\$20) </div>";
                echo "<br>";
                $total += 20;
            }
            
            if($_POST["tote"] === "on"){
                echo "<div class='list'>Tote Bag (\$10) </div>";
                echo "<br>";
                $total += 10;
            }
            
            if($_POST["pin"] === "on"){
                echo "<div class='list'>Pin (\$5) </div>";
                echo "<br>";
                $total += 5;
            }
            
            if($_POST["subscription"] != NULL){
                echo "<div class='list'>" . $_POST["subscription"] . "-month Campaign Magazine Subscription(\$" . $_POST["subscription"] . "0)</div>";
                $total += $_POST["subscription"] * 10;
                echo "<br>";
            }
            
            if($total === 0){
                echo "<div>You didn't order anything!</div>";    
            }
            
            echo "<br>";
            
            echo "<div>Total: \$ $total </div>";
            
        ?>
    </body>
</html>