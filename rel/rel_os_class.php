<?php

// CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$id = $_GET['id'];
$email = $_GET['email'];

//INSTANCIA DE OPTIONS
$options = new Options();
$options->setIsRemoteEnabled(true);

//INICIAZIAR A CLASSE DO DOMPDF
$dompdf = new Dompdf($options);

// ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents("http://localhost/Sistema-de-Orcamentos/rel/rel_os.php?id=".$id));

// DEFINIR O TAMANHO DO PAPEL E ORIENTAÇÃO DA PÁGINA
$dompdf->setPaper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$dompdf->loadHtml(utf8_decode($html));

//RENDERIZAR O PDF
$dompdf->render();

//NOMEAR O PDF GERADO
$dompdf->stream(
'relatorio.pdf',
array("Attachment" => false)
);

// ENVIAR O ORÇAMENTO POR EMAIL
$to = 'pfabricio555@outlook.com';
$subject = 'JC Inject Ordem de serviço';
$message = file_get_contents("http://localhost/Sistema-de-Orcamentos/rel/rel_os.php");
$dest = $email;
$headers = 'Content-type: text/html; charset=utf-8;';
mail($to, $subject, $message, $headers);

?>