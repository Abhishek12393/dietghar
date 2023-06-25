<script>
function blood(event,val)
{
event.preventDefault();
updateDatas('user_id','customer_lifestyle','bp',val,'stepper_26/20');
}
function pcos(event,val)
{
  event.preventDefault();
  updateDatas('user_id','customer_lifestyle','pcos',val,'stepper_26/20');
}
</script>