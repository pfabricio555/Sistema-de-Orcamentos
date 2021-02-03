<?php
$id = $_GET['id'];
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

 @page {
            margin: 0px;

        }

.footer {
    position:absolute;
    bottom:0;
    width:100%;
    background-color: #ebebeb;
    padding:15px;
}

.cabecalho {    
    background-color: #ebebeb;
    padding-top:15px;
    margin-bottom:10px;
}

.titulo{
	margin:0;
}

.areaTotais{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
}

.areaTotal{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
	background-color: #f9f9f9;
	margin-top:2px;
}

.pgto{
	margin:1px;
}

</style>

<div class="cabecalho">
	<div class="row container">
		<div class="col-sm-6">	
            <img src="http://localhost/Sistema-de-Orcamentos/img/Logo.png" width="250px"/> <!-- O caminho da imagem tem que ser absoluto!-->
		</div>
		<div class="col-sm-6">	
			<h3 class="titulo"><b>JC Inject - Modúlos de Injeção</b></h3>
			<h6 class="titulo">Rua da JC Inject Nº 1000, Zona Sul - SP - SP - CEP 00000-000</h6>
		</div>
	</div>
</div>

<div class="container">

    <div class="row">
        <div class="col-sm-8">
            <big> Orçamento Nº <?php echo $id ?></big>
        </div>
        <div class="col-sm-4">
            <big> Data: 10/10/2021 </big>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <p style="font-size:12px"><b>Dados do Cliente</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p style="font-size:12px">Nome:</p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Email:</p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Endereço:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p style="font-size:12px">Telefone:</p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">CPF:</p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <p style="font-size:12px"><b>Dados do Aparelho</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p style="font-size:12px">Produto:</p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Nº Série:</p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Modelo:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p style="font-size:12px">Defeito:</p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <p style="font-size:12px"><b>Laudo Técnico</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p style="font-size:12px">Laudo:</p>
        </div>
    </div>

    <br><br>

    <table class="table">
        <tr bgcolor="#f2f0f1">
            <td> <b>Peça<b> </td>
            <td> <b>Valor Peça<b> </td>
            <td> <b>Quantidade<b> </td>
        </tr>
        <tr>
            <td> Peça </td>
            <td> Valor Peça </td>
            <td> 1 </td>
        </tr>
    </table>

    <hr>
    <br><br>

    <div class="row">
        <div class="col-sm-6">
            
        </div>
        <div class="col-sm-4 areaTotais">
            <p class="pgto" style="font-size:14px"><b>Total de peças:</b></p>
            <p class="pgto" style="font-size:14px"><b>Total Mão de Obra:</b></p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <p style="font-size:14px"><b>Técnico:</b></p>
        </div>
        <div class="col-sm-4 areaTotal">
            <p style="font-size:14px"><b>Total a pagar:</b></p>
        </div>
    </div>
    

</div>

<div class="footer">
<p style="text-align:center">Desenvolvido por Fabricio Conceição</p>
</div>