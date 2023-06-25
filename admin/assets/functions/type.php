<?php
$q = intval($_GET['q']);
include('conn.php');
$sql="SELECT * FROM `food_master` where id='".$q."' and portion='1'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
?>
<input type="hidden" name="type" value="<?php echo $row['id']; ?>">
<input type="hidden" name="turl" value="<?php echo $row['food_name']; ?>">
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
<script src='https://dietghar.in/diet/admin/assets/jquery-3.2.1.min.js' type='text/javascript'></script>
<script src='https://dietghar.in/diet/admin/assets/select2/dist/js/select2.min.js' type='text/javascript'></script>
<link href='https://dietghar.in/diet/admin/assets/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
<select id='selUser' class="select2" onclick='showtypesub(this.value)' required>
<option value="">-- Select Category --</option>
<?php
include('conn.php');
$sql="SELECT * FROM `food_master` where portion='1'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {   
?><option value='<?php echo $row['id']; ?>'><?php echo $row['food_name']; ?></option>";
<?php
} 
}
else{echo "<center><font color=Red><b>...</b></font></center></tr>";} 
?>
</select>
<script>
$(document).ready(function(){
$("#selUser").select2();
});
</script>