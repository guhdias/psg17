<html> 
    <body> 
        <?php 
        $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3'); 

        $name = pg_escape_string($_POST['name']); 

        $query = "INSERT INTO temp(name) VALUES('" . $name . "')";
        $result = pg_query($query);
        $row = pg_fetch_array($result, 0);
        $novoId = $row["id"];
        echo "Id: " . $novoId;
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        pg_close(); 
        ?> 
    </body> 
</html> 