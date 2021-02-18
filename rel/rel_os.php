<?php
include('../conexao.php');

$id = $_GET['id'];
$id_orc = $_GET['id_orc'];

$query = "select o.id, o.cliente, o.tecnico, o.produto, o.serie, o.problema, o.laudo, o.valor_servico, o.pecas, o.valor_pecas, o.desconto, o.total, o.valor_total, o.status, o.data_abertura, o.data_geracao, c.nome as cli_nome, c.email, c.telefone, c.endereco, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where o.id = '$id_orc'";
$result = mysqli_query($conexao, $query);

while($res_1 = mysqli_fetch_array($result)){

$data2 = implode('/', array_reverse(explode('-', $res_1["data_geracao"])));

    $query_os = "select * from os where id = '$id'";
    $result_os = mysqli_query($conexao, $query_os);

    while($res_2 = mysqli_fetch_array($result_os)){
        $data3 = implode('/', array_reverse(explode('-', $res_2["data_fechamento"])));
    

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
            <big> Ordem de Serviços Nº <?php echo $id ?></big>
        </div>
        <div class="col-sm-4">
            <big> Data: <?php echo $data3;?> </big>
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
            <p style="font-size:12px">Nome: <?php echo $res_1['cli_nome'];?></p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Email: <?php echo $res_1['email'];?></p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Endereço: <?php echo $res_1['endereco'];?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p style="font-size:12px">Telefone: <?php echo $res_1['telefone'];?></p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">CPF: <?php echo $res_1['cliente']; ?></p>
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
            <p style="font-size:12px">Produto: <?php echo $res_1['produto']; ?></p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Nº Série: <?php echo $res_1['serie'];?></p>
        </div>
        <div class="col-sm-3">
            <p style="font-size:12px">Modelo:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p style="font-size:12px">Defeito: <?php echo $res_1['problema'];?></p>
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
            <p style="font-size:12px">Laudo: <?php echo $res_1['laudo'];?></p>
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
            <td> <?php echo $res_1['pecas'];?> </td>
            <td> R$ <?php echo $res_1['valor_pecas'];?> </td>
            <td> 1 </td>
        </tr>
    </table>

    <hr>
    <br><br>

    <div class="row">
        <div class="col-sm-6">
            
        </div>
        <div class="col-sm-4 areaTotais">
            <p class="pgto" style="font-size:14px"><b>Total de peças:</b> R$ <?php echo $res_1['valor_pecas'];?></p>
            <p class="pgto" style="font-size:14px"><b>Total Mão de Obra:</b> R$ <?php echo $res_1['valor_servico'];?></p>
            <p class="pgto" style="font-size:14px"><b>Total Desconto:</b> R$ -<?php echo $res_1['desconto'];?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <p style="font-size:14px"><b>Técnico:</b> <?php echo $res_1['func_nome'];?></p>
        </div>
        <div class="col-sm-4 areaTotal">
            <p style="font-size:14px"><b>Total a pagar:</b> R$ <?php echo $res_2['total'];?></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            
        </div>
        <div class="col-sm-3">
            <p style="font-size:10px">Garantia de <?php echo $res_2['garantia'];?> a partir de <?php echo $data3;?> </p>
        </div>
    </div>
    

</div>

<div class="footer">
<p style="text-align:center">Desenvolvido por Fabricio Conceição</p>
</div>

<?php } }?>