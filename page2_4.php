<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">

<script>
var startTime

function gerarImagem () {
	var imagemId, imagemSrc;
	//imagemId = Math.floor(Math.random() * 6) + 1;
	//imagemSrc = "images/text_captcha/1/text_captcha";
	//imagemId = Math.floor(Math.random() * 6) + 7;
	//imagemSrc = "images/text_captcha/2/text_captcha";
	//imagemId = Math.floor(Math.random() * 6) + 13;
	//imagemSrc = "images/text_captcha/3/text_captcha";
	imagemId = Math.floor(Math.random() * 6) + 19;
	imagemSrc = "images/text_captcha/4/text_captcha";
	//imagemId = Math.floor(Math.random() * 6) + 25;
	//imagemSrc = "images/text_captcha/5/text_captcha";	
	document.getElementById("text_captcha_img").src=imagemSrc.concat(imagemId,".jpg");
	document.getElementById("imagem_id").value = imagemId;
	startTime = new Date();
}

function mySubmit() {
	var temp

	temp = document.forms["testes"]["respTextCaptcha"].value;
	if (temp == "") {
		alert("Se estiver com dificuldades para responder, utilize o botão PULAR.");
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
	document.getElementById("respTextCaptcha").value = " ";
	document.getElementById("testes").submit();
 }
</script>
</head>

<body onload="gerarImagem()">

    	<?php
    session_start();
    $formId = $_SESSION['formId'];
    
    $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3');
    
    $imagem = pg_escape_string($_POST['imagem_id']);
    $resposta = pg_escape_string($_POST['respTextCaptcha']);
    $pulou = pg_escape_string($_POST['pulou']);
    $tempo_gasto = pg_escape_string($_POST['tempo_gasto']);
    
    $query = "UPDATE avaliacoes SET imagem_1_3='" . $imagem . "', resposta_1_3='" . $resposta . "', pulou_1_3='" . $pulou . "', tempo_1_3='" . $tempo_gasto . "' WHERE id='" . $formId . "';";
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
			<form action="page2_5.php" method="post" class="testes" id="testes">
				<table class="testes_tabela">
					<tr>
						<td colspan=4 class="testes_titulo">Digite o texto abaixo:</td>
					</tr>
					<tr>
						<td colspan=4 class="testes_imagem"><img alt="Captcha Texto" src="" class="teste_texto" id="text_captcha_img"></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_resposta"><input  autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  type="text" placeholder="texto" name="respTextCaptcha" id="respTextCaptcha" /></td>
					</tr>
					<tr class="testes_botoes">
						<td colspan=2 class="testes_pular"><button type="button" onclick="pular();">Pular</button></td>
						<td colspan=2 class="testes_enviar"><button type="button" onclick="mySubmit();">Enviar</button></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_progresso"><img alt="Progresso 4/5" src="images/progress_bar/progress_bar_04.png"></td>
					</tr>
					<tr class="testes_abas">
						<td colspan=4 class="testes_progresso"><img alt="Teste 1" src="images/progress_bar_2/progress_bar_2_01.png"></td>
					</tr>
				</table> 
				<input type="hidden" id="tempo_gasto" name="tempo_gasto" value="" />
				<input type="hidden" id="pulou" name="pulou" value="" />
				<input type="hidden" id="imagem_id" name="imagem_id" value="" />
			</form>
		</div>
	</div>

</body>
</html>