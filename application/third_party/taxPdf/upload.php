<?php
$choice="";
if (   isset($_POST['IGSTBTN'])   ) 
{
//echo "You Select IGST";
    $choice="IGST";
    do_IGST();
}
elseif (isset($_POST['CGSTBTN'])) {
//echo "You Select CGST";
    $choice="CGST";
    do_CGST();
}
elseif (isset($_POST['NRMLBTN'])) {
//echo "You Select CGST";
    $choice="NOTAX";
    do_NOGST();
}

function do_NOGST(){
    // print_r($_POST);
    if (isset($_FILES['file3'])) {
        $file = $_FILES['file3'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Wokout the File Extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('csv');
        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) { 
                    // 2MB
                    //$file_name_new = uniqid('', true) . '.' . $file_ext;
                    //$name='myfile_'.date('m-d-Y_hia').'.txt';
                    //$file_name_new = date('d-m-Y_h_i_a') . '.' . $file_ext;
                    $file_name_new = "IGST_" . date('d_m_Y') . '.' . $file_ext;
                    $file_name_new = trim($file_name_new);
                    //echo $file_name_new;
                    //exit();

                    $file_destination = 'uploads/' . $file_name_new;

                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        //echo "<h4>File Successfully save here--> " . $file_destination . "</h4>";
                        //include 'main.php';
                        //return;

                        //###################################################################################################    
                        //###################################################################################################    
                        //###################################################################################################    
                        //read this csv and show pdf
                      
                        require ("fpdf181/fpdf.php");
                        //$file = fopen("gst.csv","r");
                        $file = fopen($file_destination,"r");
                        //=========================================
                        $pdf = new FPDF();
                        $pdf->AliasNbPages();
                        $pdf->SetFont('Arial','B',16);

                        while (($data = fgetcsv($file)) !== FALSE){       
                            $pdf->AddPage();// Logo
                            $pdf->Image('gharnew.png',10,6,30); //upper corner and its width, The height is calculated automatically 
                            // Arial bold 15
                            $pdf->SetFont('Arial','B',15);
                            // Move to the right
                            $pdf->Cell(80);
                            // Title
                            //$pdf->SetX($pdf->lMargin);
                            $pdf->SetTextColor(220,50,50); //red
                            $pdf->SetTextColor(91,137,42); //green

                            $pdf->Cell( 0, 10, 'INVOICE'.$data[0], 0, 0, 'R' );     // $data[0]=111
                            //echo "prod   : " . $data[1]."<br>";
                            //=========================================================================================================
                            //=========================================================================================================
                            // Line break
                            $pdf->Ln(10);

                            $pdf->SetFont('Arial','B',10);
                            $pdf->SetTextColor(99,0,0); //deep pink
                            $pdf->setTextColor(0, 120, 120); //skyblue
                            $pdf->SetTextColor(0,0,255); // blue
                            $pdf->SetTextColor(11, 47, 132);// blueother
                            $pdf->SetTextColor(0, 0, 0);// BLACK

                            //$pdf->Cell( 0, 10, 'Date August 31, 2017', 0, 0, 0 );
                            //$pdf->Cell( 0, 10, $data[10], 0, 0, 0 );
                            $pdf->SetXY(169, 20); //column,row
                            $csv_date=$data[10];
                            //echo date('M, d, Y'); 
                            $pdf->Write(0, 'Date : '.$csv_date); //Date

                            $pdf->Ln(10);
                            $pdf->SetTextColor(91,137,42); // green
                            $pdf->Cell( 0, 10, '________________________________________________________________________________________________________________________', 0, 0, 'L' );
                            // Line break
                            $pdf->Ln(10); 
                            $pdf->SetFont('Arial','B',11);
                            $pdf->SetTextColor(91,137,42);

                            $pdf->SetFont('Arial','BI',12);    
                            $pdf->SetXY(13, 45); //column,row
                            $pdf->Write(0, "DIETGHAR.COM");
                            //-STATIC PART

                            $static1 = "A-75, TDS CITY, LONI GHAZIABAD";
                            $static2 = "Ghaziabad, Uttar Pradesh(UP - 09), PIN Code 201102, India";
                            $static3 = "7838249321";
                            $static4 = "support@dietghar.com";
                            $static5 = "http://www.dietghar.com";
                            // $static6 = "GSTIN: 09AAJPK3610R1Z9";
                            $static6 = "";

                            $pdf->SetFont('Arial','B',9); 
                            $pdf->SetXY(14, 49); //column,row
                            //$pdf->Image('icons8-home-50.png',10,10,30); //upper corner and its width(30), The height is calculated automatically 
                            //$pdf->Image('icons8-home-50.png',49,10,2); //49=row , upper corner and its width(30), 
                            //The height is calculated automatically 
                            //$pdf->SetXY(14, 49); //column,row
                            //$pdf->Image('icons8-home-50.png',10,47,4); //47=row , upper corner and its width(30), The height is calculated automatically 
                            $pdf->Write(0, $static1);



                            $pdf->SetXY(14, 53); //column,row
                            $pdf->Write(0, $static2);

                            $pdf->SetXY(14, 57); //column,row
                            //$pdf->SetXY(14, 57); //column,row
                            //$pdf->Image('icons8-phone-26.png',10,55,4); //57=row , upper corner and its width(30), alculated automatically 
                            $pdf->Write(0, "Phone : ".$static3);


                            $pdf->SetXY(14, 61); //column,row
                            $pdf->Write(0, $static4);


                            $pdf->SetXY(14, 65); //column,row
                            $pdf->Write(0, $static5);


                            $pdf->SetXY(14, 69); //column,row
                            $pdf->Write(0, $static6);

                            //-----------------------

                            $pdf->SetFont('Arial','BI',12); 
                            $pdf->SetXY(110, 45); //column,row
                            $pdf->Write(0, "Bill to:");

                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','',8);  

                            $pdf->SetXY(110, 50); //column,row
                            $pdf->Write(0, $data[5]); //bill1

                            $pdf->SetXY(110, 54); //column,row
                            $pdf->Write(0, $data[6]); ////bill2

                            $pdf->SetXY(110, 58); //column,row
                            $pdf->Write(0, $data[7]); //bill3

                            $pdf->SetXY(110, 62); //column,row
                            $pdf->Write(0, $data[8]); //bill4

                            $pdf->SetXY(110, 66); //column,row
                            $pdf->Write(0, $data[9]); //bill4

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
                            $pdf->Write(0, "S. NO");

                            $pdf->SetXY(30, 76); //column,row
                            $pdf->Write(0, "PRODUCT/SERVICE NAME");

                            $pdf->SetXY(80, 76); //column,row
                            $pdf->Write(0, "HSN/SAC");

                            $pdf->SetXY(110, 76); //column,row
                            $pdf->Write(0, "QTY");

                            $pdf->SetXY(130, 76); //column,row
                            $pdf->Write(0, "UNIT PRICE");

                            // $pdf->SetXY(160, 76); //column,row
                            // $pdf->Write(0, "IGST");

                            $pdf->SetXY(180, 76); //column,row
                            $pdf->Write(0, "AMOUNT");

                            $pdf->SetXY(10, 80); //column,row
                            $pdf->Write(0, "______________________________________________________________________________________________________________________");

                            //================================================================================================= 
                            //================================================================================================= 

                            // Line break
                            $pdf->Ln(2); 
                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','B',8);  
                            $pdf->SetXY(10, 85); //column,row
                            $pdf->Write(0, $data[1]); //SERIAL NUMBER

                            $pdf->SetXY(30, 85); //column,row
                            $pdf->Write(0, $data[2]);//PRODUCT 7 SERVICES

                            $pdf->SetXY(110, 85); //column,row
                            $pdf->Write(0, $data[3]);  //QUANTITY

                            $pdf->SetXY(135, 85); //column,row
                            //$pdf->Write(0, ($data[6]-($data[6]*18)/118));  // UNIT-PRICE----------------- unit_price AMOUNT-CALC GST
                            $pdf->Write(0, number_format((float)($data[4]), 2, '.', ''));  //unit_price AMOUNT-CALC GST
                            
                            
                            // $pdf->SetXY(160, 85); //column,row
                            // $pdf->Write(0, round((($data[4]*18)/118),2));//G S T
                            #----------- gstgst CALCULATED FROM AMOUNT
                            // $pdf->SetXY(160, 88); //RATE PERCENTAGE
                            // $pdf->Write(0, "18.00%");
 

                            $pdf->SetXY(182, 85);      //column,row
                            //$pdf->Write(0, $data[6]);  // AMOUNT WHICH IS THERE IN CSV
                            $pdf->Write(0, number_format((float)$data[4], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

                            //$foo = "105";
                            //echo number_format((float)$foo, 2, '.', '');  // Outputs -> 105.00

                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','',7);  

                            // Line break
                            $pdf->Ln(5);  //big gap

                            $pdf->SetFont('Arial','B',8);  
                            $pdf->SetTextColor(91,137,42);
                            $pdf->SetXY(10, 170); //column,row
                            $pdf->Write(0, "______________________________________________________________________________________________________________________");

                            $pdf->SetXY(60, 176); //column,row
                            $pdf->Write(0, "TOTAL");

                            $pdf->SetXY(110, 176); //column,row
                            //$pdf->Write(0, "1.00");
                            $pdf->Write(0, $data[3]);  //qty

                            $pdf->SetXY(135, 176); //column,row
                            //$pdf->Write(0, "2542.00");
                            $pdf->Write(0, number_format((float)($data[4]), 2, '.', ''));  //unit_price AMOUNT-CALC GST

                            // $pdf->SetXY(160, 176); //column,row
                            // //$pdf->Write(0, "457.56");
                            // $pdf->Write(0, round((($data[4]*18)/118),2));  //gst CALCULATED FROM AMOUNT

                            $pdf->SetXY(184, 176); //column,row
                            //$pdf->Write(0, "2999.56");
                            $pdf->Write(0, number_format((float)$data[4], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

                            $pdf->SetXY(10, 180); //column,row
                            $pdf->Write(0, "______________________________________________________________________________________________________________________");

                            //================================================================================================
                            //================================================================================================

                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','B',8);    
                            $pdf->SetXY(10, 185); //column,row
                            //$pdf->Write(0, "Total Rs. Two Thousand Nine Hundred Ninety Nine and Fifty Six Paise only.");
                            //$pdf->Write(0, $data[12]);
                            $number=$data[4];
                            $pdf->Write(0, "Rupees ".convert_number_to_words($number)." only.");
                            //$pdf->Write(0, $number);
                            //$pdf->Write(0, $string);
                            //echo convert_number_to_words(2999.56);
                            ////$data[11]// amt_in_word
                            $pdf->SetTextColor(91,137,42); //green
                            $pdf->SetFont('Arial','B',7);    

                            $pdf->SetXY(10, 192); //column,row
                            $pdf->Write(0, "AUTHORISED SIGNATORY");      

                            $pdf->SetTextColor(91,137,42); //green
                            $pdf->SetFont('Arial','B',8);    
                            //$pdf->SetFont('Arial', '', 12);
                            // $pdf->SetXY(125, 185); //column,row
                            // $pdf->Write(0, "TOTAL BEFORE TAX");

                            // $pdf->SetXY(125, 189); //column,row
                            // $pdf->Write(0, "TOTAL TAX AMOUNT");        

                            $pdf->SetXY(125, 193); //column,row
                            $pdf->Write(0, "TOTAL AMOUNT");      

                            $pdf->SetXY(125, 197); //column,row
                            $pdf->Write(0, "AMOUNT RECEIVED");      

                            $pdf->SetXY(125, 201); //column,row
                            $pdf->Write(0, "AMOUNT DUE");      
                            //================
                            //$tbt = $pdf->Write(0, round(  ($data[6]-($data[6]*18)/118),2  ) );  //unit_price AMOUNT-CALC GST2542.00; // "TOTAL BEFORE TAX"
                            //$tta = $pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT; // "TOTAL TAX AMOUNT"
                            //$ta  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //2999.56; // "TOTAL AMOUNT"
                            //$ar  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //2999.56; // "AMOUNT RECEIVED"
                            //$ad  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //   0.00; // "AMOUNT DUE"

                            $pdf->SetXY(184, 185); //column,row
                            //$pdf->Write(0, $tbt);


                            //$pdf->Write(0, number_format((float)($data[6]-($data[6]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST
                            //TOTAL BEFORE TAX Figure;  
                            //$pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST
                            //$nero =(   ($data[4]-($data[4])*18)  );
                            //$deno = 118;
                            //$ndresult=($nero/$deno);
                            //$pdf->SetXY(125, 206); //column,row
                            //$pdf->Write(0, $nero);
                            //$pdf->Write(50, $deno);
                            //$pdf->Write(70, $ndresult);

                            //$pdf->Write(0, round( ( ($data[4]-$data[4])*18 ) / 118), 2));  //unit_price AMOUNT-CALC GST

                            //TOTAL BEFORE TAX Figure;  
                            //$pdf->SetXY(184, 185); //column,row
                            /////////////////$TBT = $pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

                            //TOTAL BEFORE TAX
 

                            // //TOTAL TAX AMOUNT
        

                            //TOTAL AMOUNT
                            $ZTTA    = $data[4];
                            $ZTTA   = number_format((float)$ZTTA, 2, '.', '');
                            $pdf->SetXY(184, 193); //column,row
                            $pdf->Write(0, $ZTTA);        


                            //AMOUNT RECEIVED
                            $pdf->SetXY(181, 197); //column,row
                            $pdf->Write(0, "(-)".$ZTTA);        


                            //AMOUNT DUE Figure
                            $pdf->SetXY(188.5, 200); //column,row
                            $pdf->Write(0, "0.00");  

                            // Line break
                            $pdf->Ln(20);
                            //$pdf->Cell(130 , 5, 'test company Co.', 0, 0);
                            //$pdf->Cell(59  , 5, 'INVOICE', 0, 1); // end of line      
                        } 

                        $pdf->Output();
                        //=====================================OUTPUT===============================        
                    }
                }
            }
        }
    }
} // no gst func ends ::
function do_IGST() {
    //echo "Inside do_IGST";
    //exit();

    if (isset($_FILES['file1'])) {
        $file = $_FILES['file1'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Wokout the File Extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('csv');
        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) { 
                    // 2MB
                    //$file_name_new = uniqid('', true) . '.' . $file_ext;
                    //$name='myfile_'.date('m-d-Y_hia').'.txt';
                    //$file_name_new = date('d-m-Y_h_i_a') . '.' . $file_ext;
                    $file_name_new = "IGST_" . date('d_m_Y') . '.' . $file_ext;
                    $file_name_new = trim($file_name_new);
                    //echo $file_name_new;
                    //exit();

                    $file_destination = 'uploads/' . $file_name_new;

                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        //echo "<h4>File Successfully save here--> " . $file_destination . "</h4>";
                        //include 'main.php';
                        //return;

                        //###################################################################################################    
                        //###################################################################################################    
                        //###################################################################################################    
                        //read this csv and show pdf

                        require ("fpdf181/fpdf.php");
                        //$file = fopen("gst.csv","r");
                        $file = fopen($file_destination,"r");
                        //=========================================
                        $pdf = new FPDF();
                        $pdf->AliasNbPages();
                        $pdf->SetFont('Arial','B',16);

                        while (($data = fgetcsv($file)) !== FALSE){       
                            $pdf->AddPage();// Logo
                            $pdf->Image('gharnew.png',10,6,30); //upper corner and its width, The height is calculated automatically 
                            // Arial bold 15
                            $pdf->SetFont('Arial','B',15);
                            // Move to the right
                            $pdf->Cell(80);
                            // Title
                            //$pdf->SetX($pdf->lMargin);
                            $pdf->SetTextColor(220,50,50); //red
                            $pdf->SetTextColor(91,137,42); //green

                            $pdf->Cell( 0, 10, 'INVOICE'.$data[0], 0, 0, 'R' );     // $data[0]=111
                            //echo "prod   : " . $data[1]."<br>";
                            //=========================================================================================================
                            //=========================================================================================================
                            // Line break
                            $pdf->Ln(10);

                            $pdf->SetFont('Arial','B',10);
                            $pdf->SetTextColor(99,0,0); //deep pink
                            $pdf->setTextColor(0, 120, 120); //skyblue
                            $pdf->SetTextColor(0,0,255); // blue
                            $pdf->SetTextColor(11, 47, 132);// blueother
                            $pdf->SetTextColor(0, 0, 0);// BLACK

                            //$pdf->Cell( 0, 10, 'Date August 31, 2017', 0, 0, 0 );
                            //$pdf->Cell( 0, 10, $data[10], 0, 0, 0 );
                            $pdf->SetXY(169, 20); //column,row
                            $csv_date=$data[10];
                            //echo date('M, d, Y'); 
                            $pdf->Write(0, 'Date : '.$csv_date); //Date

                            $pdf->Ln(10);
                            $pdf->SetTextColor(91,137,42); // green
                            $pdf->Cell( 0, 10, '________________________________________________________________________________________________________________________', 0, 0, 'L' );
                            // Line break
                            $pdf->Ln(10); 
                            $pdf->SetFont('Arial','B',11);
                            $pdf->SetTextColor(91,137,42);

                            $pdf->SetFont('Arial','BI',12);    
                            $pdf->SetXY(13, 45); //column,row
                            $pdf->Write(0, "DIETGHAR.COM");
                            //-STATIC PART

                            $static1 = "A-75, TDS CITY, LONI GHAZIABAD";
                            $static2 = "Ghaziabad, Uttar Pradesh(UP - 09), PIN Code 201102, India";
                            $static3 = "7838249321";
                            $static4 = "support@dietghar.com";
                            $static5 = "http://www.dietghar.com";
                            $static6 = "GSTIN: 09AAJPK3610R1Z9";

                            $pdf->SetFont('Arial','B',9); 
                            $pdf->SetXY(14, 49); //column,row
                            //$pdf->Image('icons8-home-50.png',10,10,30); //upper corner and its width(30), The height is calculated automatically 
                            //$pdf->Image('icons8-home-50.png',49,10,2); //49=row , upper corner and its width(30), 
                            //The height is calculated automatically 
                            //$pdf->SetXY(14, 49); //column,row
                            //$pdf->Image('icons8-home-50.png',10,47,4); //47=row , upper corner and its width(30), The height is calculated automatically 
                            $pdf->Write(0, $static1);



                            $pdf->SetXY(14, 53); //column,row
                            $pdf->Write(0, $static2);

                            $pdf->SetXY(14, 57); //column,row
                            //$pdf->SetXY(14, 57); //column,row
                            //$pdf->Image('icons8-phone-26.png',10,55,4); //57=row , upper corner and its width(30), alculated automatically 
                            $pdf->Write(0, "Phone : ".$static3);


                            $pdf->SetXY(14, 61); //column,row
                            $pdf->Write(0, $static4);


                            $pdf->SetXY(14, 65); //column,row
                            $pdf->Write(0, $static5);


                            $pdf->SetXY(14, 69); //column,row
                            $pdf->Write(0, $static6);

                            //-----------------------

                            $pdf->SetFont('Arial','BI',12); 
                            $pdf->SetXY(110, 45); //column,row
                            $pdf->Write(0, "Bill to:");

                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','',8);  

                            $pdf->SetXY(110, 50); //column,row
                            $pdf->Write(0, $data[5]); //bill1

                            $pdf->SetXY(110, 54); //column,row
                            $pdf->Write(0, $data[6]); ////bill2

                            $pdf->SetXY(110, 58); //column,row
                            $pdf->Write(0, $data[7]); //bill3

                            $pdf->SetXY(110, 62); //column,row
                            $pdf->Write(0, $data[8]); //bill4

                            $pdf->SetXY(110, 66); //column,row
                            $pdf->Write(0, $data[9]); //bill4

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
                            $pdf->Write(0, "S. NO");

                            $pdf->SetXY(30, 76); //column,row
                            $pdf->Write(0, "PRODUCT/SERVICE NAME");

                            $pdf->SetXY(80, 76); //column,row
                            $pdf->Write(0, "HSN/SAC");

                            $pdf->SetXY(110, 76); //column,row
                            $pdf->Write(0, "QTY");

                            $pdf->SetXY(130, 76); //column,row
                            $pdf->Write(0, "UNIT PRICE");

                            $pdf->SetXY(160, 76); //column,row
                            $pdf->Write(0, "IGST");

                            $pdf->SetXY(180, 76); //column,row
                            $pdf->Write(0, "AMOUNT");

                            $pdf->SetXY(10, 80); //column,row
                            $pdf->Write(0, "______________________________________________________________________________________________________________________");

                            //================================================================================================= 
                            //================================================================================================= 

                            // Line break
                            $pdf->Ln(2); 
                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','B',8);  
                            $pdf->SetXY(10, 85); //column,row
                            $pdf->Write(0, $data[1]); //SERIAL NUMBER

                            $pdf->SetXY(30, 85); //column,row
                            $pdf->Write(0, $data[2]);//PRODUCT 7 SERVICES

                            $pdf->SetXY(110, 85); //column,row
                            $pdf->Write(0, $data[3]);  //QUANTITY

                            $pdf->SetXY(160, 85); //column,row
                            $pdf->Write(0, round((($data[4]*18)/118),2));  //G S T     ----------- gstgst CALCULATED FROM AMOUNT
                            //round(520.34345,2)
                            //$pdf->Write(0,            (      round(   ($data[4]*18)/118) ),2        );  //gst CALCULATED FROM AMOUNT

                            $pdf->SetXY(135, 85); //column,row
                            //$pdf->Write(0, ($data[6]-($data[6]*18)/118));  // UNIT-PRICE----------------- unit_price AMOUNT-CALC GST
                            $pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

                            $pdf->SetXY(182, 85);      //column,row
                            //$pdf->Write(0, $data[6]);  // AMOUNT WHICH IS THERE IN CSV
                            $pdf->Write(0, number_format((float)$data[4], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

                            //$foo = "105";
                            //echo number_format((float)$foo, 2, '.', '');  // Outputs -> 105.00

                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','',7);  
                            $pdf->SetXY(160, 88); //RATE PERCENTAGE
                            $pdf->Write(0, "18.00%");

                            // Line break
                            $pdf->Ln(5);  //big gap

                            $pdf->SetFont('Arial','B',8);  
                            $pdf->SetTextColor(91,137,42);
                            $pdf->SetXY(10, 170); //column,row
                            $pdf->Write(0, "______________________________________________________________________________________________________________________");

                            $pdf->SetXY(60, 176); //column,row
                            $pdf->Write(0, "TOTAL");

                            $pdf->SetXY(110, 176); //column,row
                            //$pdf->Write(0, "1.00");
                            $pdf->Write(0, $data[3]);  //qty

                            $pdf->SetXY(135, 176); //column,row
                            //$pdf->Write(0, "2542.00");
                            $pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

                            $pdf->SetXY(160, 176); //column,row
                            //$pdf->Write(0, "457.56");
                            $pdf->Write(0, round((($data[4]*18)/118),2));  //gst CALCULATED FROM AMOUNT

                            $pdf->SetXY(184, 176); //column,row
                            //$pdf->Write(0, "2999.56");
                            $pdf->Write(0, number_format((float)$data[4], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

                            $pdf->SetXY(10, 180); //column,row
                            $pdf->Write(0, "______________________________________________________________________________________________________________________");

                            //================================================================================================
                            //================================================================================================

                            $pdf->SetTextColor(0, 0, 0); // black color
                            $pdf->SetFont('Arial','B',8);    
                            $pdf->SetXY(10, 185); //column,row
                            //$pdf->Write(0, "Total Rs. Two Thousand Nine Hundred Ninety Nine and Fifty Six Paise only.");
                            //$pdf->Write(0, $data[12]);
                            $number=$data[4];
                            $pdf->Write(0, "Rupees ".convert_number_to_words($number)." only.");
                            //$pdf->Write(0, $number);
                            //$pdf->Write(0, $string);
                            //echo convert_number_to_words(2999.56);
                            ////$data[11]// amt_in_word
                            $pdf->SetTextColor(91,137,42); //green
                            $pdf->SetFont('Arial','B',7);    

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
                            //$tbt = $pdf->Write(0, round(  ($data[6]-($data[6]*18)/118),2  ) );  //unit_price AMOUNT-CALC GST2542.00; // "TOTAL BEFORE TAX"
                            //$tta = $pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT; // "TOTAL TAX AMOUNT"
                            //$ta  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //2999.56; // "TOTAL AMOUNT"
                            //$ar  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //2999.56; // "AMOUNT RECEIVED"
                            //$ad  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //   0.00; // "AMOUNT DUE"

                            $pdf->SetXY(184, 185); //column,row
                            //$pdf->Write(0, $tbt);


                            //$pdf->Write(0, number_format((float)($data[6]-($data[6]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST
                            //TOTAL BEFORE TAX Figure;  
                            //$pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST
                            //$nero =(   ($data[4]-($data[4])*18)  );
                            //$deno = 118;
                            //$ndresult=($nero/$deno);
                            //$pdf->SetXY(125, 206); //column,row
                            //$pdf->Write(0, $nero);
                            //$pdf->Write(50, $deno);
                            //$pdf->Write(70, $ndresult);

                            //$pdf->Write(0, round( ( ($data[4]-$data[4])*18 ) / 118), 2));  //unit_price AMOUNT-CALC GST

                            //TOTAL BEFORE TAX Figure;  
                            //$pdf->SetXY(184, 185); //column,row
                            /////////////////$TBT = $pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

                            //TOTAL BEFORE TAX
                            $ZSTT    = ($data[4] * (18/118)   );
                            $ZCSVAMT = $data[4];
                            $ZTBT   = ($ZCSVAMT-$ZSTT);
                            $ZTBT   = number_format((float)$ZTBT, 2, '.', '');
                            $pdf->SetXY(184, 185); //column,row
                            $pdf->Write(0, $ZTBT);        


                            //TOTAL TAX AMOUNT
                            $ZTTA    = ($data[4] * (18/118)   );
                            $ZTTA   = number_format((float)$ZTTA, 2, '.', '');
                            $pdf->SetXY(185.5, 189); //column,row
                            $pdf->Write(0, $ZTTA);        

                            //TOTAL AMOUNT
                            $ZTTA    = $data[4];
                            $ZTTA   = number_format((float)$ZTTA, 2, '.', '');
                            $pdf->SetXY(184, 193); //column,row
                            $pdf->Write(0, $ZTTA);        


                            //AMOUNT RECEIVED
                            $pdf->SetXY(181, 197); //column,row
                            $pdf->Write(0, "(-)".$ZTTA);        


                            //AMOUNT DUE Figure
                            $pdf->SetXY(188.5, 200); //column,row
                            $pdf->Write(0, "0.00");  

                            // Line break
                            $pdf->Ln(20);
                            //$pdf->Cell(130 , 5, 'test company Co.', 0, 0);
                            //$pdf->Cell(59  , 5, 'INVOICE', 0, 1); // end of line      
                        } 

                        $pdf->Output();
                        //=====================================OUTPUT===============================        
                    }
                }
            }
        }
    }

}
//function end igst
##############################################################################################       


function do_CGST() {
    //echo "Inside do_CGST";
    //exit();
    //if (isset($_FILES['file2'])) {
    //    //echo "it is set";
    //}
    //else{
    //echo "NOT it is set";
    //}
    //exit();
        if (isset($_FILES['file2'])) {
            $file = $_FILES['file2'];
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];

    // Wokout the File Extension
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));

            $allowed = array('csv');

            if (in_array($file_ext, $allowed)) {
                if ($file_error === 0) {
    if ($file_size <= 2097152) { // 2MB
    //$file_name_new = uniqid('', true) . '.' . $file_ext;
    //$name='myfile_'.date('m-d-Y_hia').'.txt';
    //$file_name_new = date('d-m-Y_h_i_a') . '.' . $file_ext;
        $file_name_new = "CGST_" . date('d_m_Y') . '.' . $file_ext;
        $file_name_new = trim($file_name_new);
    //echo $file_name_new;
    //exit();

        $file_destination = 'uploads/' . $file_name_new;

        if (move_uploaded_file($file_tmp, $file_destination)) {
    //echo "<h4>File Successfully save here--> " . $file_destination . "</h4>";
    //include 'main.php';
    //return;

    //###################################################################################################    
    //###################################################################################################    
    //###################################################################################################    
    //read this csv and show pdf

            require ("fpdf181/fpdf.php");
    //$file = fopen("gst.csv","r");
            $file = fopen($file_destination,"r");
    //=========================================
            $pdf = new FPDF();
            $pdf->AliasNbPages();
            $pdf->SetFont('Arial','B',16);

            while (($data = fgetcsv($file)) !== FALSE){       

    //    // Logo
    //$pdf->SetTextColor(91,137,42);      
    //
    //$pdf->SetFont('Arial','B',15);
    //$pdf->SetXY(167, 14); //column,row
    //$pdf->Write(0, "INVOICE".$data[0]);  
    //
    //
    ////$pdf->SetXY(30, 76); //column,row
    ////$pdf->Write(0, "PRODUCT/SERVICE NAME");
    //
    //$pdf->SetFont('Arial','B',35);
    //$pdf->SetXY(14, 17); //column,row
    //$pdf->Write(0, "DG");      
    //$pdf->SetFont('Arial','B',20);    
    //$pdf->SetXY(32, 18); //column,row
    //$pdf->Write(0, ".");      
    //$pdf->SetXY(34, 18); //column,row
    //$pdf->Write(0, "com");      
    //
    //
    //      
    //      
    //      
    //    //$pdf->Image('gharnew.png',10,6,30); //upper corner and its width, The height is calculated automatically 
    //    // Arial bold 15
    //    $pdf->SetFont('Arial','B',15);
    //    // Move to the right
    //$pdf->AddPage();

                $pdf->AddPage();

    // Logo
    $pdf->Image('gharnew.png',10,6,30); //upper corner and its width, The height is calculated automatically 
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Move to the right
    $pdf->Cell(80);
    // Title
    //$pdf->SetX($pdf->lMargin);
    $pdf->SetTextColor(220,50,50); //red
    $pdf->SetTextColor(91,137,42); //green

    $pdf->Cell( 0, 10, 'INVOICE'.$data[0], 0, 0, 'R' );     // $data[0]=111

    //$pdf->Cell( 0, 10, 'INVOICE'.$data[0], 0, 0, 'R' );     // $data[0]=111
    //echo "prod   : " . $data[1]."<br>";
    //=========================================================================================================
    //=========================================================================================================
    // Line break
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(99,0,0); //deep pink
    $pdf->setTextColor(0, 120, 120); //skyblue
    $pdf->SetTextColor(0,0,255); // blue
    $pdf->SetTextColor(11, 47, 132);// blueother
    $pdf->SetTextColor(0, 0, 0);// BLACK

    //$pdf->Cell( 0, 10, 'Date August 31, 2017', 0, 0, 0 );
    //$pdf->Cell( 0, 10, $data[10], 0, 0, 0 );
    //$pdf->SetXY(176, 20); //column,row
    //$csv_date=$data[10];
    //echo date('M, d, Y'); 
    //$pdf->Write(0, 'Date '.$csv_date); //Date


    $pdf->SetXY(169, 20); //column,row
    $csv_date=$data[10];
    //echo date('M, d, Y'); 
    $pdf->Write(0, 'Date : '.$csv_date); //Date



    $pdf->Ln(10);
    $pdf->SetTextColor(91,137,42); // green
    $pdf->Cell( 0, 10, '________________________________________________________________________________________________________________________', 0, 0, 'L' );

    // Line break
    $pdf->Ln(10); 
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(91,137,42);

    $pdf->SetFont('Arial','BI',12);    
    $pdf->SetXY(13, 45); //column,row
    $pdf->Write(0, "DIETGHAR.COM");
    //-STATIC PART

    $static1 = "A-75, TDS CITY, LONI GHAZIABAD";
    $static2 = "Ghaziabad, Uttar Pradesh(UP - 09), PIN Code 201102, India";
    $static3 = "7838249321";
    $static4 = "support@dietghar.com";
    $static5 = "http://www.dietghar.com";
    $static6 = "GSTIN: 09AAJPK3610R1Z9";

    $pdf->SetFont('Arial','B',9); 
    $pdf->SetXY(14, 49); //column,row
    //$pdf->Image('icons8-home-50.png',10,10,30); //upper corner and its width(30), The height is calculated automatically 
    //$pdf->Image('icons8-home-50.png',49,10,2); //49=row , upper corner and its width(30), 
    //The height is calculated automatically 
    //$pdf->SetXY(14, 49); //column,row
    //$pdf->Image('icons8-home-50.png',10,47,4); //47=row , upper corner and its width(30), The height is calculated automatically 
    $pdf->Write(0, $static1);



    $pdf->SetXY(14, 53); //column,row
    $pdf->Write(0, $static2);





    $pdf->SetXY(14, 57); //column,row
    //$pdf->SetXY(14, 57); //column,row
    //$pdf->Image('icons8-phone-26.png',10,55,4); //57=row , upper corner and its width(30), alculated automatically 
    $pdf->Write(0, "Phone : ".$static3);






    $pdf->SetXY(14, 61); //column,row
    $pdf->Write(0, $static4);





    $pdf->SetXY(14, 65); //column,row
    $pdf->Write(0, $static5);






    $pdf->SetXY(14, 69); //column,row
    $pdf->Write(0, $static6);



    //-----------------------


    $pdf->SetFont('Arial','BI',12); 
    $pdf->SetXY(110, 45); //column,row
    $pdf->Write(0, "Bill to:");

    $pdf->SetTextColor(0, 0, 0); // black color
    $pdf->SetFont('Arial','',8);  

    $pdf->SetXY(110, 50); //column,row
    $pdf->Write(0, $data[5]); //bill1

    $pdf->SetXY(110, 54); //column,row
    $pdf->Write(0, $data[6]); ////bill2

    $pdf->SetXY(110, 58); //column,row
    $pdf->Write(0, $data[7]); //bill3

    $pdf->SetXY(110, 62); //column,row
    $pdf->Write(0, $data[8]); //bill4

    $pdf->SetXY(110, 66); //column,row
    $pdf->Write(0, $data[9]); //bill4

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
    $pdf->Write(0, "S. NO");

    $pdf->SetXY(30, 76); //column,row
    $pdf->Write(0, "PRODUCT/SERVICE NAME");

    $pdf->SetXY(80, 76); //column,row
    $pdf->Write(0, "HSN/SAC");

    $pdf->SetXY(105, 76); //column,row
    $pdf->Write(0, "QTY");

    $pdf->SetXY(125, 76); //column,row
    $pdf->Write(0, "UNIT PRICE");

    $pdf->SetXY(148, 76); //column,row
    $pdf->Write(0, "CGST");

    $pdf->SetXY(165, 76); //column,row
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
    $pdf->Write(0, $data[1]); //SERIAL NUMBER

    $pdf->SetXY(30, 85); //column,row
    $pdf->Write(0, $data[2]);//PRODUCT 7 SERVICES

    $pdf->SetXY(105, 85); //column,row
    $pdf->Write(0, $data[3]);  //QUANTITY

    $pdf->SetXY(150, 85); //column,row
    $pdf->Write(0, round((($data[4]*18)/118)/2,2));  //C G S T     ----------- gstgst CALCULATED FROM AMOUNT

    $pdf->SetXY(165, 85); //column,row
    $pdf->Write(0, round((($data[4]*18)/118)/2,2));  //S G S T     ----------- gstgst CALCULATED FROM AMOUNT




    //round(520.34345,2)
    //$pdf->Write(0,            (      round(   ($data[4]*18)/118) ),2        );  //gst CALCULATED FROM AMOUNT

    $pdf->SetXY(126, 85); //column,row
    //$pdf->Write(0, ($data[6]-($data[6]*18)/118));  // UNIT-PRICE----------------- unit_price AMOUNT-CALC GST
    $pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

    $pdf->SetXY(182, 85);      //column,row
    //$pdf->Write(0, $data[6]);  // AMOUNT WHICH IS THERE IN CSV
    $pdf->Write(0, number_format((float)$data[4], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

    //$foo = "105";
    //echo number_format((float)$foo, 2, '.', '');  // Outputs -> 105.00

    $pdf->SetTextColor(0, 0, 0); // black color
    $pdf->SetFont('Arial','',7);  

    $pdf->SetXY(150, 88); //RATE PERCENTAGE
    $pdf->Write(0, "9.00%");

    $pdf->SetXY(165, 88); //RATE PERCENTAGE
    $pdf->Write(0, "9.00%");


    // Line break
    $pdf->Ln(5);  //big gap

    $pdf->SetFont('Arial','B',8);  
    $pdf->SetTextColor(91,137,42);
    $pdf->SetXY(10, 170); //column,row
    $pdf->Write(0, "______________________________________________________________________________________________________________________");

    $pdf->SetXY(60, 176); //column,row
    $pdf->Write(0, "TOTAL");

    $pdf->SetXY(105, 176); //column,row
    //$pdf->Write(0, "1.00");
    $pdf->Write(0, $data[3]);  //qty

    $pdf->SetXY(126, 176); //column,row
    //$pdf->Write(0, "2542.00");
    $pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST

    $pdf->SetXY(150, 176); //column,row
    //$pdf->Write(0, "457.56");
    $pdf->Write(0, round((($data[4]*18)/118)/2,2));  //gst CALCULATED FROM AMOUNT

    $pdf->SetXY(165, 176); //column,row
    //$pdf->Write(0, "457.56");
    $pdf->Write(0, round((($data[4]*18)/118)/2,2));  //gst CALCULATED FROM AMOUNT


    $pdf->SetXY(184, 176); //column,row
    //$pdf->Write(0, "2999.56");
    $pdf->Write(0, number_format((float)$data[4], 2, '.', ''));  // AMOUNT WHICH IS THERE IN CSV

    $pdf->SetXY(10, 180); //column,row
    $pdf->Write(0, "______________________________________________________________________________________________________________________");

    //=====================================================================================================
    //=====================================================================================================

    $pdf->SetTextColor(0, 0, 0); // black color
    $pdf->SetFont('Arial','B',8);    
    $pdf->SetXY(10, 185); //column,row
    //$pdf->Write(0, "Total Rs. Two Thousand Nine Hundred Ninety Nine and Fifty Six Paise only.");
    //$pdf->Write(0, $data[12]);
    $number=$data[4];
    //$pdf->Write(0, convert_number_to_words($number)." only.");
    $pdf->Write(0, "Rupees ".convert_number_to_words($number)." only.");
    //$pdf->Write(0, $number);
    //$pdf->Write(0, $string);
    //echo convert_number_to_words(2999.56);
    ////$data[11]// amt_in_word
    $pdf->SetTextColor(91,137,42); //green
    $pdf->SetFont('Arial','B',7);    

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
    //$tbt = $pdf->Write(0, round(  ($data[6]-($data[6]*18)/118),2  ) );  //unit_price AMOUNT-CALC GST2542.00; // "TOTAL BEFORE TAX"
    //$tta = $pdf->Write(0, round((($data[6]*18)/118),2));  //gst CALCULATED FROM AMOUNT; // "TOTAL TAX AMOUNT"
    //$ta  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //2999.56; // "TOTAL AMOUNT"
    //$ar  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //2999.56; // "AMOUNT RECEIVED"
    //$ad  = $pdf->Write(0, number_format((float)$data[6], 2, '.', '')); //   0.00; // "AMOUNT DUE"

    $pdf->SetXY(184, 185); //column,row
    //$pdf->Write(0, $tbt);



    //$pdf->Write(0, number_format((float)($data[6]-($data[6]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST
    //TOTAL BEFORE TAX Figure;  
    //$pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST
    //$nero =(   ($data[4]-($data[4])*18)  );
    //$deno = 118;
    //$ndresult=($nero/$deno);
    //$pdf->SetXY(125, 206); //column,row
    //$pdf->Write(0, $nero);
    //$pdf->Write(50, $deno);
    //$pdf->Write(70, $ndresult);



    //


    //$pdf->Write(0, round(             ( ($data[4]-$data[4])*18 ) / 118), 2));  //unit_price AMOUNT-CALC GST

    //TOTAL BEFORE TAX Figure;  
    //$pdf->SetXY(184, 185); //column,row
    /////////////////$TBT = $pdf->Write(0, number_format((float)($data[4]-($data[4]*18)/118), 2, '.', ''));  //unit_price AMOUNT-CALC GST







    //TOTAL BEFORE TAX
    $ZSTT    = ($data[4] * (18/118)   );
    $ZCSVAMT = $data[4];
    $ZTBT   = ($ZCSVAMT-$ZSTT);
    $ZTBT   = number_format((float)$ZTBT, 2, '.', '');
    $pdf->SetXY(184, 185); //column,row
    $pdf->Write(0, $ZTBT);        



    //TOTAL TAX AMOUNT
    $ZTTA    = ($data[4] * (18/118)   );
    $ZTTA   = number_format((float)$ZTTA, 2, '.', '');
    $pdf->SetXY(185.5, 189); //column,row
    $pdf->Write(0, $ZTTA);        



    //TOTAL AMOUNT
    $ZTTA    = $data[4];
    $ZTTA   = number_format((float)$ZTTA, 2, '.', '');
    $pdf->SetXY(184, 193); //column,row
    $pdf->Write(0, $ZTTA);        




    //AMOUNT RECEIVED
    $pdf->SetXY(181, 197); //column,row
    $pdf->Write(0, "(-)".$ZTTA);        



    //AMOUNT DUE Figure
    $pdf->SetXY(188.5, 200); //column,row
    $pdf->Write(0, "0.00");  

    // Line break
    $pdf->Ln(20);
    //$pdf->Cell(130 , 5, 'test company Co.', 0, 0);
    //$pdf->Cell(59  , 5, 'INVOICE', 0, 1); // end of line      
    } 

    $pdf->Output();
    //==========================================  
    //####################################################################################################                    
    }
    }
    }
    }
    }



}//function end



//===========function to converet num to char

function convert_number_to_words($number) {

    //echo "The number is ----> " . $number;
    //exit();
        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
    //$decimal     = ' point ';
        $decimal     = ' and paisa ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'One',
            2                   => 'Two',
            3                   => 'Three',
            4                   => 'Four',
            5                   => 'Five',
            6                   => 'Six',
            7                   => 'Seven',
            8                   => 'Eight',
            9                   => 'Nine',
            10                  => 'Ten',
            11                  => 'Eleven',
            12                  => 'Twelve',
            13                  => 'Thirteen',
            14                  => 'Fourteen',
            15                  => 'Fifteen',
            16                  => 'Sixteen',
            17                  => 'Seventeen',
            18                  => 'Eighteen',
            19                  => 'Nineteen',
            20                  => 'Twenty',
            30                  => 'Thirty',
            40                  => 'Fourty',
            50                  => 'Fifty',
            60                  => 'Sixty',
            70                  => 'Seventy',
            80                  => 'Eighty',
            90                  => 'Ninety',
            100                 => 'Hundred',
            1000                => 'Thousand',
            1000000             => 'Million',
            1000000000          => 'Billion',
            1000000000000       => 'Trillion',
            1000000000000000    => 'Quadrillion',
            1000000000000000000 => 'Quintillion'
        );
        if (!is_numeric($number)) {
            return false;
        }
        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }
        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }
        $string = $fraction = null;
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
        switch (true) {
            case $number < 21:
            $string = $dictionary[$number];
            break;
            case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
            case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
            default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
        }
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
        //echo "The number is ----> " . $number;
        //echo "<br>";
        //echo "The string is ----> " . $string;
        //echo "<br>";
        //exit();
        return $string;
}

//#############################################################################################################
 


