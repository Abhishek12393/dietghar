<?php 
include 'connection.php';
function read_file_docx($filename){

    $striped_content = '';
    $content = '';

    if(!$filename || !file_exists($filename)) return false;

    $zip = zip_open($filename);

    if (!$zip || is_numeric($zip)) return false;

    while ($zip_entry = zip_read($zip)) {

        if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

        if (zip_entry_name($zip_entry) != "word/document.xml") continue;

        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

        zip_entry_close($zip_entry);
    }// end while

    zip_close($zip);


    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);

    return $striped_content;
}

$log_directory = 'doc/No Equipment';  // Directory name where all docs is stored




foreach(glob($log_directory.'/*.*') as $file) {
  	$all_doc_in_server[] = $file;
}

foreach ($all_doc_in_server as  $server_doc) {

$filename =$server_doc;// or /var/www/html/file.docx

$content = read_file_docx($filename);
if($content !== false) {

   $output = nl2br($content);
   // echo $output;
   $a =explode(chr(0x0D),$output);
  // print_r($a);die;
   $title = explode(':',$a[0]);
   $muscle = explode(':',$a[1]);
   $sec_muscle = explode(':',$a[2]);
   $Summary = explode(':',$a[3]);
   $dd= str_replace('amp;',"",$muscle[1]);
   $muscle[1]= str_replace('&',",",$dd);
   $muscle = explode(',',$muscle[1]);
   $sec_muscle = explode(',',$sec_muscle[1]);

// , seperated
   $muscle =  implode(",",$muscle);
   $sec_muscle =  implode(",",$sec_muscle);


   $htm = $Summary[1];
    foreach ($a as $key => $value) {
    	if($key>4){
    		 $htm.=$value;
    	}
    }

       $data = array(
       		'title'  => $title[1],
       		'muscle' =>$muscle,
       		'sec_muscle' => $sec_muscle,
       		'summary' =>$htm,
          'file_name' => $filename
       				);
        // echo "<pre>";
        // print_r($data);
// die;
         $sql  ="INSERT INTO exercise (title, summary, file_name,primary_muscle,secondary_mucle,exercise_cat)
              VALUES ('".str_replace('<br />', '', $title[1])."', '".$htm."', '".$filename."','".str_replace('<br />', '', $muscle)."','".str_replace('<br />', '', $sec_muscle)."','15')";
              echo $sql;
             if(mysqli_query($conn, $sql)){
               
              }
}
else {
    echo 'Couldn\'t the file. Please check that file.';
}


}

