<?php

session_start();
include('verificar_login.php');

?>


Este é o painel do admin

<h3>Usuario : <?php echo $_SESSION['usuario']; ?></h3>
<a href="logout.php">Sair</a>