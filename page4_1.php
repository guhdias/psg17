<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
var startTime, random

function gerarImagem () {
	startTime = new Date();

	if (window.DeviceOrientationEvent) {

		var flagInicio, flagDireita, flagEsquerda, flagAmbos
		flagInicio = 1;
		flagDireita = 0;
		flagEsquerda = 0;
		flagAmbos = 0;
		document.getElementById('flag_CAPPCHA').value = 0;
		
		window.addEventListener("deviceorientation", function(event) 
		{			
			var graus = Math.round(event.alpha);
			if ((graus > 35 && graus < 45) && flagInicio == 1) {
				flagInicio = 0;
				flagEsquerda = 1;
				document.getElementById('desc').innerHTML = "Inlcine o aparelho levemente para a <u>direita</u>.";
				document.getElementById('imagem_CAPPCHA').src = "images/CAPPCHA/CAPPCHA_esquerda.jpg";
				document.getElementById('flag_CAPPCHA').value = 1;
			}
			if ((graus > 35 && graus < 45) && flagDireita == 1) {
				flagDireita = 0;
				flagAmbos = 1;
				document.getElementById('desc').innerHTML = "Pronto! Agora é só clicar em <u>Enviar</u>.";
				document.getElementById('imagem_CAPPCHA').src = "images/CAPPCHA/CAPPCHA_fim.jpg";
				document.getElementById('flag_CAPPCHA').value = 3;
			}
			if ((graus > 315 && graus < 325) && flagInicio == 1) {
				flagDireita = 1;
				flagInicio = 0;
				document.getElementById('desc').innerHTML = "Inlcine o aparelho levemente para a <u>esquerda</u>.";
				document.getElementById('imagem_CAPPCHA').src = "images/CAPPCHA/CAPPCHA_direita.jpg";
				document.getElementById('flag_CAPPCHA').value = 2;
			}
			if ((graus > 315 && graus < 325) && flagEsquerda == 1) {
				flagEsquerda = 0;
				flagAmbos = 1;
				document.getElementById('desc').innerHTML = "Pronto! Agora é só clicar em <u>Enviar</u>.";
				document.getElementById('imagem_CAPPCHA').src = "images/CAPPCHA/CAPPCHA_fim.jpg";
				document.getElementById('flag_CAPPCHA').value = 3;
			}
		}, true);
		
		
		
	} else {
  	alert("Ops! Seu dispositivo não é compatível com este teste, irei te direcionar ao próximo :)");
	document.getElementById("avalia1").value = "X";
	document.getElementById("avalia2").value = "X";
	document.getElementById("avalia3").value = "X";
	document.getElementById("avalia4").value = "X";
	document.getElementById("avalia5").value = "X";
	document.getElementById("avalia6").value = "X";
	document.getElementById("testes").action = "page5_1.php";
	document.getElementById("testes").submit();
	} 
}

function mySubmit() {
	var temp

	temp = document.forms["testes"]["flag_CAPPCHA"].value;
	if (temp < 3) {
		alert("Se estiver com dificuldades, utilize o botão PULAR.");
		return false;
	}
	
	var endTime = new Date();
	var timeSpent = (endTime - startTime);
	document.getElementById("tempo_gasto").value = timeSpent;
	document.getElementById("pulou").value = 0;
	document.getElementById("testes").submit();
 }

function pular() {
	var endTime = new Date();
	var timeSpent = (endTime - startTime);
	document.getElementById("tempo_gasto").value = timeSpent;
	document.getElementById("pulou").value = 1;
	document.getElementById("testes").submit();
 }

</script>
</head>

<body onload="gerarImagem()">
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
    
    $query = "UPDATE avaliacoes SET avalia1_2='" . $avalia1 . "', avalia2_2='" . $avalia2 . "', avalia3_2='" . $avalia3 . "', avalia4_2='" . $avalia4 . "', avalia5_2='" . $avalia5 . "', avalia6_2='" . $avalia6 . "' WHERE id='" . $formId . "';";
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
			<form action="page4_2.php" method="post" class="testes" id="testes">
				<table class="testes_tabela">
					<tr>
						<td colspan=4 class="testes_titulo">Movimente seu celular conforme abaixo:</td>
					</tr>
					<tr class="testes_CAPPCHA_tr">
						<td colspan=4 class="testes_CAPPCHA_td"><img id="imagem_CAPPCHA" src="images/CAPPCHA/CAPPCHA_inicio.jpg"></td>
					</tr>
					<tr class="testes_CAPPCHA_desc_tr">
						<td colspan=4 class="testes_CAPPCHA_desc_td" id="desc">Inlcine o aparelho levemente para a <span style="font-style: normal; text-decoration: underline;">esquerda</span> e <span style="font-style: normal; text-decoration: underline;">direita</span>.</td>
					</tr>
					<tr class="testes_botoes">
						<td colspan=2 class="testes_pular"><button type="button" onclick="pular();">Pular</button></td>
						<td colspan=2 class="testes_enviar"><button type="button" onclick="mySubmit();">Enviar</button></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_progresso"><img alt="Progresso 1/5" src="images/progress_bar/progress_bar_01.png"></td>
					</tr>
					<tr class="testes_abas">
						<td colspan=4 class="testes_progresso"><img alt="Teste 3" src="images/progress_bar_2/progress_bar_2_03.png"></td>
					</tr>
				</table> 
				<input type="hidden" id="tempo_gasto" name="tempo_gasto" value="" />
				<input type="hidden" id="pulou" name="pulou" value="" />
				<input type="hidden" id="flag_CAPPCHA" name="flag_CAPPCHA" value="">
				<input type="hidden" id="avalia1" name="avalia1" value="">
				<input type="hidden" id="avalia2" name="avalia1" value="">
				<input type="hidden" id="avalia3" name="avalia1" value="">
				<input type="hidden" id="avalia4" name="avalia1" value="">
				<input type="hidden" id="avalia5" name="avalia1" value="">
				<input type="hidden" id="avalia6" name="avalia1" value="">
			</form>
		</div>
	</div>
</body>
</html>