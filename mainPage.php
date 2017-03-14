<?php
    include 'dbConnection.php';
    
    $connection = connect();
    
    function getCandidates(){
        global $connection;
        $sql =  "SELECT * 
                 FROM  candidate";
        
        
        $statement = $connection->prepare($sql);
        
        $statement->execute();
        
        $candidates = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo $candidates;
        
        return $candidates;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Support Your Candidate</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        
        <div class="main">
            <div class = "heading">Support Your Presidential Candidate!</div>
            <img class="candidates" src="images/candidates.png"></img>
            
            <form action="confirmation.php" method="POST">
                <div>
                    <label>Enter Your Name </label>
                    <input type="text" name="name" value="First Last"/>
                </div>
                <div>
                    <label>Enter Your Age </label>
                    <input type="number" name="age" value="Your Age"/>
                    <label for="age">(Must be 18 or older)</label>
                </div>
                <div>
                    <label>Select Your Candidate </label>
                    <select name="candidate">
                        <?php
                        
                            $candidates = getCandidates(); 
                            echo "<div>$candidates</div>";
                            
                            var_dump($candidates);
                            foreach($candidates as $candidate){
                                echo "<option value='" . $candidate["name"] . "'>" . $candidate["name"] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <div class= "merchHeader"> Merchandise </div>
                
                <div class = "checkBoxes">
                    <label><input type="checkbox" name="mug" /> Mug ($15) </label><br>
                    <label><input type="checkbox" name="cap" /> Cap ($20) </label><br>
                    <label><input type="checkbox" name="tote" /> Tote Bag ($10) </label><br>
                    <label><input type="checkbox" name="pin" /> Pin ($5) </label>
                </div>
                
                <div class="merchHeader" > Campaign Magazine ($10 per month) </div>
                
                <div>
                    <input type="radio" name="subscription" value="1" > 1 month
                    <input type="radio" name="subscription" value="3" > 3 months
                    <input type="radio" name="subscription" value="6" > 6 months
                    <input type="radio" name="subscription" value="12" > 12 months
                </div>
                
                <div>
                    <input type="image" src="images/buy_button.png" alt="Submit" width="200">
                </div>
            </form>
        </div>
    </body>
</html>