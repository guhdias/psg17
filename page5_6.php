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
			var endTime = new Date();
			var date = endTime.getDate()+'/'+(endTime.getMonth()+1)+'/'+endTime.getFullYear();
			var time = endTime.getHours() + ":" + endTime.getMinutes() + ":" + endTime.getSeconds();
			var dateTime = date+' - '+time;
			document.getElementById("data_hora").value = dateTime;
			document.getElementById("avaliacao").submit();
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
	<?php
    session_start();
    $formId = $_SESSION['formId'];
    
    $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3');
    
    $correta = pg_escape_string($_POST['ordem_correta']);
    $selecionada = pg_escape_string($_POST['ordem_selecionada']);
    $pulou = pg_escape_string($_POST['pulou']);
    $tempo_gasto = pg_escape_string($_POST['tempo_gasto']);
    
    $query = "UPDATE avaliacoes SET correta_4_5='" . $correta . "', selecionada_4_5='" . $selecionada . "', pulou_4_5='" . $pulou . "', tempo_4_5='" . $tempo_gasto . "' WHERE id='" . $formId . "';";
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
			<form action="page6.php" method="post" class="avaliacao" id="avaliacao">
				<table class="avaliacao_tabela">
					<tr>
						<td class="avaliacao_titulo">Avalie o tipo de teste 4</td>
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
				<input type="hidden" id="data_hora" name="data_hora" value="" />
			</form>
		</div>
	</div>

</body>
</html>