<?php
$q = intval($_GET['q']);
include('../connect/conn.php');
$sql="SELECT * FROM `abuilders` where bid='".$q."' and link='1'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
?><input name='bname' type='hidden' class='textbox'  value='<?php echo $row['name']; ?>' size='35'/>
<input name='blogo' type='hidden' class='textbox'  value='<?php echo $row['blogo']; ?>' size='35'/>
<input name='burl' type='hidden' class='textbox'  value='<?php echo $row['url']; ?>' size='35'/>
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>

