<html> 
    <body> 
    	<?php 
    	session_start();
        $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3'); 

        $name = pg_escape_string($_POST['name']); 

        $query = "INSERT INTO temp(name) VALUES('" . $name . "') RETURNING id";
        $result = pg_query($query);
        $novoId = pg_fetch_result($result, 0, 0);
        echo "Id: " . $novoId;
        $_SESSION['formId'] = $novoId;
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        pg_close(); 
        ?> 
        <form action="page3.php" method="post"> 
            Novo : <input type="text" name="novoName" size="40" length="40" value="novo"><BR> 
            <input type="submit" name="submit" value="Submit"> 
            <input type="reset" name="reset" value="Clear It"> 
        </form> 
    </body> 
</html> 