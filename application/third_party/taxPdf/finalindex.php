 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Import CSV File Data into MySQL Database using PHP & Ajax</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Import CSV Data File for PDF Generation</h2>  
                <h3 align="center">Invoice Data</h3><br />  
                
                
                
                
                
                
                
<form id="upload_csv" action="upload.php" method="post" enctype="multipart/form-data"> 
    <table class="table table-bordered"> 
        <tr>
            <td style="padding-top:20px;font-weight:bold; ">Import IGST</td>
            <td><input type="file" name="file1" style="margin-top:15px;" /></td>
            <td><input type="submit" id="upload" value="Upload IGST" style="margin-top:10px;" class="btn btn-primary pull-right" /></td>
        </tr>
        <tr>
            <td style="padding-top:20px;font-weight:bold; ">Import CGST</td>
            <td><input type="file" name="file2" style="margin-top:15px;" /></td>
            <td><input disabled type="submit" id="upload2" value="Upload CGST" style="margin-top:10px;" class="btn btn-success pull-right" /></td>
        </tr>
    </table>    
    
    
<!--     <div class="col-md-4">  
          <input type="file" name="file" style="margin-top:15px;" />  
     </div>  
     <div class="col-md-5">  
          <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-danger pull-right" />  
     </div>  -->
     <div style="clear:both"></div>  
</form>  
 
<?php                
if (isset($_FILES['file'])) {
    echo "Yes file is set";
    exit();
}
?>                
                
                
                
                
                
                
                
                
                
                
                <br /><br /><br />  
                <div class="table-responsive" id="employee_table">  
<!--                     <table class="table table-bordered">  
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
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["invoice_no"]; ?></td>  
                               <td><?php echo $row["serial_no"]; ?></td>  
                               <td><?php echo $row["product_name"]; ?></td>  
                               <td><?php echo $row["quantity"]; ?></td>  
                               <td><?php echo $row["unit_price"]; ?></td>  
                               <td><?php echo $row["gst"]; ?></td>  
                               <td><?php echo $row["amount"]; ?></td>                                 
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  -->
                </div>  
           </div>  
      </body>  
 </html>  
<!-- <script>  
      $(document).ready(function(){  
           $('#upload_csv').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"import.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else  
                          {  
                               $('#employee_table').html(data);  
                          }  
                     }  
                })  
           });  
      });  
 </script>  -->