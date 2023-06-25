 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test page</title>
</head>
<body>
<style>
body {
  background-color: lightblue;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
.page {
        overflow: hidden;
        page-break-after: always;
       
    }

.page:last-of-type {
    page-break-after: auto
}

@media print {
  .new-page {
    page-break-before: always;
  }
}
</style>
  <?php 
   echo "<div class='page'>"; 
  foreach($chart as $i=>$chartdata){
    $day = $chartdata['day'];
   
    pr($chartdata['day'], 'day'); 
    if ($day % 5 == 0  && $day !=15  && $day !=30 ) {
     
      echo 'This number is divisible by 5.';
      echo "</div> ";
      echo "<div class='page'>"; 
    }
   
  }
  echo "</div> ";
  ?>

 



 
<script>
 
</script>


</body>
</html>
 