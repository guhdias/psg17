<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
var startTime

function gerarImagem () {
	startTime = new Date();
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
	document.getElementById("image_correta").value = " ";
	document.getElementById("testes").submit();
 }

function pular() {
	var endTime = new Date();
	var timeSpent = (endTime - startTime);
	document.getElementById("tempo_gasto").value = timeSpent;
	document.getElementById("pulou").value = 1;
	document.getElementById("image_correta").value = " ";
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
    	
	<div class="page">
		<div class="form">
			<form action="page2_2.php" method="post" class="testes" id="testes">
				<table class="testes_tabela">
					<tr>
						<td colspan=4 class="testes_titulo">Selecione o avião:</td>
					</tr>
					<tr class="testes_icones_tr">
						<td class="testes_icones_td"><img alt="1" src="images/image_captcha/png/headphones.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="2" src="images/image_captcha/png/cloud.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="3" src="images/image_captcha/png/airplane.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="4" src="images/image_captcha/png/edit.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
					</tr>
					<tr class="testes_icones_tr">
						<td class="testes_icones_td"><img alt="5" src="images/image_captcha/png/gift.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="6" src="images/image_captcha/png/hold.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="7" src="images/image_captcha/png/home-2.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
						<td class="testes_icones_td"><img alt="8" src="images/image_captcha/png/idea.png" class="testes_icones_imagens" onClick="selecionarImagem(this);"></td>
					</tr>
					<tr class="testes_botoes">
						<td colspan=2 class="testes_pular"><button type="button" onclick="pular();">Pular</button></td>
						<td colspan=2 class="testes_enviar"><button type="button" onclick="mySubmit();">Enviar</button></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_progresso"><img alt="Progresso 1/5" src="images/progress_bar/progress_bar_01.png"></td>
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