<?php

function isCampoVazio($variable){

    return ($variable == "NaN");
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!------ Include the above in your HEAD tag ---------->


<style type="text/css">
.invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;
}
.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
}
</style>

<?php
//VARIÁVEIS RECEBIDAS
if(!isset($_POST["geometria"])){
    header("Location: index.php"); 
    die();
}


$diametro = "";
$largura = "";

$diametroOuLargura = "";


//echo "<h2> ESTOU FUNCIONANDO !!! </h2>";

$diametroSumidouro = "";
$profundidadeSumidouro = "";
$volumeTotalSumidouro = "";

$geometria = $_POST["geometria"];

if($geometria == "retangular"){
    $largura = $_POST["dimensaoDIAMETRO_LARGURA_TANQUE"];
    $diametroOuLargura = "Largura";
}elseif($geometria == "cilindrico"){
    $diametro = $_POST["dimensaoDIAMETRO_LARGURA_TANQUE"];
    $diametroOuLargura = "Diâmetro";
}

$comprimento = $_POST["comprimento"];
$profundidadeTanque = $_POST["profundidadeTanque"];
$volumeTotalTanque = $_POST["volumeTotalTanque"];

if(isset($_POST["diametroSumidouro"])){
    $diametroSumidouro = $_POST["diametroSumidouro"];
    $profundidadeSumidouro = $_POST["profundidadeSumidouro"];
    $volumeTotalSumidouro = $_POST["volumeTotalSumidouro"];
}







?>

<section class="content content_content" style="width: 70%; margin: auto;">
    <section class="invoice">

        <!-- TÍTULO -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header" align="center">
                    <i class="fa fa-globe"></i> <img id="imagembanner" src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/SepticusLogo.png" width="35%"><br>
                    <i class="fa fa-globe"></i> <img id="imagembanner" src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/IFBA_Eunapolis.png" width="15%">
                    <i class="fa fa-globe"></i> <img id="imagembanner" src="https://raw.githubusercontent.com/julianecaldeira/Septicus/main/Imagens/gemaa.png" width="15%">
                </h2>
            </div><!-- /.col -->
        </div>

        <!-- linhas de informações sobre o projeto -->
        <div class="row invoice-info">
            
            <div class="col-sm-4 invoice-col">
                <b>SEPTICUS 2.0</b><br>
                <i>Copyright (2022)©</i><br>
                Dimensionamento e levantamento de materiais para tanque sépticos e sumidouro residenciais<br>
                <address>
                    <strong>
                    </strong>
                </address>
            </div><!-- /.col -->
            
            <!-- linhas de informações sobre desenvolvedor -->
            <div class="col-sm-4 invoice-col">
                Desenvolvido por:
                <address>
                    <b>Juliane Ferreira Caldeira</b><br>
                    Graduanda em Engenharia Civil <br>
                    <b>Davi Santiago Aquino</b><br>
                    Engenheiro Ambiental (orientador) <br>
                    <!-- <a class="nav-link" href="https://www.linkedin.com/in/julianecaldeira/">LinkedIn</a> -->
                </address>
            </div><!-- /.col -->

            <!-- linhas de informações sobre o SEPTICUS -->
            <div class="col-sm-4 invoice-col">
                
            Dimensionamento conforme:<br>
            <b>ABNT NBR 7229, 1993</b><br>
            <b>ABNT NBR 13969, 1997</b><br>
            <b>FUNASA, 2019</b><br>
            <b>SINAPI, 2020</b>
            </div><!-- /.col -->
        
        </div><!-- /.linhas de informações sobre o projeto -->
        <br>


        <hr class="my-4">
        <h4>Identificação do projeto</h4> <!-- titulo -->

        <b>Responsável técnico/construtor:</b> Poderia acrescentar na homepage um campo para inserir o nome e imprimir aqui?<br> 
        <b>Endereço da obra:</b> Poderia acrescentar na homepage um campo para inserir o endereço e imprimir aqui?<br>
        <b>Data de emissão do relatório</b>: criar uma função que capture a data dia/mês/ano.<br>
        <hr class="my-4">

        
        <!-- INFORMAÇÕES DO MODAL SUSPENSO: INFORMAÇÕES GEOMETRICAS DO DIMENSIONAMENTO -->       
        <h4>Dimensões</h4> <!-- titulo -->
        <p></p>
        <div class="table-responsive">
            <table class="table">
                <tbody>

                    <!-- programar de forma que dependendo da opção de dimensionamento apareça ou não uma linha. 
                        Exemplo: só parece a segunda linha de sumidouro caso o mesmo tenha sido selecionado. 
                        Se a fossa for cilindra apareça uma linha que tenha diametro e profundidade, 
                        senão apareça uma linha que tenha largura, comprimento e profundidade!-->

                    <thead>
                        <tr>
                            <th>Equipamento</th>
                            <th>Geometria</th>
                            <th><?php echo $diametroOuLargura  ?> (m)</th>
                            
                            <?php 
                                if($geometria == "retangular"){
                                    echo "<th> Comprimento (m) </th> ";
                            }                         
                            ?>

                            <th>Profundidade (m)</th>
                            <th>Volume total (m³)</th>
                        </tr>
                    </thead> 

                    <tbody>
                        <tr>
                            <th> Tanque séptico </th>
                            <td> <?php  echo $geometria  ?> </td>
                            
                            <td> 
                            <?php 
                            if($geometria == "retangular"){
                                echo $largura;
                            }elseif($geometria == "cilindrico"){
                                echo $diametro;
                            }
                            ?> 
                            </td>
                            
                            <?php                          
                                if($geometria == "retangular"){
                                    echo "<td> " . $comprimento . "</td>";
                                } 
                            ?>

                            <td> <?php  echo $profundidadeTanque?> </td>
                            <td> <?php echo $volumeTotalTanque ?> </td>
                        </tr>


                        

                    <?php 
                    ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo "<thead>";
                        echo "<tr>";
                                echo "<th> Equipamento </th>";
                                echo "<th> Geometria </th>";
                                echo "<th> Diametro (m) </th>";
                                echo "<th> Profundidade (m) </th>";
                                echo "<th> Volume total (m³) </th>";
                        echo "</tr>";
                        echo "</thead>";

                        echo "<tbody>";
                                echo "<th> Sumidouro </th>";
                                echo "<td> cilíndrico </td>";
                                echo "<td>" . $diametroSumidouro . "</td>";
                                echo "<td>" . $profundidadeSumidouro . "</td>";
                                echo "<td>" . $volumeTotalSumidouro . "</td>";
                        echo "</tbody>";

                    }else{
                        ##echo "<h5> Sumidouro não selecionado. </h5>";##
                    }

                    ?>

                </tbody>
            </table>
        </div>
       <br><br>

       <!-- TABELA INFORMATIVA CONSUMO DE MATERIAIS-->
       <div id="tabelaConsumoMateriais">
       <h4>Consumo de materiais por m³ de concreto</h4> <!-- titulo -->
       <div class="row">
           <div class="col-xs-12 table-responsive">

               <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Mistura</th>
                           <th>Utilização</th>
                           <th>Traço</th>
                           <th>Cimento</th>  
                           <th>Cal</th> 
                           <th>Areia (m³)</th> 
                           <th>Pedra britada (m³)</th> 
                           <th>Água (Litros)</th>  
                       </tr>                     
                   </thead>
                   <tbody>
                       <!-- Cada <tr> é uma linha da lista de materiais --> 
                        <tr>
                           <td>Concreto</td>
                           <td>Contrapiso</td>
                           <td>1:3:6</td>
                           <td>4.20</td>
                           <td>-</td>
                           <td>0.564</td>
                           <td>0.441</td>
                           <td>198</td>
                        </tr>

                        <tr>
                            <td>Argamassa</td>
                            <td>Contrapiso</td>
                            <td>1:0:6</td>
                            <td>10</td>
                            <td>-</td>
                            <td>1.080</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>Argamassa</td>
                            <td>Assentamento</td>
                            <td>1:4:16</td>
                            <td>3.65</td>
                            <td>9</td>
                            <td>1.400</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>Argamassa</td>
                            <td>Chapisco</td>
                            <td>1:0:8</td>
                            <td>7.40</td>
                            <td>-</td>
                            <td>1.100</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>Argamassa</td>
                            <td>Emboço</td>
                            <td>1:1:12</td>
                            <td>4.90</td>
                            <td>2.900</td>
                            <td>1.100</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>Argamassa</td>
                            <td>Reboco</td>
                            <td>1:4:8</td>
                            <td>3.30</td>
                            <td>7.800</td>
                            <td>1.100</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                       
                   </tbody>
               </table>
           </div><!-- /.col -->
           </div>
                </div>
       <br><br>

        <!-- TABELA QUANTITATIVO DE MATERIAIS-->
        <h4>Quantitativo de materiais</h4> <!-- titulo -->
        <?php

        $blocoTanque = $_POST['blocoTanque'];
        $blocoSumidouro = $_POST['blocoSumidouro'];
        $blocoTotal = $_POST['blocoTotal'];


        $cimentoTanque = $_POST['cimentoTanque'];
        $cimentoSumidouro = $_POST['cimentoSumidouro'];
        $cimentoTotal = $_POST['cimentoTotal'];

        $calTanque = $_POST['calTanque'];
        $calSumidouro = $_POST['calSumidouro'];
        $calTotal = $_POST['calTotal'];

        $areiaTanque = $_POST['areiaTanque'];
        $areiaSumidouro = $_POST['areiaSumidouro'];
        $areiaTotal = $_POST['areiaTotal'];

        $brita01Tanque = $_POST['brita01Tanque'];
        $brita01Sumidouro = $_POST['brita01Sumidouro'];
        $brita01Total = $_POST['brita01Total'];

        $brita03Sumidouro = $_POST['brita03Sumidouro'];
        $brita03Total = $_POST['brita03Total'];

        $aguaTanque = $_POST['aguaTanque'];
        $aguaTotal = $_POST['aguaTotal'];


        ?>



        <div class="row">
            <div class="col-xs-12 table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Materiais</th>
                            <th>Descrição</th>
                            <th>Quant. Tanque Séptico</th>
                            <th>Quant. Sumidouro</th>  
                            <th>Quantidade total</th>  
                        </tr>                     
                    </thead>
                    <tbody>
                        <!-- Cada <tr> é uma linha da lista de materiais --> 
                        <tr>
                            <td>Bloco cerâmico</td>
                            <td>19x19x9cm</td>
                            <td><?php echo $blocoTanque; ?> </td>
                            <td>
                            <?php 
                    ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $blocoSumidouro; 
                    }else{
                        echo "0";
                    } 
                            ?> 
                            </td>  <!-- sumidouro -->
                            <td><b><?php                     
                     ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $blocoTotal; 
                    }else{
                        echo $blocoTanque;
                    } ?></b></td>
                        </tr>
                        <tr>
                            <td>Cimento CP III</td>
                            <td>Saco 50Kg</td>
                            <td><?php echo $cimentoTanque; ?> </td>
                            <td><?php                     
                    ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $cimentoSumidouro; 
                    }else{
                        echo "0";
                    }  ?>   </td> <!-- sumidouro -->
                            <td><b><?php                     
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $cimentoTotal; 
                    }else{
                        echo $cimentoTanque;
                    }  ?></b></td>
                        </tr>
                        <tr>
                            <td>Cal</td>
                            <td>Saco 20Kg</td>
                            <td><?php echo $calTanque; ?></td>
                            <td><?php                     
                    ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $calSumidouro; 
                    }else{
                        echo "0";
                    }  ?>   </td> <!-- sumidouro -->
                            <td><b><?php                             
                        ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $calTotal; 
                    }else{
                        echo $calTanque;
                    }  ?></b></td>
                        </tr>
                        <tr>
                            <td>Areia média</td>
                            <td>Litros</td>
                            <td><?php echo $areiaTanque; ?></td>
                            <td><?php                     
                    ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $areiaSumidouro; 
                    }else{
                        echo "0";
                    }  ?>
                            </td> <!-- sumidouro -->
                            <td><b><?php                         
                    ## SE POSSUI SUMIDOURO ##
                    if(!isCampoVazio($diametroSumidouro)){
                        echo $areiaTotal; 
                    }else{
                        echo $areiaTanque;
                    }   ?></b></td>
                        </tr>
                        <tr>
                            <td>Brita 01</td>
                            <td>Litros</td>
                            <td><?php echo $brita01Tanque; ?></td>
                            <td><?php echo $brita01Sumidouro; ?></td> 
                            <td><b><?php echo $brita01Total; ?></b></td>
                        </tr>
                        <tr>
                            <td>Brita 03 ou 04</td>
                            <td>Litros</td>
                            <td>0</td>
                            <td>
                                <?php 
                                    if(!isCampoVazio($diametroSumidouro)){
                                        echo $brita03Sumidouro; 
                                    }else{
                                        echo "0";
                                    }
                                ?>
                            </td>
                            <td>
                                <b>
                                <?php 
                                    if(!isCampoVazio($diametroSumidouro)){
                                        echo $brita03Total; 
                                    }else{
                                        echo "0";
                                    }
                                ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Água</td>
                            <td>Litros</td>
                            <td><?php echo $aguaTanque; ?></td>
                            <td>0</td>
                            <td><b><?php echo $aguaTotal; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.tabela -->
        <br><br>


<!-- TAMPA PARA TANQUE SÉPTICO E SUMIDOURO -->
        
        <?php
            $LarguraTampaTanque = $_POST['LarguraTampaTanque'];
            $ComprimentoTampaTanque = $_POST['ComprimentoTampaTanque'];
            $AreaTampaTanque = $_POST['AreaTampaTanque'];
            $LarguratampaSumidouro = $_POST['LarguratampaSumidouro'];
            $AreaTampaSumidouro = $_POST['AreaTampaSumidouro'];
            $QuantidadeVigotasTanque = $_POST['QuantidadeVigotasTanque'];
            $QuantidadeVigotasSumidouro = $_POST['QuantidadeVigotasSumidouro'];
            $NumeroVaosTanque = $_POST['NumeroVaosTanque'];
            $NumeroVaosSumidouro = $_POST['NumeroVaosSumidouro'];
            $QuantidadeTavelasTanque = $_POST['QuantidadeTavelasTanque'];
            $QuantidadeTavelasSumidouro = $_POST['QuantidadeTavelasSumidouro'];
        ?>

<h4>Tampa de laje treliçada unidirecional com enchimento cerâmico</h4> <!-- titulo -->

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="5" style="text-align:center"> DIMENSIONAMENTO</th>
                        <th colspan="3" style="text-align:center"> MATERIAIS</th>
                    </tr>
                    <tr>
                        <th>Equipamento</th>
                        <th>Geometria</th>
                        <th>Largura (m)</th>
                        <th>Comprimento (m)</th>
                        <th>Área da tampa (m²)</th>
                        <th> N° vãos</th>
                        <th> Vigotas </th>
                        <th> Comprimento vigotas (m) </th>
                        <th> Blocos cerâmicos </th>
                    </tr>
                </thead> 

                <tbody>
                    <tr>
                        <th> Tanque séptico </th>
                        <td> Retangular </td>
                        <td> <?php echo $LarguraTampaTanque; ?> </td>
                        <td> <?php echo $ComprimentoTampaTanque; ?> </td>
                        <td> <?php echo $AreaTampaTanque; ?> </td>
                        <td> <?php echo $NumeroVaosTanque; ?> </td>
                        <td> <?php echo $QuantidadeVigotasTanque; ?></td>
                        <td> <?php echo $LarguraTampaTanque; ?> </td>
                        <td> <?php echo $QuantidadeTavelasTanque; ?> </td>
                    </tr>
                <?php 

                ## SE POSSUI SUMIDOURO ##
                if(!isCampoVazio($diametroSumidouro)){

                    echo "<tbody>";
                            echo "<th> Sumidouro </th>";
                            echo "<td> Cilíndrico </td>";
                            echo "<td>" . $LarguratampaSumidouro . "</td>";
                            echo "<td>" . $LarguratampaSumidouro . "</td>";
                            echo "<td>" . $AreaTampaSumidouro . "</td>";
                            echo "<td>" . $NumeroVaosSumidouro . "</td>";
                            echo "<td>" . $QuantidadeVigotasSumidouro . " </td> ";
                            echo "<td>" . $LarguratampaSumidouro . " </td>";
                            echo "<td>" . $QuantidadeTavelasSumidouro . "</td>";
                    echo "</tbody>";

                }else{
                    ##echo "<h5> Sumidouro não selecionado. </h5>";##
                }

                ?>

                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.tabela -->
    <br><br>


        <!-- CAMPOS PARA OBSERVAÇÕES E INFORMAÇÕES ADICIONAIS -->
        <div class="row">
            <div class="col-md-12">
                <p class="lead" align="justify"> 
                    <b>EXECUÇÃO:</b></br>
                    • O local da construção deve possuir os seguintes afastamentos mínimos: <b>1,50 metros</b> de construções, limites de terreno e entrada de água; <b>3 metros</b> de árvores; e <b>15 metros</b> de rios, corrégos e poços artesianos.<br>
                    • Após execução da escavação e, caso seja necessário, da contenção da cava, preparar o fundo com lastro de brita;<br>
                    • Sobre o lastro de brita, montar as fôrmas da laje de fundo do tanque séptico e suas armaduras. E, em seguida, realizar a sua concretagem;<br>
                    • Sobre a laje de fundo, assentar os tijolos com argamassa aplicada com colher, atentando-se para o posicionamento dos tubos de entrada e de saída, até a altura da cinta horizontal;<br>
                    • Executar a cinta sobre a alvenaria com fôrmas, armadura e graute;<BR> 
                    • Concluída a alvenaria, revestir o fundo e as paredes internamente com chapisco e reboco e externamente somente com chapisco;<br>
                    • Por fim, colocar as peças pré-moldadas de fechamento sobre o tanque séptico e instalar a tampa hermética de inspeção;<br>
                    • O fundo do sumidouro terá uma camada de brita número 3 ou 4 com uma altura de 50 cm.<br><br>

                </p>
                
            </div><!-- /.col -->
        </div><!-- /.observações -->
        <br><br>
        
        <!-- Botões no final da página / dimensionar:retorna para os dados de entra / Memorial de cálculo: exibe ou faz o download do pdf com o passo a passo do calculo / Gerar PDF: salva a página atual no formato PDF -->
        <div class="row no-print">
            <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="location.href='index.php';"; style="margin-right: 5px;">Redimensionar</button>
                <button class="btn btn-primary pull-right" onclick="location.href='anexos.php';"; style="margin-right: 5px;">Anexos</button>
                <button class="btn btn-primary pull-right" onclick=window.print(); style="margin-right: 5px;">Imprimir</button>
            </div>
        </div>
    </section>
</section>
