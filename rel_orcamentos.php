<?php
include('conexao.php');

session_start();
include('verificar_login.php');

?>

<!DOCTYPE html>
<html>
<head>
  <title>Relatório de Orçamentos</title>


<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



</head>


<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="painel_funcionario.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <select class="form-control mr-2" id="category" name="status">
        <option value="Aguardando">Aguardando</option>
        <option value="Aprovado">Aprovado</option>
      </select>
      <input name="txtpesquisar" class="form-control mr-sm-2" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>





<div class="container">


    

      <br>


        <div class="row">
          
        </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Orçamentos Fechados</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS ORÇAMENTOS -->

                      <?php


                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '' and $_GET['status'] != 'Aguardando') {
                          $data = $_GET['txtpesquisar'] . '%';
                          $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, o.data_abertura, c.nome as cli_nome, c.telefone, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where data_abertura = '$data' and status = 'Aprovado' order by id asc";
                        }
                        elseif(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] == '' and $_GET['status'] != 'Aguardando') {
                            $data = $_GET['txtpesquisar'] . '%';
                            $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, o.data_abertura, c.nome as cli_nome, c.telefone, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where data_abertura = curDate() and status = 'Aprovado' order by id asc";
                        }
                        elseif(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '' and $_GET['status'] == 'Aguardando') {
                            $data = $_GET['txtpesquisar'] . '%';
                            $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, o.data_abertura, c.nome as cli_nome, c.telefone, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where data_abertura = '$data' and status = 'Aguardando' order by id asc";
                        }
                        else{
                         $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, o.data_abertura, c.nome as cli_nome, c.telefone, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where status = 'Aguardando' order by data_abertura asc"; 
                        }

                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>

                          

                      <table class="table">
                        <thead class=" text-primary">
                          
                          <th>
                            Cliente
                          </th>

                          <th>
                            Técnico
                          </th>

                          <th>
                            Produto
                          </th>

                          <th>
                            Data
                          </th>

                          <th>
                            Telefone
                          </th>

                          <th>
                            Ações
                          </th>

                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $cliente = $res_1["cli_nome"];
                            $tecnico = $res_1["func_nome"];
                            $produto = $res_1["produto"];
                            $data = $res_1["data_abertura"];
                            $telefone = $res_1["telefone"];

                            $id = $res_1["id"];
                            $data2 = implode('/', array_reverse(explode('-', $data)));

                            ?>

                            <tr>

                             <td><?php echo $cliente; ?></td>
                             <td><?php echo $tecnico; ?></td> 
                             <td><?php echo $produto; ?></td>
                             <td><?php echo $data2; ?></td>
                             <td><?php echo $telefone; ?></td>
                             
                             <td>
                                <a class="btn btn-info" href="rel_orcamentos_class.php?id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                             </td>
                            </tr>

                            <?php 
                              }                        
                            ?>
                            

                        </tbody>
                      </table>
                          <?php 
                              }                        
                            ?>
                    </div>
                  </div>
                </div>
              </div>

</div>

</body>
</html>