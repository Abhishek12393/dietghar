<?php
$q = intval($_GET['q']);
include('../connect/conn.php');
$sql="SELECT * FROM `acity` where cid='".$q."' and link='1'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
?>
<input type="hidden" name="cname" value="<?php echo $row['name']; ?>">
<input type="hidden" name="curl" value="<?php echo $row['url']; ?>">
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
<select name='lid' class="form-control show-tick" onclick='showbuilders(this.value)' required>
<option value="">-- Select Location  --</option>
<?php
$q = intval($_GET['q']);
include('../connect/conn.php');
$sql="SELECT * FROM `acityloc` where cid='".$q."' and link = '1' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {   
?><option value='<?php echo $row['lid']; ?>'><?php echo $row['name']; ?></option>";
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
</select>