<html> 
    <body> 
        <?php 
        $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3'); 

        $firstname = pg_escape_string($_POST['firstname']); 
        $surname = pg_escape_string($_POST['surname']); 
        $emailaddress = pg_escape_string($_POST['emailaddress']); 

        $query = "INSERT INTO friends(firstname, surname, emailaddress) VALUES('" . $firstname . "', '" . $surname . "', '" . $emailaddress . "')";
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        printf ("These values were inserted into the database - %s %s %s", $firstname, $surname, $emailaddress); 
        pg_close(); 
        ?> 
    </body> 
</html> 