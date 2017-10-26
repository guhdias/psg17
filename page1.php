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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script> 
	var startTime
	
	function start() {
		startTime = new Date();
	}
	
	function mySubmit() {
		if (validarFormulario() == true) {
			var endTime = new Date();
			var timeSpent = (endTime - startTime);
			document.getElementById("tempo_gasto").value = timeSpent;
			document.getElementById("demografia").submit();
		}
     }

    function validarFormulario() {
		var temp

		temp = document.forms["demografia"]["nome"].value;
		if (temp == "") {
			alert("Por favor preencher o nome.");
			return false;
    		}

		temp = document.forms["demografia"]["idade"].value;
		if (temp == "") {
			alert("Por favor preencher a idade, apenas números.");
			return false;
    		}

		temp = document.forms["demografia"]["sexo"].value;
		if (temp == "") {
			alert("Por favor preencher o sexo.");
			return false;
    		}

		temp = document.forms["demografia"]["conhece"];
		if (!(temp[0].checked) && !(temp[1].checked)) {
			alert("Por favor preencher se conhece testes CAPTCHA.");
			return false;
    		}

		return true;
    }
</script>

</head>

<body onload="start()">
    	<?php
    session_start();
    $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3');
    
    $tempo_index = pg_escape_string($_POST['tempo_gasto']);
    $data_hora = pg_escape_string($_POST['data_hora']);
    
    $query = "INSERT INTO avaliacoes(tempo_index, data_hora) VALUES('" . $tempo_index . "','" . $data_hora . "') RETURNING id";
    $result = pg_query($query);
    $novoId = pg_fetch_result($result, 0, 0);
    $_SESSION['formId'] = $novoId;
    if (! $result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    pg_close();
    ?> 
	<div class="page">
		<div class="form">
			<form action="page2_1.php" method="post" class="demografia" id="demografia">
				<input type="text" placeholder="nome" name="nome" />
				<input type="number" placeholder="idade" name="idade" />
				<select name="sexo">
					<option value="" disabled selected>sexo</option>
					<option value="masculino">masculino</option>
					<option value="feminino">feminino</option>
					<option value="outros">outros</option>
				</select>
				<table class="slider">
					<tr>
						<td colspan=3 class="rotulo">Expertise com celulares:</td>
					</tr>
					<tr>
						<td class="left">Muito Baixa</td>
						<td class="center"><input name="expertise" type="range" min="0"
							max="8" step="2" /></td>
						<td class="right">Muito Alta</td>
					</tr>
				</table>
				<table class="radio">
					<tr>
						<td colspan=2 class="rotulo">Conhece testes CAPTCHA?</td>
					</tr>
					<tr>
						<td class="left"><input type="radio" name="conhece" value="sim">
							Sim</td>
						<td class="right"><input type="radio" name="conhece" value="nao">
							Não</td>
					</tr>
				</table>
				<br />
				<input type="hidden" id="tempo_gasto" name="tempo_gasto" value="" />
				<button type="button" onclick="mySubmit();">Prosseguir</button>
			</form>
		</div>
	</div>

</body>
</html>
