<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
var startTime, random
var resposta = [0, 0, 0, 0];
var ordemCerta = [0, 0, 0, 0];
var contador = 0;
var terminou = 0;

function shuffle(o) {
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};

function gerarImagem () {
	startTime = new Date();

	var posicoes = [0, 1, 2, 3];

	var randomPosicoes = shuffle(posicoes);	
	var imagens = document.getElementsByName("GISCHA_ordem");
	imagens[randomPosicoes[0]].src = "images/GISCHA/gray/1.png";
	imagens[randomPosicoes[0]].alt = "1";
	ordemCerta[randomPosicoes[0]] = 1;
	imagens[randomPosicoes[1]].src = "images/GISCHA/gray/2.png";
	imagens[randomPosicoes[1]].alt = "2";
	ordemCerta[randomPosicoes[1]] = 2;
	imagens[randomPosicoes[2]].src = "images/GISCHA/gray/3.png";
	imagens[randomPosicoes[2]].alt = "3";
	ordemCerta[randomPosicoes[2]] = 3;
	imagens[randomPosicoes[3]].src = "images/GISCHA/gray/4.png";
	imagens[randomPosicoes[3]].alt = "4";
	ordemCerta[randomPosicoes[3]] = 4;

	var randomPosicoes = shuffle(posicoes);	
	var imagens = document.getElementsByName("GISCHA_resposta");
	imagens[randomPosicoes[0]].src = "images/GISCHA/green/1.png";
	imagens[randomPosicoes[0]].alt = "1";
	imagens[randomPosicoes[1]].src = "images/GISCHA/green/2.png";
	imagens[randomPosicoes[1]].alt = "2";
	imagens[randomPosicoes[2]].src = "images/GISCHA/green/3.png";
	imagens[randomPosicoes[2]].alt = "3";
	imagens[randomPosicoes[3]].src = "images/GISCHA/green/4.png";
	imagens[randomPosicoes[3]].alt = "4";

}

function mySubmit() {
	if (terminou == 0) {
		alert("Se estiver com dificuldades para responder, utilize o botão PULAR.");
		return false;
	}
	
	var endTime = new Date();
	var timeSpent = (endTime - startTime);
	document.getElementById("tempo_gasto").value = timeSpent;
	document.getElementById("pulou").value = 0;
	document.getElementById("ordem_correta").value = ordemCerta;
	document.getElementById("ordem_selecionada").value = resposta;
	document.getElementById("testes").submit();
 }

function pular() {
	var endTime = new Date();
	var timeSpent = (endTime - startTime);
	document.getElementById("tempo_gasto").value = timeSpent;
	document.getElementById("pulou").value = 1;
	document.getElementById("ordem_correta").value = ordemCerta;
	document.getElementById("ordem_selecionada").value = resposta;
	document.getElementById("testes").submit();
 }

function reiniciar() {
	resposta = [0, 0, 0, 0];
	contador = 0;
	document.getElementById("legenda_1").innerHTML = "";
	document.getElementById("legenda_2").innerHTML = "";
	document.getElementById("legenda_3").innerHTML = "";
	document.getElementById("legenda_4").innerHTML = "";
	var imagensSelecionadas = document.getElementsByName("GISCHA_resposta")
	for (var i = 0; i < 4; i+= 1) {
    	imagensSelecionadas[i].className = "testes_GISCHA_imagens";
    	source = imagensSelecionadas[i].src;
		imagensSelecionadas[i].src = source.replace("gray", "green");
	}
	terminou = 0;
}

function selecionarImagem(novaImagem, posImagem) {
	if (novaImagem.className == "testes_GISCHA_imagens_selecionada") {
		if (confirm("Você já selecionou esta opção antes.\nDeseja limpar e recomeçar?") == true) {
			reiniciar();
		} else {
		}
	} else {
		var legenda = "legenda_" + posImagem;
		document.getElementById(legenda).innerHTML = contador + 1 + "ª";
		novaImagem.className = "testes_GISCHA_imagens_selecionada";
		source = novaImagem.src;
		novaImagem.src = source.replace("green", "gray");
		resposta[contador] = novaImagem.alt;
		contador = contador + 1;
		if (contador == 4) {
			terminou = 1;
		}
	}
}
</script>
</head>

<body onload="gerarImagem()">

	<div class="page">
		<div class="form">
			<form action="page5_2.php" method="post" class="testes" id="testes">
				<table class="testes_tabela">
					<tr>
						<td colspan=4 class="testes_GISCHA_titulo1">Ordem original:</td>
					</tr>
					<tr class="testes_GISCHA_tr">
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_ordem" class="testes_GISCHA_imagens"></td>
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_ordem" class="testes_GISCHA_imagens"></td>
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_ordem" class="testes_GISCHA_imagens"></td>
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_ordem" class="testes_GISCHA_imagens"></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_GISCHA_titulo2">Selecione as setas abaixo na mesma ordem:</td>
					</tr>
					<tr class="testes_GISCHA_tr">
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_resposta" class="testes_GISCHA_imagens" onClick="selecionarImagem(this,1);"></td>
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_resposta" class="testes_GISCHA_imagens" onClick="selecionarImagem(this,2);"></td>
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_resposta" class="testes_GISCHA_imagens" onClick="selecionarImagem(this,3);"></td>
						<td class="testes_GISCHA_td"><img alt="" src="" name="GISCHA_resposta" class="testes_GISCHA_imagens" onClick="selecionarImagem(this,4);"></td>
					</tr>
					<tr class="testes_GISCHA_legenda_tr">
						<td class="testes_GISCHA_legenda_td" id="legenda_1"></td>
						<td class="testes_GISCHA_legenda_td" id="legenda_2"></td>
						<td class="testes_GISCHA_legenda_td" id="legenda_3"></td>
						<td class="testes_GISCHA_legenda_td" id="legenda_4"></td>
					</tr>
					<tr class="testes_botoes">
						<td colspan=2 class="testes_pular"><button type="button" onclick="pular();">Pular</button></td>
						<td colspan=2 class="testes_enviar"><button type="button" onclick="mySubmit();">Enviar</button></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_progresso"><img alt="Progresso 1/5" src="images/progress_bar/progress_bar_01.png"></td>
					</tr>
					<tr class="testes_abas">
						<td colspan=4 class="testes_progresso"><img alt="Teste 4" src="images/progress_bar_2/progress_bar_2_04.png"></td>
					</tr>
				</table> 
				<input type="hidden" id="tempo_gasto" name="tempo_gasto" value="" />
				<input type="hidden" id="pulou" name="pulou" value="" />
				<input type="hidden" id="ordem_correta" name="image_correta" value="">
				<input type="hidden" id="ordem_selecionada" name="image_selecionada" value="">
			</form>
		</div>
	</div>

</body>
</html>