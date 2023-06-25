<?php
require ("fpdf181/fpdf.php");
//$file = fopen("gst.csv","r");
$file = fopen("gst.csv","r");



//=========================================
  $pdf = new FPDF();
  $pdf->AliasNbPages();
  $pdf->SetFont('Arial','B',16);

  //while ($row = mysql_fetch_array($result)) {
  while (($data = fgetcsv($file)) !== FALSE){       
      $pdf->AddPage();
      //$pdf->Cell(42, 10, $row["firstname"] . " " . $row["lastname"]);
      
    // Logo
    //$pdf->Image('GHAR.png',10,6,30); //upper corner and its width, The height is calculated automatically 
    
    //$pdf->SetFont('Arial','B',11);    
    //$pdf->SetXY(13, 45); //column,row
    //$pdf->Write(0, "DG.");
  
      
      
    // Arial bold 15
    //$pdf->SetFont('Arial','B',15);
    // Move to the right
    $pdf->Cell(80);
    // Title
    //$pdf->SetX($pdf->lMargin);
    
    $pdf->SetTextColor(220,50,50); //red
    $pdf->SetTextColor(91,137,42); //green
    
    $pdf->SetFont('Arial','',25);
    $pdf->Cell( 0, 10, 'DG.com'.$data[0], 0, 0, 'L' );
    
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell( 0, 10, 'INVOICE'.$data[0], 0, 0, 'R' );
    //echo "prod   : " . $data[1]."<br>";
    //=========================================================================================================
    //=========================================================================================================
    
    
    // Line break
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',8);
    $pdf->SetTextColor(99,0,0); //deep pink
    $pdf->setTextColor(0, 120, 120); //skyblue
    $pdf->SetTextColor(0,0,255); // blue
    $pdf->SetTextColor(11, 47, 132);// blueother
    $pdf->SetTextColor(0, 0, 0);// BLACK
    
    $pdf->Cell( 0, 10, 'Date August 31, 2017', 0, 0, 0 );
    //$pdf->SetXY(13, 45); //column,row
    $pdf->Cell( 0, 17, 'Due Date August 31, 2017', 0, 0, 0 );
    $pdf->Ln(10);
    $pdf->SetTextColor(91,137,42); // green
    $pdf->Cell( 0, 10, '________________________________________________________________________________________________________________________', 0, 0, 'L' );
    
     // Line break
    $pdf->Ln(10); 
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(91,137,42);
  
$pdf->SetFont('Arial','BI',11);    
$pdf->SetXY(13, 45); //column,row
$pdf->Write(0, "DIETGHAR.COM");

$pdf->SetXY(110, 45); //column,row
$pdf->Write(0, "Bill to:");

$pdf->SetTextColor(0, 0, 0); // black color
$pdf->SetFont('Arial','',8);  
$pdf->SetXY(110, 50); //column,row
$pdf->Write(0, $data[7]); //bill1
//echo "prod   : " . $data[1]."<br>";

$pdf->SetXY(110, 54); //column,row
$pdf->Write(0, $data[8]); ////bill2

$pdf->SetXY(110, 58); //column,row
$pdf->Write(0, $data[9]); //bill3

$pdf->SetXY(110, 62); //column,row
$pdf->Write(0, $data[10]); //bill4

// Line break
$pdf->Ln(10); 

//$pdf->SetXY(110, 62); //column,row
//$pdf->Write(0, "New Delhi");

// Line break
$pdf->Ln(10); 

$pdf->SetFont('Arial','B',8);  
$pdf->SetTextColor(91,137,42);
$pdf->SetXY(10, 70); //column,row
$pdf->Write(0, "______________________________________________________________________________________________________________________");

$pdf->SetXY(10, 76); //column,row
$pdf->Write(0, "NO");

$pdf->SetXY(22, 76); //column,row
$pdf->Write(0, "PRODUCT/SERVICE NAME");

$pdf->SetXY(65, 76); //column,row
$pdf->Write(0, "HSN/SAC");

$pdf->SetXY(85, 76); //column,row
$pdf->Write(0, "QTY");

$pdf->SetXY(100, 76); //column,row
$pdf->Write(0, "UNIT PRICE");

$pdf->SetXY(129, 76); //column,row
$pdf->Write(0, "CGST");

$pdf->SetXY(149, 76); //column,row
$pdf->Write(0, "SGST");

$pdf->SetXY(180, 76); //column,row
$pdf->Write(0, "AMOUNT");

$pdf->SetXY(10, 80); //column,row
$pdf->Write(0, "______________________________________________________________________________________________________________________");


    //=========================================================================================================
    //=========================================================================================================


// Line break
$pdf->Ln(2); 

$pdf->SetTextColor(0, 0, 0); // black color
$pdf->SetFont('Arial','B',8);  
$pdf->SetXY(10, 85); //column,row
$pdf->Write(0, $data[1]); //InvoiceID

$pdf->SetXY(30, 85); //column,row
$pdf->Write(0, $data[2]);//product

$pdf->SetXY(86, 85); //column,row
$pdf->Write(0, $data[3]);  //qty



$pdf->SetXY(182, 85);      //column,row
//$pdf->Write(0, $data[6]);  // AMOUNT WHICH IS THERE IN CSV
$pdf->Write(0, number_format((float)$data[6], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV


$pdf->SetXY(128, 85); //column,row CGST
$pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT
//round(520.34345,2)
//$pdf->Write(0,            (      round(   ($data[6]*18)/118) ),2        );  //gst CALCULATED FROM AMOUNT


$pdf->SetXY(150, 85); //column,row SGST
$pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT
//round(520.34345,2)
//$pdf->Write(0,            (      round(   ($data[6]*18)/118) ),2        );  //gst CALCULATED FROM AMOUNT


$pdf->SetXY(105, 85); //column,row
//$pdf->Write(0, ($data[6]-($data[6]*18)/118));  //unit_price AMOUNT-CALC GST
$pdf->Write(0, number_format((float)($data[6]-($data[6]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

//$foo = "105";
//echo number_format((float)$foo, 2, '.', '');  // Outputs -> 105.00



$pdf->SetTextColor(0, 0, 0); // black color
$pdf->SetFont('Arial','',7);  

$pdf->SetXY(129, 88); //RATE PERCENTAGE
$pdf->Write(0, "9.00%");

$pdf->SetXY(152, 88); //RATE PERCENTAGE
$pdf->Write(0, "9.00%");


// Line break
$pdf->Ln(5);  //big gap

$pdf->SetFont('Arial','B',8);  
$pdf->SetTextColor(91,137,42);
$pdf->SetXY(10, 170); //column,row
$pdf->Write(0, "______________________________________________________________________________________________________________________");

$pdf->SetXY(60, 176); //column,row
$pdf->Write(0, "TOTAL");

$pdf->SetXY(86, 176); //column,row
//$pdf->Write(0, "1.00");
$pdf->Write(0, $data[3]);  //qty

$pdf->SetXY(105, 176); //column,row
//$pdf->Write(0, "2542.00");
$pdf->Write(0, number_format((float)($data[6]-($data[6]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

$pdf->SetXY(128, 176); //column,row
//$pdf->Write(0, "457.56");
$pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT CGST

$pdf->SetXY(149, 176); //column,row
//$pdf->Write(0, "457.56");
$pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT SGST



$pdf->SetXY(184, 176); //column,row
//$pdf->Write(0, "2999.56");
$pdf->Write(0, number_format((float)$data[6], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

$pdf->SetXY(10, 180); //column,row
$pdf->Write(0, "______________________________________________________________________________________________________________________");



//=====================================================================================================
//=====================================================================================================

$pdf->SetTextColor(0, 0, 0); // black color
$pdf->SetFont('Arial','B',6);    
$pdf->SetXY(10, 185); //column,row
//$pdf->Write(0, "Total Rs. Two Thousand Nine Hundred Ninety Nine and Fifty Six Paise only.");
$pdf->Write(0, $data[11]);
//$data[11]// amt_in_word

$pdf->SetTextColor(91,137,42); //green
$pdf->SetFont('Arial','B',8);    

$pdf->SetXY(10, 192); //column,row
$pdf->Write(0, "AUTHORISED SIGNATORY");      

$pdf->SetTextColor(91,137,42); //green
$pdf->SetFont('Arial','B',8);    
//$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(125, 185); //column,row
$pdf->Write(0, "TOTAL BEFORE TAX");

$pdf->SetXY(125, 189); //column,row
$pdf->Write(0, "TOTAL TAX AMOUNT");        

$pdf->SetXY(125, 193); //column,row
$pdf->Write(0, "TOTAL AMOUNT");      

$pdf->SetXY(125, 197); //column,row
$pdf->Write(0, "AMOUNT RECEIVED");      

$pdf->SetXY(125, 201); //column,row
$pdf->Write(0, "AMOUNT DUE");      
//================
$tbt = 2542.00; // "TOTAL BEFORE TAX"
$tta =  457.56; // "TOTAL TAX AMOUNT"
$ta  = 2999.56; // "TOTAL AMOUNT"
$ar  = 2999.56; // "AMOUNT RECEIVED"
$ad  =    0.00; // "AMOUNT DUE"

$pdf->SetXY(184, 185); //column,row
//$pdf->Write(0, $tbt);
$pdf->Write(0, number_format((float)($data[6]-($data[6]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

$pdf->SetXY(185.5, 189); //column,row
//pdf->Write(0, $tta);
$pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT

$pdf->SetXY(184, 193); //column,row
//$pdf->Write(0, $ta);
$pdf->Write(0, number_format((float)$data[6], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

$pdf->SetXY(184, 197); //column,row
//$pdf->Write(0, $ta);
$pdf->Write(0, number_format((float)$data[6], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV


$pdf->SetXY(184, 200); //column,row
//$pdf->Write(0, $ta);
$pdf->Write(0, number_format((float)$data[6], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

// Line break
$pdf->Ln(20);






    
    
    
    
    

    
    
      //$pdf->Cell(130 , 5, 'test company Co.', 0, 0);
      //$pdf->Cell(59  , 5, 'INVOICE', 0, 1); // end of line      
  } 

  $pdf->Output();
//==========================================  


////$pdf = new FPDF('p', 'mm', 'A4');
//$pdf = new FPDF('p', 'mm', 'A4');
//$pdf->AddPage();
//
//// set font to Arial, Bold 14pt
//$pdf->SetFont('Arial', 'B', 14);
//
//
//
//$pdf->Cell(130 , 5, 'test company Co.', 0, 0);
//$pdf->Cell(59  , 5, 'INVOICE', 0, 1); // end of line
//
//
//
//
//while (($data = fgetcsv($file)) !== FALSE) {
////       1      2       3     4         5       6
////Cell(width, height, text, border, end line, [align])       
//                        //-------------For border 0=No bordr 1=border  
//                        //-------------For end line 0=continue 1=newline
//                        //-------------align is opotional L-left, C-center, R-right
////          1    2            3            4  5
////$pdf->Cell(130 , 5, 'test company Co.', 0, 0);
////$pdf->Cell(59  , 5, 'INVOICE', 0, 1); // end of line
//
//
////echo "prod   : " . $data[1]."<br>";
//$pdf->Cell(130 , 5, $data[1], 0, 0);
//
//$pdf->Output(); // we need to  call output method to generate the PDF.
////Close();
//
//
//}
//




?>
