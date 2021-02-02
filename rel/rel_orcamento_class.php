<?php

// CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

//INSTANCIA DE OPTIONS
$options = new Options();
$options->setIsRemoteEnabled(true);

//INICIAZIAR A CLASSE DO DOMPDF
$dompdf = new Dompdf($options);

// ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents("rel_orcamento.php"));

// DEFINIR O TAMANHO DO PAPEL E ORIENTAÇÃO DA PÁGINA
$dompdf->setPaper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$dompdf->loadHtml(utf8_decode($html));

//RENDERIZAR O PDF
$dompdf->render();

//NOMEAR O PDF GERADO
$dompdf->stream(
'relatorioOrcamento.pdf',
array("Attachment" => false)
);

?>

