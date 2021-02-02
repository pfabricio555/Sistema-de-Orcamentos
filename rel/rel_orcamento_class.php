<?php 

// CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// ALIMENTAR OS DADOS NO RELATÓRIO
$html = "Este é o conteúdo do relatório";

//INICIAZIAR A CLASSE DO DOMPDF
$pdf = new DOMPDF();

// DEFINIR O TAMANHO DO PAPEL E ORIENTAÇÃO DA PÁGINA
$pdf->set_paper(array(0,0,210, 297));

//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioOrcamento.pdf',
array("Attachment => false");
);

?>