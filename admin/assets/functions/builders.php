<?php
$q = intval($_GET['q']);
include('../connect/conn.php');
$sql="SELECT * FROM `acityloc` where lid='".$q."' and link='1'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
?>
<input type="hidden" name="location" value="<?php echo $row['name']; ?>">
<input type="hidden" name="locurl" value="<?php echo $row['url']; ?>">
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
<select name='bid' class="form-control show-tick" onchange='showcities(this.value)' required>
<option value="">-- Select Builder--</option>
<?php
$q = intval($_GET['q']);
include('../connect/conn.php');
$sort = isset($_GET['firstLetter']) ? filter_input(INPUT_GET, 'firstLetter',FILTER_SANITIZE_URL) : "" ;
if($sort == "") {
$sql="SELECT * FROM `abuilders` where link='1' ORDER BY Name ASC " ; }
else{
$sql = "SELECT * FROM city WHERE Name LIKE '$sort%' ORDER BY Name ASC" ;
}
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {   
?><option value='<?php echo $row['bid']; ?>'><?php echo $row['name']; ?></option>";
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
</select>