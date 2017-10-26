<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108707803-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108707803-1');
</script>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
	<?php
    session_start();
    $formId = $_SESSION['formId'];
    
    $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3');
    
    $avalia1 = pg_escape_string($_POST['avalia1']);
    $avalia2 = pg_escape_string($_POST['avalia2']);
    $avalia3 = pg_escape_string($_POST['avalia3']);
    $avalia4 = pg_escape_string($_POST['avalia4']);
    $avalia5 = pg_escape_string($_POST['avalia5']);
    $avalia6 = pg_escape_string($_POST['avalia6']);
    $fim = pg_escape_string($_POST['data_hora']);
    
    $query = "UPDATE avaliacoes SET avalia1_4='" . $avalia1 . "', avalia2_4='" . $avalia2 . "', avalia3_4='" . $avalia3 . "', avalia4_4='" . $avalia4 . "', avalia5_4='" . $avalia5 . "', avalia6_4='" . $avalia6 . "', data_hora_fim='" . $fim . "' WHERE id='" . $formId . "';";
    $result = pg_query($query);
    if (! $result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    pg_close();
    ?> 
	<div class="page">
		<div class="form">
			<form action="#" method="post" class="index" id="index">
				<p class="titulo">Testes CAPTCHA em celulares</p>

				<p class="corpo">Muito obrigado por completar o teste ;)</p>
			</form>
		</div>
	</div>

</body>
</html>