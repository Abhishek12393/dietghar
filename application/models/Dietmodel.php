<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dietmodel extends CI_Model{
				
	public function checkotp($otp,$mobile){
		
		$this->db->select('*');
		if($otp != 202020){
			$this->db->where('otp',$otp); // to directly open user panel : any user
		}
		// $this->db->where('otp',$otp);
		$this->db->where('mobile_no',$mobile);
		$this->db->from('customers_info');
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function userdata($user_type){
		
		$this->db->select('*,c.id as user_id');
		
		$this->db->from('customers_info as c');
		$this->db->join('Plan as p', 'p.user_id = c.id', 'left');
		$this->db->where('c.user_type',$user_type);
		$this->db->order_by("p.purchase_date","DESC");
		// $this->db->order_by("c.id","DESC");
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}



	public function record_count() {
			return $this->db->where('status',1)->from("fb_review")->count_all_results();
	}
	public function record_count_accept_meal() {
			return $this->db->where('status',1)->from("skip_bedtime")->count_all_results();
	}
	public function record_count_decline_meal() {
			return $this->db->where('status',2)->from("skip_bedtime")->count_all_results();
	}
	public function record_count_remainings_meal() {
			return $this->db->where('status',0)->from("skip_bedtime")->count_all_results();
	}
	public function record_count_blog() {
			return $this->db->from("blog")->count_all_results();
	}

	public function getAllData($limit='',$offset='') {
		$this->db->select('*');
		$this->db->from('fb_review'); 
		$this->db->where('status', 1);
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function allblog($limit='',$offset=''){
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->order_by("id","asc");
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function allVideos($limit=NULL,$offset=NULL){	
			$this->db->select('*');
			$this->db->from('videos');
			$this->db->order_by("id","desc");
			$this->db->limit($limit,$offset);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
	}
	public function del_Videos($id){
		$this -> db -> where('id', $id);
		$resp = $this -> db -> delete('videos');
		return $resp;
	}
	public function all_gallery_photos(){  // at
		$this->db->select('*');
		$this->db->from('gallery_web');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function gallery_photos_bygrid($grid){  // at
		$this->db->select('*');
		$this->db->from('gallery_web');
		$this->db->where('grid',$grid);
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function allblogs(){
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function reminder_payment(){
		$c_date = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('renew_reminder');
		$this->db->where('user_id',$_SESSION['id']);
		$this->db->where('status',0);
		$this->db->where('reminder_date <=',$c_date);
		$query = $this->db->get();

		$result = $query->row();
		// echo $this->db->last_query();die;
		return $result;
	}

	public function Userdatadetails($user_id,$renew=0){
			
		// general profile details :: 
		$this->db->select('c.*,p.*,addr.*,life.*,life.thyroid as c_thyroid,life.diabetes as c_diabetes,life.lifestyle as c_lifestyle,th.name as thyroid, d.name as diabetes, w.name as workout_follow,l.name as lifestyle,o.name as objective,c.id as id');
		
		$this->db->from('customers_info as c');
		if($renew ==1 ){
			$this->db->join('Plan as p', 'p.user_id = c.id AND p.id = c.renew_plan_id', 'left');
		}else{
			$this->db->join('Plan as p', 'p.user_id = c.id AND p.id = c.plan_id', 'left');
		}
		$this->db->join('customer_address as addr', 'addr.customer_id = c.id', 'left');
		$this->db->join('customer_lifestyle as life', 'life.user_id = c.id', 'left');
		/*$this->db->join('Plan as pl', 'pl.user_id = c.id', 'left');*/
		$this->db->join('objective as o', 'o.id = life.objective', 'left');
		$this->db->join('lifestyle as l', 'l.id = life.lifestyle', 'left');
		$this->db->join('workout_follow as w', 'w.id = life.workout_follow', 'left');
		$this->db->join('thyroid as th', 'th.id = life.thyroid', 'left');
		$this->db->join('diabetes as d', 'd.id = life.diabetes', 'left');

		
		$this->db->where('c.id',$user_id);
		$query = $this->db->get();

		$result = $query->row();
		return $result;
	}
	public function UserPlans($user_id){
		$this->db->select('*');
		$this->db->from('Plan');
		$this->db->where('user_id',$user_id);
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	// user chart history  
	public function user_chart_history($user_id , $chartid=0){
			$this->db->select('*');
			$this->db->from('customers_chart_history');
			$this->db->where('cust_id',$user_id);
			if($chartid !=0){
				$this->db->where('meal_chart_id',$chartid);
			}
			$this->db->order_by("id","DESC");
			$query = $this->db->get();
			$result = $query->result_array();
		return $result;

	}
	// meal chart purchase data , fetch
	public function user_chart_purchase_data($user_id ,$chartid,$chartdays){
			$this->db->select('*');
			$this->db->from('customers_chart_purchase');
			$this->db->where('user_id',$user_id);
			$this->db->where('chart_id',$chartid);
			$this->db->where('chart_days',$chartdays);
			$this->db->where('p_status',1);
			$this->db->order_by("id","DESC");
			$query = $this->db->get();
			$result = $query->result_array();
		return $result;

	}

		// ----- ? at
	public function check_seven_day_call(){
		
		$this->db->select("c.*,ci.*,p.*,c.id as call_id , c.status as callstatus ,datediff(curdate(),str_to_date(meal_start_date,'%Y-%m-%d')) as currentday");
		
		$this->db->from('call_schedule as c');
		$this->db->join('customers_info as ci','c.user_id = ci.id');
		$this->db->join('Plan as p','p.user_id = ci.id');
		$this->db->where('c.call_date<=',date('Y-m-d'));
		// $this->db->where('c.status <=',1);
 
		$this->db->where('c.status',1);
		$this->db->group_by('c.user_id');
		$query = $this->db->get();

		$result = $query->result_array();
		// prd( $this->db->last_query()); //
		return $result;
	}
	
	public function check_seven_day_call_dash(){
		$this->db->select('count(*) as call7');
		$this->db->from('call_schedule as c');
		$this->db->where('c.call_date<=',date('Y-m-d'));
		$this->db->where('c.status',1);
		$this->db->group_by('c.user_id');
		$query = $this->db->get();
		$result = $query->result();
		// pr( $this->db->last_query());
		return $result[0];
	}

	public function foodlist($id){
		
		$this->db->select('f.*,c.name as food_category_name,t.name as food_type_name,u.name as unitname'); 		
		$this->db->from('food_master as f');
		$this->db->join('food_category as c', 'c.id = f.food_category', 'left');
		$this->db->join('food_type as t', 't.id = f.food_type', 'left');
		$this->db->join('Units as u', 'u.id = f.unit', 'left');
		if($id !=''){
		$this->db->where('f.id',$id);

		}
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}
	public function requestcall($data){
		
		$this->db->select('*'); 		
		$this->db->from('request_call as r');
		$this->db->where('r.user_id',$data->user_id);
		$this->db->where('r.status',1);
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}

	public function foodPagi($foodname_search='',$placement_search='',$foodtype_search=''){
		$this->db->select('f.id'); 
		$this->db->from('foodCombination as f');
		$this->db->join('Placement as p','p.id=f.placement');
		$this->db->join('food_category as fo','fo.id=f.foodCategory');
		if($foodname_search!=''){
			$this->db->like('f.foodcombination_name',$foodname_search);
		}
		if($placement_search!=''){
			$this->db->like('p.name',$placement_search);
		}
		if($foodtype_search!=''){
			$this->db->like('fo.name',$foodtype_search);
		}
		$this->db->group_by('foodcombination_name,food_combination_no,no_of_chart');
		
		
		$query = $this->db->get();

		return $result = $query->result_array();
	}
 	public function getFoodcombination($start='',$length='',$foodname_search='',$placement_search='',$foodtype_search=''){
 		
 		$this->db->select('f.*,p.name as placements,fo.name as foodCategory'); 
 		$this->db->from('foodCombination as f');
 		$this->db->join('Placement as p','p.id=f.placement');
 		$this->db->join('food_category as fo','fo.id=f.foodCategory');
 		if($foodname_search!=''){
	 		$this->db->like('f.foodcombination_name',$foodname_search);
	 	}
	 	if($placement_search!=''){
	 		$this->db->like('p.name',$placement_search);
	 	}
	 	if($foodtype_search!=''){
	 		$this->db->like('fo.name',$foodtype_search);
	 	}
 		$this->db->group_by('foodcombination_name,food_combination_no,no_of_chart');
	 	$this->db->order_by('id', 'desc');
	 	
	 	//$this->db->like('f,placements', $search);
	 	//$this->db->like('f,foodCategory', $search);
	 	if($start!=''){
	 	$this->db->limit($length,$start); 

	 	}
		
		$query = $this->db->get();

		$result = $query->result_array();
		// echo $this->db->last_query();die;
		foreach ($result as $key => $value) {
			$results[$key] = $value;

			$this->db->select('d.frequency,dis.name as diseaseName'); 
 		$this->db->from('food_combination_disease as d');
 		$this->db->join('disease as dis','dis.id=d.disease_id');
 		$this->db->where('d.food_chart_no',$value["no_of_chart"]);
		
		$query1 = $this->db->get();

		$res = $query1->result_array();
			$results[$key]["fileterdisease"] = $res;
		}
		return $results;
 	}

 	public function update_foodcombination($data,$getMaxCombination,$maxFoodId){
 		$this->db->where('food_combination_no',$getMaxCombination);
 		$this->db->where('no_of_chart',$maxFoodId);
 		$this->db->update('foodCombination',$data);
 	}

 	public function getCombinationDetails($foodId,$combinationId){
 		$this->db->select('fc.*,fm.food_name as foodName,fm.calories as inicalories,fm.protein as iniprotein,fm.carbohydrates as inicarbo,fm.fat as inifat,fm.sodium as inisodim,fm.iron as iniiron,fm.d_fibre as inifibre,u.name as unitname,p.name as placements,fo.name as foodCategory'); 		
 		$this->db->from('foodCombination as fc');
 		$this->db->join('Placement as p','p.id=fc.placement');
 		$this->db->join('food_category as fo','fo.id=fc.foodCategory');
		$this->db->join('food_master as fm', 'fc.foodId = fm.id', 'left');
		$this->db->join('Units as u', 'u.id = fm.unit', 'left');

		$this->db->where('fc.no_of_chart',$foodId);
		$this->db->where('fc.food_combination_no',$combinationId);

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;
 	}
 	public function deleteCombination($foodId,$combinationId){
 		$this->db->where('no_of_chart',$foodId);
 		$this->db->where('food_combination_no',$combinationId);
 		$this->db->delete('foodCombination');
 	}
 	public function allfaqs(){
		$this->db->select('*');
		$this->db->from('faq');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
 	public function allfaqsUser(){
		$this->db->select('*');
		$this->db->from('faqUser');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
 	public function allglossary(){
		$this->db->select('*');
		$this->db->from('glossary');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function allreview(){
		$this->db->select('*');
		$this->db->from('fb_review');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function allcontact(){
		$this->db->select('*');
		$this->db->from('contact');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function allappointment(){
		$this->db->select('*');
		$this->db->from('appointment');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
		
	public function topreview(){ # check this # extra
		$this->db->select('*');
		$this->db->from('fb_review');
		$this->db->order_by("id","asc");
		$this->db->LIMIT ('5');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function select_com_where($table,$where,$id){ # check this # extra
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where,$id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function exerciseList($id=''){ 
		
		$this->db->select('e.*,ec.name as exercise_cat_name');
		
		$this->db->from('exercise as e');
		$this->db->join('exercise_category as ec', 'ec.id = e.exercise_cat', 'left');
		if($id){
			$this->db->where('e.id',$id);
		}
		
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}

	public function select_com_where_limit($table,$where,$id,$where2,$id2){ # check this # extra
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where,$id);
		$this->db->where($where2,$id2);
		$this->db->group_by('no_of_chart,foodcombination_name,food_combination_no');
		$this->db->order_by('id', 'desc');
		// $this->db->limit('200');
		$query = $this->db->get();
		$result = $query->result_array();
			// echo $this->db->last_query();die;
		return $result;
		// foreach ($result as $key => $value) {
		// 	$results[$key] = $value;

		// 	$this->db->select('d.frequency,dis.name as diseaseName'); 
		// 	$this->db->from('food_combination_disease as d');
		// 	$this->db->join('disease as dis','dis.id=d.disease_id');
		// 	$this->db->where('d.food_chart_no',$value["no_of_chart"]);
		
		// $query1 = $this->db->get();

		// $res = $query1->result_array();
		// 	$results[$key]["fileterdisease"] = $res;
		// }
		// return $results;
	}
	public function Allmeal(){
		
		// skip bedtime
		// $this->db->select('id as fake_chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,dinnner_no_of_chart,food_cate'); 		
		// // skip morning
		$this->db->select('id as fake_chart_id,morning,bedtime,breakfast,midmeal,lunch,evening,dinnner,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,bedtime_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,dinnner_no_of_chart,food_cate'); 		

		$this->db->from('final_chart_2700_2800');
		$this->db->where('status',1);
		$this->db->limit(1);
		$query = $this->db->get();

		$result = $query->result_array();
		foreach ($result as $key => $value) {
			$result[$key]['morning_data'] =  $this->get_food_data($value["morning_no_of_chart"],$value["food_cate"],$value["morning"],'12');
			$result[$key]['breakfast_data'] =  $this->get_food_data($value["breakfast_no_of_chart"],$value["food_cate"],$value["breakfast"],'10');
			$result[$key]['midmeal_data'] =  $this->get_food_data($value["midmeal_no_of_chart"],$value["food_cate"],$value["midmeal"],'15');
			$result[$key]['lunch_data'] =  $this->get_food_data($value["lunch_no_of_chart"],$value["food_cate"],$value["lunch"],'14');
			$result[$key]['evening_data'] =  $this->get_food_data($value["evening_no_of_chart"],$value["food_cate"],$value["evening"],'13');
			$result[$key]['dinnner_data'] =  $this->get_food_data($value["dinnner_no_of_chart"],$value["food_cate"],$value["dinnner"],'11');
			$result[$key]['bedtime_data'] =  $this->get_food_data($value["bedtime_no_of_chart"],$value["food_cate"],$value["bedtime"],'9');
		}
		return $result;
	}
	public function Allmeal1(){
		
		// skip bedtime
		// $this->db->select('id as fake_chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,dinnner_no_of_chart,food_cate'); 		
		// // skip morning
		$this->db->select('id as fake_chart_id,morning,bedtime,breakfast,midmeal,lunch,evening,dinnner,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,bedtime_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,dinnner_no_of_chart,food_cate'); 		

		$this->db->from('final_chart_900_1000');
		$this->db->where('status',1);
		$this->db->limit(1);
		$query = $this->db->get();

		$result = $query->result_array();
		foreach ($result as $key => $value) {
			$result[$key]['morning_data'] =  $this->get_food_data($value["morning_no_of_chart"],$value["food_cate"],$value["morning"],'12');
			$result[$key]['breakfast_data'] =  $this->get_food_data($value["breakfast_no_of_chart"],$value["food_cate"],$value["breakfast"],'10');
			$result[$key]['midmeal_data'] =  $this->get_food_data($value["midmeal_no_of_chart"],$value["food_cate"],$value["midmeal"],'15');
			$result[$key]['lunch_data'] =  $this->get_food_data($value["lunch_no_of_chart"],$value["food_cate"],$value["lunch"],'14');
			$result[$key]['evening_data'] =  $this->get_food_data($value["evening_no_of_chart"],$value["food_cate"],$value["evening"],'13');
			$result[$key]['dinnner_data'] =  $this->get_food_data($value["dinnner_no_of_chart"],$value["food_cate"],$value["dinnner"],'11');
			$result[$key]['bedtime_data'] =  $this->get_food_data($value["bedtime_no_of_chart"],$value["food_cate"],$value["bedtime"],'9');
		}
		return $result;
	}
		
	public function prepare_approved_chart($limits=''){
		
		$this->db->select('id as fake_chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart,food_cate'); 		
		$this->db->from('fake_chart');
		$this->db->where('status',1);
		if($limits){
			$this->db->limit($limits);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		// echo "-----------------*get data from fake chart*------------------";
		// 	pr($result);
		// echo "----------------**-------------------<br>";
		$val = 'stop';
		foreach ($result as $key => $value) {
			$result[$key]['morning_data'] =  $this->get_food_data($value["morning_no_of_chart"],$value["food_cate"],$value["morning"],'12');
			$result[$key]['breakfast_data'] =  $this->get_food_data($value["breakfast_no_of_chart"],$value["food_cate"],$value["breakfast"],'10');
			$result[$key]['midmeal_data'] =  $this->get_food_data($value["midmeal_no_of_chart"],$value["food_cate"],$value["midmeal"],'15');
			$result[$key]['lunch_data'] =  $this->get_food_data($value["lunch_no_of_chart"],$value["food_cate"],$value["lunch"],'14');
			$result[$key]['evening_data'] =  $this->get_food_data($value["evening_no_of_chart"],$value["food_cate"],$value["evening"],'13');
			$result[$key]['dinnner_data'] =  $this->get_food_data($value["dinnner_no_of_chart"],$value["food_cate"],$value["dinnner"],'11');
			$result[$key]['bedtime_data'] =  $this->get_food_data($value["bedtime_no_of_chart"],$value["food_cate"],$value["bedtime"],'9');
			
			if ($val == 'stop') { // temp
				break;    /* You could also write 'break 1;' here. */
			}
		}
		return $result;
	}

	public function prepare_foodchart_forminidiet($table ,$food_type, $limits){
		// simply picking random days and returning with limit for mini dietghar response
		// made by at

		$this->db->select('ft.id as chart_id,ft.totalcalories,ft.food_cate, fcm.fc_name as morning , fcbf.fc_name as breakfast, fcmm.fc_name as midmeal, fcl.fc_name as lunch, fce.fc_name as evening, fcd.fc_name as dinnner, fcbt.fc_name as bedtime');

		$this->db->from("$table as ft");
		$this->db->join('foodCombination_new as fcm', 'ft.morning_no_of_chart = fcm.id', 'left');
		$this->db->join('foodCombination_new as fcbf', 'ft.breakfast_no_of_chart = fcbf.id', 'left');
		$this->db->join('foodCombination_new as fcmm', 'ft.midmeal_no_of_chart = fcmm.id', 'left');
		$this->db->join('foodCombination_new as fcl', 'ft.lunch_no_of_chart = fcl.id', 'left');
		$this->db->join('foodCombination_new as fce', 'ft.evening_no_of_chart = fce.id', 'left');
		$this->db->join('foodCombination_new as fcd', 'ft.dinnner_no_of_chart = fcd.id', 'left');
		$this->db->join('foodCombination_new as fcbt', 'ft.bedtime_no_of_chart = fcbt.id', 'left');
		$this->db->where('ft.status',1);
		if($food_type == 3){$this->db->where( "ft.food_cate = 3 OR ft.food_cate = 1");}
		if($food_type == 1){$this->db->where( "ft.food_cate = 1");}
		
		$this->db->order_by('rand()');
		$this->db->limit($limits);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		// return   $this->db->last_query();


	}

	public function userfinalchart_byid($id){ // by at
		$this->db->select('c.*');
		$this->db->from('customers_chart_final as c');
		$this->db->where("c.id",$id);
		$query = $this->db->get();
		$result = $query->result_array();
		// return $result[0];
		// pr($result);
		// return $result;
		// return $id;
		if(empty($result)){
			return 0;
		}else{
			// prd( $this->db->last_query());
			foreach ($result as $key => $value) {
				$result[$key]['morning_data'] =  $this->get_food_data2($value["morning_no_of_chart"]);
				$result[$key]['breakfast_data'] =  $this->get_food_data2($value["breakfast_no_of_chart"]);
				$result[$key]['midmeal_data'] =  $this->get_food_data2($value["midmeal_no_of_chart"]);
				$result[$key]['lunch_data'] =  $this->get_food_data2($value["lunch_no_of_chart"]);
				$result[$key]['evening_data'] =  $this->get_food_data2($value["evening_no_of_chart"]);
				$result[$key]['dinnner_data'] =  $this->get_food_data2($value["dinnner_no_of_chart"]);
				$result[$key]['bedtime_data'] =  $this->get_food_data2($value["bedtime_no_of_chart"]);
		
			}
			// pr( $this->db->last_query());
			 #prd($result , 'rep after foreach');
			return $result;
		}
	}
	public function prepare_approved_chart_upgrade3($table ,$food_type,$placement_arr, $limits){ 
		// using in : foodchart_new fumction only;
		// at 25032022 :: database changed foodcombination table upgraded to fc_new ,  placement array removed
		/*change food category is 1 fixed*/
		$this->db->select('id as fake_chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart,food_cate');
		$this->db->from($table);
		$this->db->where('status', 1);
		$this->db->where('admin_verify',1);
		$this->db->where('food_cate',$food_type);

		$this->db->order_by('rand()'); // need to change this later
		$this->db->limit($limits);
		$query = $this->db->get();
		$result = $query->result_array();
		if(empty($result)){
			return 0;
		}else{
			// prd( $this->db->last_query());
			foreach ($result as $key => $value) {
				$result[$key]['morning_data'] =  $this->get_food_data2($value["morning_no_of_chart"]);
				$result[$key]['breakfast_data'] =  $this->get_food_data2($value["breakfast_no_of_chart"]);
				$result[$key]['midmeal_data'] =  $this->get_food_data2($value["midmeal_no_of_chart"]);
				$result[$key]['lunch_data'] =  $this->get_food_data2($value["lunch_no_of_chart"]);
				$result[$key]['evening_data'] =  $this->get_food_data2($value["evening_no_of_chart"]);
				$result[$key]['dinnner_data'] =  $this->get_food_data2($value["dinnner_no_of_chart"]);
				$result[$key]['bedtime_data'] =  $this->get_food_data2($value["bedtime_no_of_chart"]);
		
			}
			// pr( $this->db->last_query());
			 #prd($result , 'rep after foreach');
			return $result;
		}
	 
	}
	public function prepare_approved_chart_upgrade2($table ,$food_type,$placement_arr, $limits){ 
		// at 25032022 :: database changed foodcombination table upgraded to fc_new ,  placement array removed
		/*change food category is 1 fixed*/
		$this->db->select('id as fake_chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart,food_cate');
		$this->db->from($table);
		$this->db->where('status',1);
		$this->db->where('food_cate',$food_type);
		// if (in_array("Early Morning", $placement_arr)){
		// 	$this->db->where('morning !=','');
		// }else{
		// 	$this->db->where('morning',NULL);
		// }
		// this is when we need what type of meals day should be fetched
		// if (in_array("Breakfast", $placement_arr)){
		// 	$this->db->where('breakfast !=','');
		// }else{
		// 	$this->db->where('breakfast',NULL);
		// }
		// if (in_array("Mid Meal", $placement_arr)){
		// 	$this->db->where('midmeal !=','');
		// }else{
		// 	$this->db->where('midmeal',NULL);
		// }
		// if (in_array("Lunch", $placement_arr)){
		// 	$this->db->where('lunch !=','');
		// }else{
		// 	$this->db->where('lunch',NULL);
		// }
		// if (in_array("Evening Snack", $placement_arr)){
		// 	$this->db->where('evening !=','');
		// }else{
		// 	$this->db->where('evening',NULL);
		// }
		// if (in_array("Dinner", $placement_arr)){
		// 	$this->db->where('dinnner !=','');
		// }else{
		// 	$this->db->where('dinnner',NULL);
		// }
		// if (in_array("Bed Time", $placement_arr)){
		// 	$this->db->where('bedtime !=','');
		// }else{
		// 	$this->db->where('bedtime',NULL);
		// }

		$this->db->order_by('rand()'); // need to change this later
		$this->db->limit($limits);
		$query = $this->db->get();
		$result = $query->result_array();
		if(empty($result)){
			return 0;
		}else{
			// prd( $this->db->last_query());
			foreach ($result as $key => $value) {
				$result[$key]['morning_data'] =  $this->get_food_data2($value["morning_no_of_chart"]);
				$result[$key]['breakfast_data'] =  $this->get_food_data2($value["breakfast_no_of_chart"]);
				$result[$key]['midmeal_data'] =  $this->get_food_data2($value["midmeal_no_of_chart"]);
				$result[$key]['lunch_data'] =  $this->get_food_data2($value["lunch_no_of_chart"]);
				$result[$key]['evening_data'] =  $this->get_food_data2($value["evening_no_of_chart"]);
				$result[$key]['dinnner_data'] =  $this->get_food_data2($value["dinnner_no_of_chart"]);
				$result[$key]['bedtime_data'] =  $this->get_food_data2($value["bedtime_no_of_chart"]);
		
			}
			// pr( $this->db->last_query());
			 #prd($result , 'rep after foreach');
			return $result;
		}
	 
	}
	public function prepare_approved_chart_upgrade($table ,$food_type,$placement_arr, $limits){
		/* randomizing  //picking placement wise data where status = 1 // limit acc to plan */ 
		/*change food category is 1 fixed*/
		$this->db->select('id as fake_chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart,food_cate');

		$this->db->from($table);
		$this->db->where('status',1);
		// pick items according to placement ::
		if (in_array("Early Morning", $placement_arr)){
			$this->db->where('morning !=','');
		}else{
			$this->db->where('morning',NULL);
		}
		if (in_array("Breakfast", $placement_arr)){
			$this->db->where('breakfast !=','');
		}else{
			$this->db->where('breakfast',NULL);
		}
		if (in_array("Mid Meal", $placement_arr)){
			$this->db->where('midmeal !=','');
		}else{
			$this->db->where('midmeal',NULL);
		}
		if (in_array("Lunch", $placement_arr)){
			$this->db->where('lunch !=','');
		}else{
			$this->db->where('lunch',NULL);
		}
		if (in_array("Evening Snack", $placement_arr)){
			$this->db->where('evening !=','');
		}else{
			$this->db->where('evening',NULL);
		}
		if (in_array("Dinner", $placement_arr)){
			$this->db->where('dinnner !=','');
		}else{
			$this->db->where('dinnner',NULL);
		}
		if (in_array("Bed Time", $placement_arr)){
			$this->db->where('bedtime !=','');
		}else{
			$this->db->where('bedtime',NULL);
		}
		$this->db->where('food_cate',$food_type); 
		$this->db->order_by('rand()');
		$this->db->limit($limits);


		$query = $this->db->get();
		$result = $query->result_array();
		//for test::
			#echo "-----------------*get data from $table*------------------";
			#pr( $this->db->last_query());
				#prd($result);
			// echo "----------------*diet model prepare approved chart*-------------------<br>"; 
		if(empty($result)){
			return 0;
		}else{
			foreach ($result as $key => $value) {
				$result[$key]['morning_data'] =  $this->get_food_data($value["morning_no_of_chart"],$value["food_cate"],$value["morning"],'12');
				$result[$key]['breakfast_data'] =  $this->get_food_data($value["breakfast_no_of_chart"],$value["food_cate"],$value["breakfast"],'10');
				$result[$key]['midmeal_data'] =  $this->get_food_data($value["midmeal_no_of_chart"],$value["food_cate"],$value["midmeal"],'15');
				$result[$key]['lunch_data'] =  $this->get_food_data($value["lunch_no_of_chart"],$value["food_cate"],$value["lunch"],'14');
				$result[$key]['evening_data'] =  $this->get_food_data($value["evening_no_of_chart"],$value["food_cate"],$value["evening"],'13');
				$result[$key]['dinnner_data'] =  $this->get_food_data($value["dinnner_no_of_chart"],$value["food_cate"],$value["dinnner"],'11');
				$result[$key]['bedtime_data'] =  $this->get_food_data($value["bedtime_no_of_chart"],$value["food_cate"],$value["bedtime"],'9');
		
			}
			prd($result , 'rep after foreach');
			return $result;
		}
	}

	public function prepare_approved_charts($limits='',$table,$food_type,$arr){
		$this->db->select('id as fake_chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart,food_cate'); 		
		$this->db->from($table);
		$this->db->where('status',1);
		//$this->db->order_by("id", "RANDOM");
		if (in_array("Early Morning", $arr)){
			$this->db->where('morning !=','');
		}else{
			$this->db->where('morning',NULL);
		}
		if (in_array("Breakfast", $arr)){
			$this->db->where('breakfast !=','');
		}else{
			$this->db->where('breakfast',NULL);
		}
		if (in_array("Mid Meal", $arr)){
			$this->db->where('midmeal !=','');
		}else{
			$this->db->where('midmeal',NULL);
		}
		if (in_array("Lunch", $arr)){
			$this->db->where('lunch !=','');
		}else{
			$this->db->where('lunch',NULL);
		}
		if (in_array("Evening Snack", $arr)){
			$this->db->where('evening !=','');
		}else{
			$this->db->where('evening',NULL);
		}
		if (in_array("Dinner", $arr)){
			$this->db->where('dinnner !=','');
		}else{
			$this->db->where('dinnner',NULL);
		}
		if (in_array("Bed Time", $arr)){
			$this->db->where('bedtime !=','');
		}else{
			$this->db->where('bedtime',NULL);
		}
		$this->db->where('food_cate',$food_type);
		if($limits){
			$this->db->limit($limits);
		}
		$this->db->order_by("totalcalories", "desc");
		$query = $this->db->get();
		// echo $this->db->last_query();die;
		$result = $query->result_array();
		foreach ($result as $key => $value) {
		$result[$key]['morning_data'] =  $this->get_food_data($value["morning_no_of_chart"],$value["food_cate"],$value["morning"],'12');
		$result[$key]['breakfast_data'] =  $this->get_food_data($value["breakfast_no_of_chart"],$value["food_cate"],$value["breakfast"],'10');
		$result[$key]['midmeal_data'] =  $this->get_food_data($value["midmeal_no_of_chart"],$value["food_cate"],$value["midmeal"],'15');
		$result[$key]['lunch_data'] =  $this->get_food_data($value["lunch_no_of_chart"],$value["food_cate"],$value["lunch"],'14');
		$result[$key]['evening_data'] =  $this->get_food_data($value["evening_no_of_chart"],$value["food_cate"],$value["evening"],'13');
		$result[$key]['dinnner_data'] =  $this->get_food_data($value["dinnner_no_of_chart"],$value["food_cate"],$value["dinnner"],'11');
		$result[$key]['bedtime_data'] =  $this->get_food_data($value["bedtime_no_of_chart"],$value["food_cate"],$value["bedtime"],'9');
		}
		return $result;
	}

	public function get_cust_temp_chart($table,$cust_id,$chart_id){
		$this->db->select('*');
		$this->db->from("$table");
		$this->db->where('cust_id',$cust_id);
		$this->db->where('chart_id',$chart_id);
		$this->db->order_by('id','ASC'); // changed frpm t6otalcalories desc
		$query = $this->db->get();
		$result = $query->result_array();
		// pr( $this->db->last_query());
		return $result;
 
	}
	public function get_cust_chart_info($cust_id){
		// customer chart related info like meals start date etc with disease :: 
		$this->db->select('c.num_of_meal_suggested as no_of_meal ,c.meal_start_date , c.meal_end_date , c.meal_chart_id , c.renew_start_date , c.renew_end_date, life.disease_ids as disease');
		$this->db->from('customers_info as c');
		$this->db->join('customer_lifestyle as life', 'life.user_id = c.id', 'left');
		$this->db->where('c.id',$cust_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	public function get_col_finaltb($table,$selectcol,$where){
	 
		$this->db->select($selectcol);
		$this->db->where($where);
		$this->db->from($table);		
		$query = $this->db->get();
		// echo  $this->db->last_query();
		$result = $query->result_array();
		// $row = $query->row_array();
		if(empty($result)){
			return 0;
		}else{
			return $result;
		}
	}

	//  
	public function get_fc_data($no_of_chart=''){
		// get foodcombination data with food master one by one from new for checking
		$this->db->select('fc.id,fc.foodcombination_name as fcname ,fc.foodId_quantity as foodIdquan , fc.foodCategory as fcCat');
		$this->db->from('foodCombination_new as fc');
		if($no_of_chart != ''){
			$this->db->where('fc.no_of_chart',$no_of_chart);
		}
		$this->db->where('fc.verified = 0 OR fc.verified = 3 ');
		$this->db->order_by('rand()');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->row_array();

		// prd( $this->db->last_query());
		$foodidquan = unserialize($row['foodIdquan']); 
		foreach($foodidquan as $foodid=>$quantity){

			$finaldata[] = [$foodid=>$quantity];
			// get data from foodmaster
			 $respfinal[] = $this->get_foodmaster_byid($foodid ,$quantity);
		}
		#pr($row);

		$row['fcitems'] =$respfinal;
		#prd($row);
		return $row;
	}

	 // made by at:
	public function gettodaysmeal_fooditems($cust_id,$chart_id){
		// get customers meal items from chart of today
		$this->db->select('morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart');

		$this->db->from('customers_chart_final');
		$this->db->where('cust_id',$cust_id);
		$this->db->where('chart_id',$chart_id);
		$this->db->where('meal_date =',date('Y-m-d'));

		$query = $this->db->get();
		$result = $query->result_array();
			#pr($result,'original data');
		if(empty($result)){
			return 0;
		}else{
			foreach ($result as $key => $value) {
				$result[$key]['morning_data'] =  $this->get_food_data2($value["morning_no_of_chart"]);
				$result[$key]['breakfast_data'] =  $this->get_food_data2($value["breakfast_no_of_chart"]);
				$result[$key]['midmeal_data'] =  $this->get_food_data2($value["midmeal_no_of_chart"]);
				$result[$key]['lunch_data'] =  $this->get_food_data2($value["lunch_no_of_chart"]);
				$result[$key]['evening_data'] =  $this->get_food_data2($value["evening_no_of_chart"]);
				$result[$key]['dinnner_data'] =  $this->get_food_data2($value["dinnner_no_of_chart"]);
				$result[$key]['bedtime_data'] =  $this->get_food_data2($value["bedtime_no_of_chart"]);
		
			}
			//  pr( $this->db->last_query());
			 #prd($result , 'resp after getting foodmaster data');
			return $result;
			 
		}

	}

	public function get_food_data2($no_of_chart){
		// first get data from foodcombination
		$finaldata = array();
		$this->db->select('fc.id,fc.foodId_quantity as foodIdquan');
		$this->db->from('foodCombination_new as fc');
		$this->db->where('fc.no_of_chart',$no_of_chart);
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->row(); // fetching the row in std object
		#return ($result);
		$foodidquan = unserialize($row->foodIdquan); // getting the array of id quantity
		foreach($foodidquan as $foodid=>$quantity){

			$finaldata[] = [$foodid=>$quantity];
			// get data from foodmaster
			 $respfinal[] = $this->get_foodmaster_byid($foodid ,$quantity);
		}
		
		
		// pr($respfinal,'respfinal');
		// // pr($row);
		// pr($finaldata);
		return $respfinal;
	}



	public function get_foodmaster_byid($id,$quantity){
		$this->db->select('fm.id as foodId , fm.food_name,fm.food_category,fm.food_type,fm.calories,fm.protein,fm.carbohydrates,fm.fat,fm.sodium,fm.iron,fm.d_fibre,fm.unit,fm.portion , u.name as unit,fm.food_image'); 		
		$this->db->from('food_master as fm');
		$this->db->join('Units as u', 'fm.unit = u.id');
		$this->db->where('fm.id',$id);
		$query = $this->db->get();
		$result = $query->row_array();
		// add quantity here 
		$result['quantity'] = $quantity;
		return $result;
		 
	}

	
	public function get_food_data($no_of_chart,$food_cat,$food_name,$placement){
		//donotdelete 
		$this->db->select('fc.id,fc.foodId,fc.quantity,fm.*,fc.upperplacement');
		$this->db->from('foodCombination as fc');
		$this->db->where('fc.no_of_chart',$no_of_chart);
		// $this->db->where('fc.foodCategory',$food_cat);
		$this->db->where('fc.upperplacement',$placement);
		$this->db->where('fc.foodcombination_name',$food_name);
		$this->db->join('food_master as fm','fm.id=fc.foodId');
		$this->db->group_by('fc.foodId'); 

		$query = $this->db->get();
		$result = $query->result_array();
		// for test  // if food combinatination doesnot have data it will not give result
		//echo "----------------*get food data foodcombination*-------------------<br>";
		// pr($no_of_chart);
		// pr($food_name);
		pr($this->db->last_query());
		// pr($result);
		// echo "----------------**-------------------<br>";
		return ($result);
	}

	public function final_customer_chart($limits,$cust_id='',$chart_id=''){
	//updated by at new 
		// if limit = 0 it will give full chart
		$this->db->select('id,chart_id,day,meal_date,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,food_cate'); 	
		// $this->db->select('*');
		$this->db->from('customers_chart_final');
		$this->db->where('cust_id',$cust_id);		
		$this->db->where('chart_id',$chart_id);
		$this->db->where('meal_date >=',date('Y-m-d'));		
		$this->db->where('status',1);
		if($limits !=0 ){
			$this->db->limit($limits);
		}
		$query = $this->db->get();
		// prd( $this->db->last_query());
		$result = $query->result_array();
		return $result;
	}
	public function final_customer_chart_for_reallot($limits,$cust_id='',$chart_id=''){
		//updated by at new 
			// if limit = 0 it will give full chart
			$this->db->select('id,chart_id,day,meal_date,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,food_cate'); 	
			// $this->db->select('*');
			$this->db->from('customers_chart_final');
			$this->db->where('cust_id',$cust_id);		
			$this->db->where('chart_id',$chart_id);	
			$this->db->where('status',1);
			if($limits !=0 ){
				$this->db->limit($limits);
			}
			$query = $this->db->get();
			// prd( $this->db->last_query());
			$result = $query->result_array();
			return $result;
	}
	public function final_customer_chart_old($limits='',$cust_id=''){
		// made by old d  
		
			$this->db->select('id as chart_id,morning,breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart,food_cate'); 		
			$this->db->from('final_customer_chart');
 
			if($cust_id){
			$this->db->where('cust_id',$cust_id);
			}
			
			$this->db->where('status',1);
			if($limits){
				$this->db->limit($limits);
			}
			
			$query = $this->db->get();
			// prd( $this->db->last_query());
			$result = $query->result_array();
			foreach ($result as $key => $value) {
				$result[$key]['morning_data'] =  $this->get_food_data($value["morning_no_of_chart"],$value["food_cate"],$value["morning"],'12');
				$result[$key]['breakfast_data'] =  $this->get_food_data($value["breakfast_no_of_chart"],$value["food_cate"],$value["breakfast"],'10');
				$result[$key]['midmeal_data'] =  $this->get_food_data($value["midmeal_no_of_chart"],$value["food_cate"],$value["midmeal"],'15');
				$result[$key]['lunch_data'] =  $this->get_food_data($value["lunch_no_of_chart"],$value["food_cate"],$value["lunch"],'14');
				$result[$key]['evening_data'] =  $this->get_food_data($value["evening_no_of_chart"],$value["food_cate"],$value["evening"],'13');
				$result[$key]['dinnner_data'] =  $this->get_food_data($value["dinnner_no_of_chart"],$value["food_cate"],$value["dinnner"],'11');
				$result[$key]['bedtime_data'] =  $this->get_food_data($value["bedtime_no_of_chart"],$value["food_cate"],$value["bedtime"],'9');
			}
			return $result;
	}
	public function skip_bedtime_meal(){
		
		$this->db->select('morning,breakfast,midmeal,lunch,evening,dinnner,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,morning_no_of_chart,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,dinnner_no_of_chart,food_cate'); 		
		$this->db->from('skip_bedtime');
		$this->db->order_by('totalcalories', 'asc');
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}

	public function all_food(){
		$this->db->select('fm.* ,u.name as unit '); 		
		$this->db->from('food_master as fm');
		$this->db->join('Units as u', 'fm.unit = u.id');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function skip_mrng_meal(){
		$this->db->select('breakfast,midmeal,lunch,evening,dinnner,bedtime,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,bedtime_no_of_chart,dinnner_no_of_chart,food_cate'); 	
		$this->db->from('skip_mrng');
		$this->db->order_by('totalcalories', 'asc');
		// $this->db->limit(1000,4000);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function skip_mrng_bedtime_meal(){
		$this->db->select('breakfast,midmeal,lunch,evening,dinnner,totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre,evening_no_of_chart,breakfast_no_of_chart,midmeal_no_of_chart,lunch_no_of_chart,dinnner_no_of_chart,food_cate'); 		
		$this->db->from('skip_mrng_bedtime');
		$this->db->order_by('totalcalories', 'asc');
		// $this->db->limit(1000,4000);
		$query = $this->db->get();

			$result = $query->result_array();
			return $result;
	}



	public function truncate_table(){
		$table = array(
		'final_chart_900_1000','final_chart_1000_1100','final_chart_1100_1200','final_chart_1200_1300','final_chart_1300_1400','final_chart_1400_1500','final_chart_1500_1600','final_chart_1600_1700','final_chart_1700_1800','final_chart_1800_1900','final_chart_1900_2000','final_chart_2000_2100','final_chart_2100_2200','final_chart_2200_2300','final_chart_2300_2400','final_chart_2400_2500','final_chart_2500_2600','final_chart_2600_2700','final_chart_2700_2800','final_chart_2800_2900','final_chart_3000_3100','final_chart_3100_3200'

					);
		foreach ($table as  $value) {
				$this->db->truncate($value);
		}
	}

	public function Allmeal_get_records(){
		
		$this->db->select('*'); 		
		$this->db->from('submit_manuall_chart');
		// $this->db->where('morning !=','');
		// $this->db->where('breakfast!=','');
		// // $this->db->where('midmeal !=','');
		// $this->db->where('lunch !=','');
		// // $this->db->where('evening !=','');
		// $this->db->where('dinnner !=','');
		// $this->db->where('bedtime !=','');
		$this->db->where('status',1);
		$this->db->limit(1);
		$this->db->order_by('id','asc');
		$query = $this->db->get();

		$result = $query->result_array();
		//pr($result);die;
		// foreach ($result as $key => $value) {
		// 	$result[$key]['morning_data'] =  $this->get_food_data($value["morning_no_of_chart"],$value["food_cate"],$value["morning"],'12');
		// 	$result[$key]['breakfast_data'] =  $this->get_food_data($value["breakfast_no_of_chart"],$value["food_cate"],$value["breakfast"],'10');
		// 	// $result[$key]['midmeal_data'] =  $this->get_food_data($value["midmeal_no_of_chart"],$value["food_cate"],$value["midmeal"],'15');
		// 	$result[$key]['lunch_data'] =  $this->get_food_data($value["lunch_no_of_chart"],$value["food_cate"],$value["lunch"],'14');
		// 	// $result[$key]['evening_data'] =  $this->get_food_data($value["evening_no_of_chart"],$value["food_cate"],$value["evening"],'13');
		// 	$result[$key]['dinnner_data'] =  $this->get_food_data($value["dinnner_no_of_chart"],$value["food_cate"],$value["dinnner"],'11');
		// 	$result[$key]['bedtime_data'] =  $this->get_food_data($value["bedtime_no_of_chart"],$value["food_cate"],$value["bedtime"],'9');
		// }
		$update= array('status' =>'5');
		$this->db->where('id',$result[0]['id']);
		$this->db->update('submit_manuall_chart',$update);
		return $result;
	}

	public function search_fc_in_fcnew($table , $idquan){
		$foodcount = count($idquan);
		$this->db->select('*');

		$this->db->where('food_item_no',$foodcount);
		foreach($idquan as $key=>$string){
			$this->db->like('fcidquan', "$string", 'both'); 
		}
		$this->db->from($table);		
		$query = $this->db->get();
		 #return $this->db->last_query();
		$result = $query->result_array();
		return $result;

 
	}
	public function get_mealtime_user($cust_id)
	{	$this->db->select('wakeup_time,breakfast_time,midmeal_time	,lunch_time	, evening_time,dinner_time,	sleep_time');

		$this->db->where('user_id',$cust_id);
		$this->db->from('customer_lifestyle');		
		$query = $this->db->get();
		 #return $this->db->last_query();
		$result = $query->result_array();
		return $result;
 
	}
}