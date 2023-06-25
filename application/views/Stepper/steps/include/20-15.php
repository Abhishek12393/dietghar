<script>
function thyroid(val, event)
{
event.preventDefault();
if(val=="YES")
{
document.getElementById("form_id").action="<?=base_url('Stepper/stepper_21/16')?>";
var val=1;
updateDatas('user_id','customer_lifestyle','is_thyroid',val,'stepper_21/16');
}
else
{
document.getElementById("form_id").action="<?=base_url('Stepper/stepper_22/16')?>";
var val=0;
updateDatas('user_id','customer_lifestyle','is_thyroid',val,'stepper_22/16');              
}
}
function thtype(event)
{
event.preventDefault();
document.getElementById("form_id").submit();
}
</script>