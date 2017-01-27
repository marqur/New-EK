<?php

require_once('core/init.php');
$id = $_GET['id'];


//database fetch
$query = $conn->prepare("SELECT * FROM sto WHERE id='$id'");
$query->execute();



//filtriranje stolice
while($sto_info = $query->fetch(PDO::FETCH_ASSOC)){
				 $sto_ime = $sto_info['sto_ime'];
		         $sto_kategorija = $sto_info['sto_kategorija'];
		         $sto_slika = $sto_info['sto_slika'];
		         $sto_opis = $sto_info ['sto_opis'];
		         $sto_familija = $sto_info ['sto_familija'];
		         $dim1 = $sto_info ['sto_dim1'];
		         $dim2 = $sto_info ['sto_dim2'];
		         $dim3 = $sto_info ['sto_dim3'];
		         $dim4 = $sto_info ['sto_dim4'];

}

if(empty($sto_small_4) || empty($sto_small_5) ){
	$bool = true;
}else{
	$bool = false;
}



// Include the main TCPDF library (search for installation path).
require_once('tcpdf/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);





// set margins

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// get esternal file content

// -------------------------------------------------------------------

$pdf->setFont('dejavusans');


// add a page
$pdf->AddPage();

// set JPEG quality
$pdf->setJPEGQuality(100);

// Image method signature:
// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Example of Image from data stream ('PHP rules')
$imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');

// The '@' character is used to indicate that follows an image data stream and not an image file name


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Image example with resizing

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




$pdf->SetXY(85, 15);
$pdf->Image('images/icons/eurokancom_2.png', '', '', 40 , 8, '', '', 'T', false, 300, '', false, false, 1, false, false, false);


$title ='<h1 style="text-align: center; font-size: 120px; font-family:Serif;  color:#BBBDC0; text-transform: capitalize !important;">  Sto  </h1>';

$subtitle ='<h4 style="text-align: center; font-size: 50px;
		color:#6D6E70; text-transform: capitalize !important;">' . $sto_ime . '</h4>';


// output the HTML content
$pdf->SetXY(15, 25);
$pdf->writeHTML($title);
$pdf->SetXY(15, 65);
$pdf->writeHTML($subtitle);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$stoopis ='<p style="text-align: center; font-size: 16px; color:#6D6E70; ">' . $sto_opis . '</p>';
$pdf->SetXY(20, 90);
$pdf->writeHTML($stoopis);

// Stretching, position and alignment example

$pdf->SetXY(25, 120);
$pdf->Image($sto_slika, '', '', 160, 100, '', '', 'T');


$dimenzije = '<p style="text-align: right; font-size: 20px; color:#6D6E70; font-weight:bold; ">Dimenzije</p>';
$pdf->SetXY( 30, 230);
$pdf->writeHTML($dimenzije);

$dim_table = '<table>
			<tr>
				<td style="width: 40px;"><img style="width: 40px;" src="images/dimenzije/pf 1.png"></td>
				<td style="width: 40px;"><img style="width: 40px;" src="images/dimenzije/pf 2.png"></td>
				<td style="width: 40px;"><img style="width: 40px;" src="images/dimenzije/pf 3.png"></td>
				<td style="width: 40px;"><img style="width: 40px;" src="images/dimenzije/pf 4.png"></td>
			</tr>
			<tr>
				<td style="text-align: center;">' .  $dim1 . '</td>
				<td style="text-align: center;">' .  $dim2 . '</td>
				<td style="text-align: center;">' .  $dim3 . '</td>
				<td style="text-align: center;">' .  $dim4 . '</td>
			</tr>
		</table>';

$pdf->SetXY( 140, 250);
$pdf->writeHTML($dim_table);

$specs = '<p style="text-align: right; font-size: 20px; color:#6D6E70; font-weight:bold; ">Specifikacije</p>';
$pdf->SetXY( 140, 230);
$pdf->writeHTML($specs);


$specs_table = '
		<table>
			<tr>
				<td style="width: 55px;"><img style="width: 35px;" src="images/dimenzije/icons_box.png"></td>
				<td style="width: 55px;"><img style="width: 35px;" src="images/dimenzije/icons_weight.png"></td>
				<td style="width: 55px;"><img style="width: 35px;" src="images/dimenzije/icons_fabrics.png"></td>
			</tr>
			<tr>
				<td style="text-align: center;">12m<sup>3</sup></td>
				<td style="text-align: center;">7kg</td>
				<td style="text-align: center;">0.75m</td>
			</tr>
		</table>';

$pdf->SetXY( 30, 250);
$pdf->writeHTML($specs_table);
// -------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Eurokancom Proizvodi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+