<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script> 
	function mySubmit() {
		if (!validarFormulario()) {
			alert("Responda à todas as perguntas antes de prosseguir.");
			return false;
		} else {
			document.getElementById("index").submit();
		}
     }

     function validarFormulario() {
     	var valido = true;
     	if ($('input[name=avalia1]:checked').length == 0) {
     		valido = false;
     		return valido;
		}
		if ($('input[name=avalia2]:checked').length == 0) {
     		valido = false;
     		return valido;
		}
		if ($('input[name=avalia3]:checked').length == 0) {
     		valido = false;
     		return valido;
		}
		if ($('input[name=avalia4]:checked').length == 0) {
     		valido = false;
     		return valido;
		}
		if ($('input[name=avalia5]:checked').length == 0) {
     		valido = false;
     		return valido;
		}
		if ($('input[name=avalia6]:checked').length == 0) {
     		valido = false;
     		return valido;
		}
		return valido;
     }
</script>

</head>

<body>
<div class="page">
		<div class="form">
			<form action="www.google.com.br" method="post" class="avaliacao" id="index">
				<table class="avaliacao_tabela">
					<tr>
						<td class="avaliacao_titulo">Avalie o tipo de teste 1</td>
					</tr>
					<tr>
						<td class="avaliacao_conteudo">
							<div class="avaliacao_div">
								<table class="avaliacao_perguntas">
									<tr>
										<td colspan=5 class="avaliacao_enunciado">1. Os desafios eram fáceis de
											entender.</td>
									</tr>
									<tr>
										<td class="avaliacao_radio"><input type="radio" name="avalia1" value="1" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia1" value="2" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia1" value="3" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia1" value="4" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia1" value="5" class="avaliacao_radio_button"></td>
									</tr>
									<tr>
										<td class="avaliacao_legenda">Discordo totalmente</td>
										<td class="avaliacao_legenda">Discordo</td>
										<td class="avaliacao_legenda">Neutro</td>
										<td class="avaliacao_legenda">Concordo</td>
										<td class="avaliacao_legenda">Concordo totalmente</td>
									</tr>
									<tr>
										<td colspan=5 class="avaliacao_enunciado">2. Foi fácil resolver os desafios com precisão.</td>
									</tr>
									<tr>
										<td class="avaliacao_radio"><input type="radio" name="avalia2" value="1" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia2" value="2" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia2" value="3" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia2" value="4" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia2" value="5" class="avaliacao_radio_button"></td>
									</tr>
									<tr>
										<td class="avaliacao_legenda">Discordo totalmente</td>
										<td class="avaliacao_legenda">Discordo</td>
										<td class="avaliacao_legenda">Neutro</td>
										<td class="avaliacao_legenda">Concordo</td>
										<td class="avaliacao_legenda">Concordo totalmente</td>
									</tr>
									<tr>
										<td colspan=5 class="avaliacao_enunciado">3. Se eu não utilizasse esse mecanismo por algumas semanas, ainda me lembraria de como resolver os desafios.</td>
									</tr>
									<tr>
										<td class="avaliacao_radio"><input type="radio" name="avalia3" value="1" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia3" value="2" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia3" value="3" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia3" value="4" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia3" value="5" class="avaliacao_radio_button"></td>
									</tr>
									<tr>
										<td class="avaliacao_legenda">Discordo totalmente</td>
										<td class="avaliacao_legenda">Discordo</td>
										<td class="avaliacao_legenda">Neutro</td>
										<td class="avaliacao_legenda">Concordo</td>
										<td class="avaliacao_legenda">Concordo totalmente</td>
									</tr>
									<tr>
										<td colspan=5 class="avaliacao_enunciado">4. Este teste CAPTCHA foi agradável de se utilizar.</td>
									</tr>
									<tr>
										<td class="avaliacao_radio"><input type="radio" name="avalia4" value="1" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia4" value="2" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia4" value="3" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia4" value="4" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia4" value="5" class="avaliacao_radio_button"></td>
									</tr>
									<tr>
										<td class="avaliacao_legenda">Discordo totalmente</td>
										<td class="avaliacao_legenda">Discordo</td>
										<td class="avaliacao_legenda">Neutro</td>
										<td class="avaliacao_legenda">Concordo</td>
										<td class="avaliacao_legenda">Concordo totalmente</td>
									</tr>
									<tr>
										<td colspan=5 class="avaliacao_enunciado">5. Considero que este modelo de CAPTCHA é bem adequado para dispositivos móveis.</td>
									</tr>
									<tr>
										<td class="avaliacao_radio"><input type="radio" name="avalia5" value="1" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia5" value="2" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia5" value="3" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia5" value="4" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia5" value="5" class="avaliacao_radio_button"></td>
									</tr>
									<tr>
										<td class="avaliacao_legenda">Discordo totalmente</td>
										<td class="avaliacao_legenda">Discordo</td>
										<td class="avaliacao_legenda">Neutro</td>
										<td class="avaliacao_legenda">Concordo</td>
										<td class="avaliacao_legenda">Concordo totalmente</td>
									</tr>
									<tr>
										<td colspan=5 class="avaliacao_enunciado">6. Eu escolheria utilizar este mecanismo de CAPTCHA em comparação a outros.</td>
									</tr>
									<tr>
										<td class="avaliacao_radio"><input type="radio" name="avalia6" value="1" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia6" value="2" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia6" value="3" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia6" value="4" class="avaliacao_radio_button"></td>
										<td class="avaliacao_radio"><input type="radio" name="avalia6" value="5" class="avaliacao_radio_button"></td>
									</tr>
									<tr>
										<td class="avaliacao_legenda">Discordo totalmente</td>
										<td class="avaliacao_legenda">Discordo</td>
										<td class="avaliacao_legenda">Neutro</td>
										<td class="avaliacao_legenda">Concordo</td>
										<td class="avaliacao_legenda">Concordo totalmente</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
					<tr>
						<td class="avaliacao_botao"><button type="button" onclick="mySubmit();">Prosseguir</button></td>
					</tr>
				</table>
			</form>
		</div>
	</div>

</body>
</html>