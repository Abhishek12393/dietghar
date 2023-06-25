<?php
$q = intval($_GET['q']);
include('../connect/conn.php');
$sql="SELECT * FROM `atypesub` where stid='".$q."' and link='1'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
?>
<input type="hidden" name="catype" value="<?php echo $row['name']; ?>">
<input type="hidden" name="caturl" value="<?php echo $row['url']; ?>">
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
<select name='cid' class="form-control show-tick" onclick='showxcity(this.value)' required>
<option value="">-- Select City --</option>
<?php
include('../connect/conn.php');
$sql="SELECT * FROM `acity` where link = '1' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {   
?><option value='<?php echo $row['cid']; ?>'><?php echo $row['name']; ?></option>";
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
</select>