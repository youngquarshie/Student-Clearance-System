<?php
require('fpdf/fpdf.php');
$id=$_POST['id'];
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'<script> var ghana="<?php echo $id?>"; document.write(ghana);</script>');
$pdf->Output();

?>