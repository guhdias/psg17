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
			<form>
				<input type="text" placeholder="nome" name="nome" />
				<input type="number" placeholder="idade" name="idade" />
				<select 	name="sexo">
					<option value="" disabled selected>sexo</option>
					<option value="masculino">masculino</option>
					<option value="feminino">feminino</option>
					<option value="outros">outros</option>
				</select>
				<table class="slider">
					<tr>
						<td colspan=3 class="rotulo">Expertise com celulares:	</td>
					</tr>
					<tr>
						<td class="left">Muito Baixa</td>
						<td class="center"><input name="expertise" type="range" min="0" max="10" step="2" /></td>
						<td class="right">Muito Alta</td>
					</tr>				
				</table>
				<table class="radio">
					<tr>
						<td colspan=2 class="rotulo">Conhece testes CAPTCHA?	</td>
					</tr>
					<tr>
						<td class="left"><input type="radio" name="conhece" value="sim"> Sim</td>
						<td class="right"><input type="radio" name="conhece" value="nao"> Não</td>
					</tr>				
				</table>
				<br/>
				<br/>
				<button>Prosseguir</button>
			</form>
		</div>
	</div>

</body>
</html>
