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

<script>
var startTime, random

function gerarImagem () {
	startTime = new Date();
	
	var icones = document.getElementsByName("testes_icone");
	var random2
	random = Math.floor(Math.random() * 8);
	icones[random].src = "images/image_captcha_resized/50.png";
	for (var i = 0; i < icones.length; i++) {
		if (i != random) {
			random2 = Math.floor(Math.random() * 47) + 1;
			icones[i].src = "images/image_captcha_resized/" + random2 + ".png";
		}
	}
}

function mySubmit() {
	var temp

	temp = document.forms["testes"]["image_selecionada"].value;
	if (temp == "") {
		alert("Se estiver com dificuldades para responder, utilize o botão PULAR.");
		return false;
	}
	
	var endTime = new Date();
	var timeSpent = (endTime - startTime);
	document.getElementById("tempo_gasto").value = timeSpent;
	document.getElementById("pulou").value = 0;
	document.getElementById("image_correta").value = random + 1;
	document.getElementById("testes").submit();
 }

function pular() {
	var endTime = new Date();
	var timeSpent = (endTime - startTime);
	document.getElementById("tempo_gasto").value = timeSpent;
	document.getElementById("pulou").value = 1;
	document.getElementById("image_correta").value = random + 1;
	document.getElementById("testes").submit();
 }

function selecionarImagem(novaImagem) {
	var antigaImagem = document.getElementsByClassName("testes_icones_imagens_selecionada");
	if(antigaImagem[0]) {
		antigaImagem[0].className = "testes_icones_imagens";
	}
	novaImagem.className = "testes_icones_imagens_selecionada";
	document.getElementById("image_selecionada").value = novaImagem.alt;
}
</script>
</head>

<body onload="gerarImagem()">
    	<?php
    session_start();
    $formId = $_SESSION['formId'];
    
    $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3');
    
    $correta = pg_escape_string($_POST['image_correta']);
    $selecionada = pg_escape_string($_POST['image_selecionada']);
    $pulou = pg_escape_string($_POST['pulou']);
    $tempo_gasto = pg_escape_string($_POST['tempo_gasto']);
    
    $query = "UPDATE avaliacoes SET correta_2_2='" . $correta . "', selecionada_2_2='" . $selecionada . "', pulou_2_2='" . $pulou . "', tempo_2_2='" . $tempo_gasto . "' WHERE id='" . $formId . "';";
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
			<form action="page3_4.php" method="post" class="testes" id="testes">
				<table class="testes_tabela">
					<tr>
						<td colspan=4 class="testes_titulo">Selecione a nuvem:</td>
					</tr>
					<tr class="testes_icones_tr">
						<td class="testes_icones_td"><img alt="1" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="2" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="3" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="4" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
					</tr>
					<tr class="testes_icones_tr">
						<td class="testes_icones_td"><img alt="5" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="6" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="7" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="8" src="" name="testes_icone" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
					</tr>
					<tr class="testes_botoes">
						<td colspan=2 class="testes_pular"><button type="button" onclick="pular();">Pular</button></td>
						<td colspan=2 class="testes_enviar"><button type="button" onclick="mySubmit();">Enviar</button></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_progresso"><img alt="Progresso 3/5" src="images/progress_bar/progress_bar_03.png"></td>
					</tr>
					<tr class="testes_abas">
						<td colspan=4 class="testes_progresso"><img alt="Teste 2" src="images/progress_bar_2/progress_bar_2_02.png"></td>
					</tr>
				</table> 
				<input type="hidden" id="tempo_gasto" name="tempo_gasto" value="" />
				<input type="hidden" id="pulou" name="pulou" value="" />
				<input type="hidden" id="image_correta" name="image_correta" value="">
				<input type="hidden" id="image_selecionada" name="image_selecionada" value="">
			</form>
		</div>
	</div>

</body>
</html>