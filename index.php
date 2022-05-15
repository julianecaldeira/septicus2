<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>JULIANE</title>
	

	<style>
		/* estilo css tabela dos coeficientes do sumidouro */
		table {
			border-collapse: collapse;
			font-family: Tahoma, Geneva, sans-serif;
		}
		table td {
			padding: 15px;
		}
		table thead td {
			background-color: #6c757d;
			color: #ffffff;
			font-weight: bold;
			font-size: 13px;
			border: 1px solid #6c757d;
		}
		table tbody td {
			color: #636363;
			border: 1px solid #dddfe1;
		}
		table tbody tr {
			background-color: #ffffff;
		}
		table tbody tr:nth-child(odd) {
			background-color: #ffffff;
		}
	</style>

</head> <!-- fim cabeçalho do site -->


<body>

	<!-- Modal: Relatório suspenso provisório -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- COMEÇO MODAL RELATÓRIO -->
		<div class="modal-dialog" role="document">
			<div class="modal-content">
		
				<div class="modal-header">
					<img id="imagembanner" src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/SepticusLogo.png" width="200px;">
					<br/>
					<center><h5 class="modal-title" id="exampleModalLabel">RELATÓRIO SIMPLIFICADO</h5></center>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<!-- Impressão dos valores -->
				<div class="modal-body" style="text-align: center;">
					<div class="alert alert-primary" role="alert"> <!-- <h5>Geometria</h5> -->
						<h5 style="margin-bottom: auto;">
						<div id="relatorioGeometria"> <!-- CAMPO GEOMETRIA -->
						</div>
						</h5>
					</div>

					<div class="alert alert-secondary" role="alert">
						<h5>Dimensões</h5>
						<div id="relatorioDimensoes"> <!-- CAMPO DIMENSÕES -->
						</div>
					</div>

					<div class="alert alert-secondary" role="alert">
						<h5>Volume Útil</h5>
						<div id="relatorioVolumeUtil"> <!-- CAMPO VOLUME ÚTIL -->
						</div>
					</div>

					<div class="alert alert-secondary" role="alert">
						<h5>Volume Total</h5>
						<div id="relatorioVolumeTotal"> <!-- VOLUME TOTAL -->	
						</div>
					</div>

					<div class="alert alert-primary" role="alert" id="corStatusSumidouro">
						<h5 style="margin-bottom: auto;">
						<div id="statusSumidouro"> <!-- CAMPO GEOMETRIA -->
						</div>
						</h5>
					</div>

					<div class="alert alert-secondary" role="alert" id="campoDimensoesSumidouro">
						<h5>Dimensões</h5>
						<div id="relatorioSumidouro"> <!-- GEOMETRIA SUMIDOURO -->	
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<!-- Mini Form p/ gerar o relatório -->
					<form name="gerarRelatorio" action="relatorio.php" id="formGerarRelatorio" method="POST">
						<!-- variáveis p/ enviar ao relatório -->
						<input type="hidden" id="postGeometria" name="geometria" value="">
						<input type="hidden" id="postDimensaoDIAMETRO_LARGURA_TANQUE"  name="dimensaoDIAMETRO_LARGURA_TANQUE" value="">
						<input type="hidden" id="postComprimento" name="comprimento" value="">
						<input type="hidden" id="postProfundidadeTanque" name="profundidadeTanque" value="" >
						<input type="hidden" id="postVolumeTotalTanque" name="volumeTotalTanque" value="">
						<!-- SUMIDOURO -->
						<input type="hidden" id="postDiametroSumidouro" name="diametroSumidouro" value="">
						<input type="hidden" id="postProfundidadeSumidouro" name="profundidadeSumidouro" value="">
						<input type="hidden" id="volumeTotalSumidouro" name="volumeTotalSumidouro" value="">

						<!-- TABELA QUANTITATIVO DE MATERIAIS -->
						<input type="hidden" id="postBlocoTanque" name="blocoTanque" value="">
						<input type="hidden" id="postBlocoSumidouro" name="blocoSumidouro" value="">
						<input type="hidden" id="postBlocoTotal" name="blocoTotal" value="">

						<input type="hidden" id="postCimentoTanque" name="cimentoTanque" value="">
						<input type="hidden" id="postCimentoSumidouro" name="cimentoSumidouro" value="">
						<input type="hidden" id="postCimentoTotal" name="cimentoTotal" value="">

						<input type="hidden" id="postCalTanque" name="calTanque" value="">
						<input type="hidden" id="postCalSumidouro" name="calSumidouro" value="">
						<input type="hidden" id="postCalTotal" name="calTotal" value="">

						<input type="hidden" id="postAreiaTanque" name="areiaTanque" value="">
						<input type="hidden" id="postAreiaSumidouro" name="areiaSumidouro" value="">
						<input type="hidden" id="postAreiaTotal" name="areiaTotal" value="">

						<input type="hidden" id="postBrita01Tanque" name="brita01Tanque" value="">
						<input type="hidden" id="postBrita01Sumidouro" name="brita01Sumidouro" value="0">
						<input type="hidden" id="postBrita01Total" name="brita01Total" value="">
						
						<input type="hidden" id="postBrita03Sumidouro" name="brita03Sumidouro" value="">
						<input type="hidden" id="postBrita03Total" name="brita03Total" value="">
						<input type="hidden" id="postAguaTanque" name="aguaTanque" value="">
						<input type="hidden" id="postAguaTotal" name="aguaTotal" value="">

						<!-- TAMPA DO TANQUE SÉPTICO E SUMIDOURO-->
						<input type="hidden" id="postLarguraTampaTanque" name="LarguraTampaTanque" value="">
						<input type="hidden" id="postComprimentoTampaTanque" name="ComprimentoTampaTanque" value="">
						<input type="hidden" id="postAreaTampaTanque" name="AreaTampaTanque" value="">
						<input type="hidden" id="postLarguratampaSumidouro" name="LarguratampaSumidouro" value="">
						<input type="hidden" id="postAreaTampaSumidouro" name="AreaTampaSumidouro" value="">
						<input type="hidden" id="postQuantidadeVigotasTanque" name="QuantidadeVigotasTanque" value="">
						<input type="hidden" id="postQuantidadeVigotasSumidouro" name="QuantidadeVigotasSumidouro" value="">
						<input type="hidden" id="postNumeroVaosTanque" name="NumeroVaosTanque" value="">
						<input type="hidden" id="postNumeroVaosSumidouro" name="NumeroVaosSumidouro" value="">
						<input type="hidden" id="postQuantidadeTavelasTanque" name="QuantidadeTavelasTanque" value="">
						<input type="hidden" id="postQuantidadeTavelasSumidouro" name="QuantidadeTavelasSumidouro" value="">


					<button type="submit" class="btn btn-primary">Gerar Relatório</button>
					</form>	
				</div>
			</div>
		</div>
	</div>
	<!-- FINAL MODAL RELATÓRIO -->


	<!-- TITULO SITE GERAL-->
	<nav class="navbar navbar-light" style="background-color: #00B8F1; font-family: monospace; font-weight: 500;">
		<div class="container">
			<a class="navbar-brand" href="#">SEPTICUS V2.0</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Dimensionar
					<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="sobre.php">Sobre</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="anexos.php">Anexos</a>
				</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Títulos -->
	<div class="container text-center">
		<!-- Jumbotron -->
		<div class="" style="padding-top: 5px; margin-top: 20px; font-family: monospace; color: black;">
			<div class="alert alert-info" role="alert" style="box-shadow: -20px -3px 4px 5px rgb(0 184 241 / 69%); color: black;">
			<P></P>
				<center><img id="imagembanner" src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/SepticusLogo.png" width="290px;"></center>
			<P></P>
			<h5>Dimensionamento de tanque séptico e sumidouro</h5><BR>
			<img type="button" id="imagembanner" onclick="location.href='https://portal.ifba.edu.br/eunapolis';"; src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/IFBA_Eunapolis.png" width="15%">
        	<img type="button" id="imagembanner" onclick="location.href='https://www.instagram.com/gemaa.ifba/';"; src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/gemaa.png" width="15%">
			<P></P>
			<p class="lead">Preencha todos os campos abaixo.</p>
			<hr class="my-4">
		<!-- Jumbotron -->

	<!-- Formularios para coletar os dados de entrada -->
	<form>
		<div class="alert alert-light" role="alert" style="margin: 0 auto;
    color: black;
    width: fit-content;
    border-radius: 10px;">
		<label><b>Escolha a geometria do tanque séptico:</b></label>
		<p></p>


		<label class="radio-inline" style="margin-right: 5px;">
		<input type="radio" name="optradio" id="botaoRadioCircular" value="cilindrico" onclick="exibirTextoInsiraDiametro()"> Formato circular
		</label>

		<label class="radio-inline">
		<input type="radio" name="optradio" id="botaoRadioRetangular" value="retangular" onclick="exibirTextoInsiraLargura()"> Formato retangular
		</label>

		</div>


		<p></p>

		<div class="alert alert-light" role="alert" style="margin: 0 auto;
    color: black;
    width: fit-content;
    border-radius: 10px; 
    margin-bottom: 15px;">

		<label for="campoValor" class="form-label" id="tipoValor"><b>Insira o diâmetro ou largura (m):</b></label>
		<input type="number" disabled= "true" min="0.8" max="10" onkeyup="imposeMinMax(this)" id="campoValor" class="form-control" style="width: auto; 
		margin: 0 auto; 
		text-align: center; 
		font-size: 20px; 
		font-weight: 800">
		<div id="passwordHelpBlock" class="form-text">
		<b>OBS.:</b>
		Diâmetro mínimo: 1.10m
		-
		
		Largura mínima: 0.80m
		</div>
		<br>

		</div>

		<div class="alert alert-light" role="alert" style="margin: 0 auto;
    color: black;
    width: fit-content;
    border-radius: 10px;
    margin-bottom: 15px;">
		<label for="campoNumPessoas" class="form-label"><b>Insira o número de pessoas ou unidades de contribuição: </b></label>

		<!-- Botão com informações adicionais -->
		<button type="button" class="btn btn-secondary" id="botaoHelpInfiltracao" data-container="body" title="Exemplos:" data-toggle="popover" data-placement="top" data-content="• Quantas pessoas residem no imóvel? (ou número de dormitórios X2) <br /> • Quantas refeições são servidas diariamente em um restaurante? <br /> • Quantos lugares em um cinema? <br /> • Quantas bacias sanitárias em um sanitário público?" data-html="true"
		style="margin-bottom: 5px; border-radius: 120px; font-size: smaller;">
		?
		</button>  

		<input type="number" min="1" id="campoNumPessoas" class="form-control" style="width: auto; margin: 0 auto; margin: 0 auto; 
		text-align: center; 
		font-size: 20px; 
		font-weight: 800">
		<div id="passwordHelpBlock" class="form-text">
		<b>OBS.:</b> Número mínimo: 1 pessoa/unidade de contribuição.
		</div>
		<br>

	</div>

		<div class="alert alert-light" role="alert" style="margin: 0 auto;
    color: black;
    width: fit-content;
    border-radius: 10px;
    margin-bottom: 15px;">

		<label class="form-label"><b>Tipo de habitação:</b></label> <br>
		<select class="selectpicker" title="Selecionar..." data-width="auto" data-live-search="true" id="tipoResidenciaOption" aria-label=".form-select-lg example" style="width: auto;">
		<option value="1">Casa - Padrão ALTO</option>
		<option value="2">Casa - Padrão MÉDIO</option>
		<option value="3">Casa - Padrão BAIXO</option>
		<option value="4">Hotel</option>
		<option value="5">Alojamento Provisório</option>
		<option value="6">Fábrica em Geral</option>
		<option value="7">Escritório</option>
		<option value="8">Edifícios Públicos ou Comerciais</option>
		<option value="9">Escolas</option>
		<option value="10">Bares</option>
		<option value="11">Restaurantes e similares</option>
		<option value="12">Cinemas, Teatros, Locais de Curta permanência</option>
		<option value="13">Sanitários Públicos</option>
		</select>
		<br>
		<br>
	</div>


		<div class="alert alert-light" role="alert" style="margin: 0 auto;
    color: black;
    width: fit-content;
    border-radius: 10px;
    margin-bottom: 15px;">

		<label class="form-label"><b>Temperatura do mês mais frio (°C):</b></label> <br>
		<div class="form-check">
		<input class="form-check-input" type="radio" name="flexRadioDefault" id="temperaturaRadio1" value="igualAbaixo10">
		<label class="form-check-label" for="temperaturaRadio1">
		Igual ou abaixo de 10 °C;
		</label>
		</div>
		<div class="form-check">
		<input class="form-check-input" type="radio" name="flexRadioDefault" id="temperaturaRadio2" value="entre10e20">
		<label class="form-check-label" for="temperaturaRadio2">
			Entre 10 °C à 20 °C;
		</label>
		</div>
		<div class="form-check">
		<input class="form-check-input" type="radio" name="flexRadioDefault" id="temperaturaRadio3" value="igualSuperior20">
		<label class="form-check-label" for="temperaturaRadio3">
			Igual ou superior a 20 °C.
		</label>
		</div>

		</div>
		<br>


		<div class="alert alert-light" role="alert" style="margin: 0 auto;
    color: black;
    width: fit-content;
    border-radius: 10px;
    margin-bottom: 15px;
    margin-top: -21px;">
		<label class="form-label"><b>Intervalo de Limpeza (anos):</b></label> <br>
		<select class="custom-select" aria-label="Default select example" id="intervaloLimpeza" style="width: auto;">
		<option value="0">Intervalo de Limpeza</option>
		<option value="1">1 Ano</option>
		<option value="2">2 Anos</option>
		<option value="3">3 Anos</option>
		<option value="4">4 Anos</option>
		<option value="5">5 Anos</option>
		</select>

	</div>
		<!-- SUMIDOURO - BOTÃO CHECK PARA HABILITAR CAMPOS -->

		<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" id="customSwitch1">
			<label class="custom-control-label" for="customSwitch1"><b>Dimensionar Sumidouro</b></label>
		</div>
		<br>

		<!-- CONJUNTO DIÂMETRO E COEFICIENTE DE INFILTRAÇÃO - SUMIDOURO -->
		<div id="campoCoeficienteSumidouro" style="display: none">

			<label><b>Diâmetro do sumidouro (m):</b></label></b>
			<input type="number" id="campoDIAMETRO_SUMIDOURO" class="form-control" style="
			width: auto; 
			margin: 0 auto; 
			margin: 0 auto; 
			text-align: center; 
			font-size: 20px; 
			font-weight: 800">
			Diâmetro mínimo: 0.30m - Diâmetro recomendado: 1.00m à 1.50m
			<p></p>
			<br>

			<label><b>Coeficiente de infiltração (L/m².dia):</b></label>
			
			<!-- Botão com informações adicionais -->
			<button type="button" class="btn btn-secondary" id="botaoHelpInfiltracao" data-container="body" title="Coeficiente de infiltração:" data-toggle="popover" data-placement="top" data-content="Caso não saiba o Coeficiente de infiltração da sua região utilize a tabela a baixo e adote um valor provável."
			style="margin-bottom: 5px; border-radius: 100px; font-size: smaller;">
			?
			</button>

			<input type="number" id="campoCOEFICIENTE_INF_SUMIDOURO" class="form-control" style="
			width: auto; 
			margin: 0 auto; 
			margin: 0 auto; 
			text-align: center; 
			font-size: 20px; 
			font-weight: 800">
			<br>
			
			<table>
				<thead>
					<tr>
						<td>Constituição provável dos solos</td>
						<td>Coeficiente de infiltração (L/m²xdia)</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Rochas, argilas compactas de cor branca cinza ou preta, variando a rochas alteradas e argilas medianamente compactadas de cor avermelhada</td>
						<td>Menor ou igual a 20</td>
					</tr>
					<tr>
						<td>Argilas de cor amarela vermelha ou marrom medianamente compacta, variando a argilas pouco siltosas e/ou arenosas</td>
						<td>20 a 40</td>
					</tr>
					<tr>
						<td>Argilas arenosas e/ou siltosas. Variando a areia argilosa ou silte argiloso de cor amarela, vermelha ou marrom</td>
						<td>40 a 60</td>
					</tr>
					<tr>
						<td>Areia ou silte argiloso, ou solo arenoso com húmus e turfas, variando a solos constituídos predominantemente de areias e siltes</td>
						<td>60 a 90</td>
					</tr>
					<tr>
						<td>Areia bem selecionada e limpa, variando a areia grossa com cascalhos</td>
						<td>Maior que 90</td>
					</tr>
				</tbody>
			</table>
		</div>

		<p></p>
		<button type="button" onclick="verificarEProcessar()" class="btn btn-outline-primary btn-lg"  data-target="#exampleModal">
		Gerar Relatório </button>

				</div>

		<p></p>

	</div>
	</form>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<center><img id="imagembanner" src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/SepticusLogo.png" width="180px;"></center>

</body> <!-- fim corpo do site -->

<FOOTER> <!-- rodapé -->
	<p><center>
	<font size="2" face="Verdana" color="#6c757d">
		<b>Aplicação web desenvolvida por Juliane Ferreira Caldeira, projeto PIBITI, IFBA - campus Eunápolis.</b>
	</font>
	</p></center>
</FOOTER>

</div>

<script src="codigojs.js?v=<?php echo time(); ?>"></script> <!-- IMPORTA O CÓDIGO JAVASCRIPT -->

</html>
