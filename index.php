<?php
require_once 'mobile_detect/Mobile_Detect.php';
$detect = new Mobile_Detect;
if (!($detect->isMobile())) {
    header("Location: not_mobile.php");
    exit();
    
}
?>
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
	var startTime
	
	function start() {
		startTime = new Date();
	}
	
	function mySubmit() {
		var endTime = new Date();
		var timeSpent = (endTime - startTime);
		document.getElementById("tempo_gasto").value = timeSpent;
		var date = endTime.getDate()+'/'+(endTime.getMonth()+1)+'/'+endTime.getFullYear();
		var time = endTime.getHours() + ":" + endTime.getMinutes() + ":" + endTime.getSeconds();
		var dateTime = date+' - '+time;
		document.getElementById("data_hora").value = dateTime;
		document.getElementById("index").submit();
     }
</script>

</head>

<body onload="start()">
	<div class="page">
		<div class="form">
			<form action="page1.php" method="post" class="index" id="index">
				<p class="titulo">Testes CAPTCHA em celulares</p>

				<p class="corpo">Testes de CAPTCHA, utilizados por um sistema para
					identificar se o usuário é um computador ou um ser humano, são
					mundialmente utilizados nos dias de hoje.</p>

				<p class="corpo">Este estudo visa identificar qual a implementação de
					testes CAPTCHA em celulares que proporciona a melhor experiência
					para o usuário.</p>

				<p class="corpo">Você realizará 4 tipos diferentes de testes,
					respondendo cada um deles 5 vezes e avaliando cada um deles no
					final de acordo com sua experiência.</p>

				<p class="corpo">Esta avaliação tem duração estimada de 5 minutos.</p>

				<input type="hidden" id="tempo_gasto" name="tempo_gasto" value="" />
				<input type="hidden" id="data_hora" name="data_hora" value="" />

				<button type="button" onclick="mySubmit();">Prosseguir</button>
			</form>
		</div>
	</div>

</body>
</html>