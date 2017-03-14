<?php
    function connect(){
        // Set the Cloud 9 MySQL related information...this is set in stone by C9!
        $servername = "localhost";
        
        $dbPort = 3306;
        
        // Which database (the name of the database in phpMyAdmin)?
        $database = "testPresident";
        
        // My user information...I could have prompted for password, as well, or stored in the
        // environment, or, or, or (all in the name of better security)
        $username = 'colemanjohnston';
        $password = "";
    
        // Establish the connection and then alter how we are tracking errors (look those keywords up)
        $dbConn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        //$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }
?>