<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">

<script>
function gerarImagem () {
	var imagemId, imagemSrc;
	imagemId = Math.floor(Math.random() * 6) + 1;
	imagemSrc = "images/text_captcha/1/text_captcha";
	document.getElementById("text_captcha_img").src=imagemSrc.concat(imagemId,".jpg");
	imagemId = Math.floor(Math.random() * 4) + 1;
	imagemSrc = "images/progress_bar_2/progress_bar_2_0";
	document.getElementById("progress").src=imagemSrc.concat(imagemId,".png");
}
</script>
</head>

<body onload="gerarImagem()">
	<div class="page">
		<div class="form">
			<form action="page2_6.php" method="post" class="testes">
				<table class="testes_tabela">
					<tr>
						<td colspan=4 class="testes_titulo">Digite o texto abaixo:</td>
					</tr>
					<tr>
						<td colspan=4 class="testes_imagem"><img alt="Captcha Texto" src="" class="teste_texto" id="text_captcha_img"></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_resposta"><input type="text" placeholder="texto" name="respTextCaptcha1" /></td>
					</tr>
					<tr class="testes_botoes">
						<td colspan=2 class="testes_pular"><button>Pular</button></td>
						<td colspan=2 class="testes_enviar"><button>Enviar</button></td>
					</tr>
					<tr>
						<td colspan=4 class="testes_progresso"><img alt="Progresso 1/5" src="images/progress_bar/progress_bar_01.png"></td>
					</tr>
					<tr class="testes_abas">
						<td colspan=4 class="testes_progresso"><img alt="Teste 1" src="" id="progress"></td>
					</tr>
				</table> 
			</form>
		</div>
	</div>

</body>
</html>