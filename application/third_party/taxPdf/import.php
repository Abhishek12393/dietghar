 <?php  
 require_once('connection.php');
 if(!empty($_FILES["employee_file"]["name"]))  
 {  
      //$connect = mysqli_connect("localhost", "root", "", "testing");  
      $output = '';  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["employee_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while($row = fgetcsv($file_data))  
           {  
                //$name = mysqli_real_escape_string($connect, $row[0]);  
                $invoice_no = mysqli_real_escape_string($connect, $row[0]);  
                
                //$address = mysqli_real_escape_string($connect, $row[1]);  
                $serial_no = mysqli_real_escape_string($connect, $row[1]);  
                
                //$gender = mysqli_real_escape_string($connect, $row[2]);  
                $product_name = mysqli_real_escape_string($connect, $row[2]);  
                
                //$designation = mysqli_real_escape_string($connect, $row[3]); 
                $quantity = mysqli_real_escape_string($connect, $row[3]); 
                
                //$age = mysqli_real_escape_string($connect, $row[4]);  
                $unit_price = mysqli_real_escape_string($connect, $row[4]);  
                
                $gst = mysqli_real_escape_string($connect, $row[5]);  
                
                $amount = mysqli_real_escape_string($connect, $row[6]);  
                
                $billto1 = mysqli_real_escape_string($connect, $row[7]);  
                $billto2 = mysqli_real_escape_string($connect, $row[8]);  
                $billto3 = mysqli_real_escape_string($connect, $row[9]);  
                $billto4 = mysqli_real_escape_string($connect, $row[10]);  
                $amt_in_word = mysqli_real_escape_string($connect, $row[11]);  
                
                
                
                
                
                $query = "  
                INSERT INTO tbl_employee  
                     (invoice_no, serial_no, product_name, quantity, unit_price, gst, amount, billto1, billto2, billto3, billto4, amt_in_word )  
                     VALUES ('$invoice_no', '$serial_no', '$product_name', '$quantity', '$unit_price', '$gst', '$amount', '$billto1', '$billto2', '$billto3', '$billto4', '$amt_in_word')  
                ";  
                mysqli_query($connect, $query);  
           }  
           $select = "SELECT * FROM tbl_employee ORDER BY id DESC";  
           $result = mysqli_query($connect, $select);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="5%">ID</th>  
                          <th width="10%">Invoice</th>  
                          <th width="5%">Serial</th>  
                          <th width="25%">Product</th>  
                          <th width="10%">Qty</th>  
                          <th width="45%">Unit_Price</th>  
                          <th width="45%">GST</th>   
                          <th width="45%">Amount</th>   
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["invoice_no"].'</td>  
                          <td>'.$row["serial_no"].'</td>  
                          <td>'.$row["product_name"].'</td>  
                          <td>'.$row["quantity"].'</td>  
                          <td>'.$row["unit_price"].'</td>  
                          <td>'.$row["gst"].'</td>    
                          <td>'.$row["amount"].'</td>         
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
           echo $output;  
      }  
      else  
      {  
           echo 'Error1';  
      }  
 }  
 else  
 {  
      echo "Error2";  
 }  
 ?> 