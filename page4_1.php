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
  	// REDIRECIONAR PARA O PROXIMO TESTE E PULAR TODAS AS PROXIMAS TENTATIVAS.
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
						<td colspan=4 class="testes_CAPPCHA_desc_td" id="desc">Inlcine o aparelho levemente para a <u>esquerda</u> e <u>direita</u>.</td>
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
			</form>
		</div>
	</div>

</body>
</html>