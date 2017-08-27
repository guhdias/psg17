<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pesquisa testes CAPTCHA</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

    	<?php
    session_start();
    $formId = $_SESSION['formId'];
    
    $db = pg_connect('host=ec2-54-225-182-108.compute-1.amazonaws.com dbname=de9j18h45cq9u5 user=inqlcbeulcqcts password=b38764f23bb9348ca0dced3ff38eb2d381e88e0f3b3a59076a0c345f78d923e3');
    
    $imagem = pg_escape_string($_POST['imagem_id']);
    $resposta = pg_escape_string($_POST['respTextCaptcha']);
    $pulou = pg_escape_string($_POST['pulou']);
    $tempo_gasto = pg_escape_string($_POST['tempo_gasto']);
    
    $query = "UPDATE avaliacoes SET imagem_1_5='" . $imagem . "', resposta_1_5='" . $resposta . "', pulou_1_5='" . $pulou . "', tempo_1_5='" . $tempo_gasto . "' WHERE id='" . $formId . "';";
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
			<form action="page3_1.php" method="post" class="avaliacao">
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
						<td class="avaliacao_botao"><button>Enviar</button></td>
					</tr>
				</table>
			</form>
		</div>
	</div>

</body>
</html>