<?php
$sql="SELECT * FROM compras";
include 'conexion.php';
include '../fpdf186/fpdf.php';
$pdf=new FPDF('P', 'cm');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(209, 60, 60);
$pdf->Cell(2, 1, 'Cod', 1, 0, 'C', 1);
$str='Descripción';
$str=iconv('UTF-8', 'windows-1252', $str);
$pdf->Cell(5, 1, $str, 1, 0, 'C', 1);
$pdf->Cell(2, 1, 'Peso', 1, 0, 'C', 1);
$pdf->Cell(5, 1, '$/Kg', 1, 0, 'C', 1);
$pdf->Cell(5, 1, '$', 1, 0, 'C', 1);
$pdf->Ln();
$suma=0;
$data=[];
foreach ($conn->query($sql) as $row) {
    $data[]=$row;
    $pdf->Cell(2, 1, $row['codigo'], 1);
    $pdf->Cell(5, 1, $row['descripcion'], 1);
    $pdf->Cell(2, 1, number_format($row['peso'], 3), 1, 0, 'R');
    $pdf->Cell(5, 1, number_format($row['peso_kg'], 2), 1, 0, 'R');
    $pdf->Cell(5, 1, number_format($row['precio'], 2), 1, 0, 'R');
    $suma+=$row['precio'];
    $pdf->Ln();
}
$jsonData=json_encode($data, JSON_PRETTY_PRINT);
$filePath='../src/data.json';
if (file_put_contents($filePath, $jsonData)) {
    # code...
} else {
    # code...
}
$pdf->SetFillColor(13, 110,253);
$pdf->Cell(14, 1, 'Total', 1, 0, 'R', 1);
$pdf->Cell(5, 1, number_format($suma, 2), 1, 0, 'R', 1);
$pdf->Output('I', 'huerta_listado.pdf', true);
?>