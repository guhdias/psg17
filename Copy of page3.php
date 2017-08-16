<html> 
    <body> 
    	<?php 
    	session_start();
        $formId = $_SESSION['formId'];

        $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3'); 

        $novoName = pg_escape_string($_POST['novoName']); 

        $query = "UPDATE temp SET name='" . $novoName . "' WHERE id='" . $formId . "';";
        $result = pg_query($query);
        echo "Updated";
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        pg_close(); 
        ?> 
    </body> 
</html> 