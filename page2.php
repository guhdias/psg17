<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<div class="page">
		<div class="form">
			<form action="page2.php" method="post" class="testes">
				<table class="testes_tabela">
					<tr>
						<td colspan=7 class="testes_titulo">Digite o texto abaixo:</td>
					</tr>
					<tr>
						<td colspan=7 class="testes_imagem"><img alt="Captcha Texto 1" src="images/text_captcha/text_captcha.jpg" class="teste_texto"></td>
					</tr>
					<tr>
						<td colspan=7 class="testes_resposta"><input type="text" placeholder="texto" name="respTextCaptcha1" /></td>
					</tr>
					<tr class="testes_botoes">
						<td colspan=3 class="testes_pular"><button>Pular</button></td>
						<td colspan=4 class="testes_enviar"><button>Enviar</button></td>
					</tr>
					<tr>
						<td colspan=7 class="testes_progresso"><img alt="Progresso 1/5" src="images/progress_bar/progress_bar_01.png"></td>
					</tr>
					<tr class="testes_abas">
						<td class="testes_aba1">Tipo 1</td>
						<td class="testes_aba_space">&nbsp;</td>
						<td class="testes_aba2">Tipo 2</td>
						<td class="testes_aba_space">&nbsp;</td>
						<td class="testes_aba3">Tipo 3</td>
						<td class="testes_aba_space">&nbsp;</td>
						<td class="testes_aba4">Tipo 4</td>
					</tr>
				</table> 
			</form>
		</div>
	</div>

</body>
</html>