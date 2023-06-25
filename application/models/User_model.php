<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
	// all functions are active // 05052022 //
	public function User_all(){
		//all user list
		$this->db->select('c.id ,c.first_name ,c.last_name ,c.is_payment_done ,c.measurment_done ,c.first_call_done ,c.mobile_no ,c.gender');
		$this->db->from('customers_info as c');
		$this->db->order_by("c.id","DESC");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;

	}
	public function User_fornotfilled(){
		//all user list
		$this->db->select('c.id ,c.first_name ,c.last_name ,c.is_payment_done ,c.measurment_done ,c.first_call_done ,c.mobile_no ,c.gender, c.lastButtonId as stepper');
		$this->db->from('customers_info as c');
		$this->db->where("c.lastButtonId != 'stepper_final'");
		$this->db->order_by("c.id","DESC");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;

	}
	public function user_expired(){
		// user which have the expired plan
		$this->db->select('c.id as user_id, c.mobile_no , c.first_name , c.last_name,  c.meal_start_date , c.meal_end_date');
		$this->db->from('customers_info as c');
		$this->db->where('c.meal_end_date < ', date('Y-m-d'));
		$this->db->or_where('c.is_plan_expired',1);
		$this->db->order_by("c.meal_end_date","DESC");
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;

	}
	public function user_contactform(){
		// contact form data // tb contact
		$this->db->select('c.*');
		$this->db->from('contact as c');
		$this->db->order_by("c.updated_dt","DESC");
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;

	}

	public function user_list_by_disease($disease){
 
		$this->db->select('c.id as cid ,  c.mobile_no ,  c.first_name , c.last_name ,  cl.*');
		$this->db->from('customers_info as c');	
		$this->db->join('customer_lifestyle as cl', 'cl.user_id = c.id', 'left');	
		foreach($disease as $key => $value ){
			$this->db->where('cl.'.$key,$value);
		}
		$query = $this->db->get();
			// pr($this->db->last_query());
		$result = $query->result_array();
		if(!empty($result)){
			return $result;
		}else{
			// return 'false';
			return $this->db->last_query();
		}

	}
	public function UserCharthistory_by_userid($cid){
 
		$this->db->select('c.id as cid ,c.*');
		$this->db->from('customers_chart_history as c');	
		$this->db->where('c.cust_id',$cid);
		$query = $this->db->get();
			// pr($this->db->last_query());
		$result = $query->result_array();
		if(!empty($result)){
			return $result;
		}else{
			 return 'false';
			// return $this->db->last_query();
		}

	}

	public function userdata_by_id($cid){

		$this->db->select("c.id as cid , cl.is_thyroid , cl.thyroid ,cl.is_diabetes ,cl.diabetes ,cl.heart_ailment ,cl.bp ,cl.pcos ,cl.hypertension , cl.additional_info , cl.usuall_diet , cl.food_allergy");
		$this->db->from('customers_info as c');
		$this->db->join('customer_lifestyle as cl', 'cl.user_id = c.id', 'left');
		$this->db->where('c.id',$cid);
		$query = $this->db->get();
		$result = $query->result_array();
		if(!empty($result)){
			return $result;
		}else{
			 return 'false';
			// return $this->db->last_query();
		}

	}




	public function userdata($user_type){
		// for user data 1 => paid user
		$this->db->select('*,c.id as user_id');
		$this->db->from('customers_info as c');
		$this->db->join('Plan as p', 'p.user_id = c.id', 'left');
		$this->db->where('c.user_type',$user_type);
		$this->db->where('p.plan_status',1);
		$this->db->order_by("p.purchase_date","DESC");
		// $this->db->order_by("c.id","DESC");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	# user transaction data with user name and address
	public function user_transaction($cid , $orderid){
		$this->db->select('c.first_name , c.last_name , c.mobile_no as mob ,  ca.house_no , ca.address ,  ca.city , ca.state ,  ca.pincode , th.*, th.id as invoice , p.plan_name , p.plan_amount  ');
		$this->db->from('customers_info as c');
		$this->db->join('customer_address as ca', 'ca.customer_id = c.id', 'left');
		$this->db->join('transaction_history as th', 'th.user_id = c.id', 'left');
		$this->db->join('Plan as p', 'p.user_id = c.id', 'left');
		$this->db->where('c.id',$cid);
		$this->db->where('th.order_id',$orderid);
		$this->db->where('p.order_id',$orderid);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function userdata_unpaid(){
		$this->db->select('*,c.id as user_id');
		$this->db->from('customers_info as c');
		$this->db->where('c.user_type',2);
		$this->db->order_by("c.creation_date","DESC");
		$this->db->order_by("c.id","DESC");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function userdata_forrenew(){
		// for renew get active and expired user list
		$this->db->select('*,c.id as user_id');
		$this->db->from('customers_info as c');
		$this->db->where('c.is_plan_expired',2);
		$this->db->or_where('c.is_plan_expired',1);
		$this->db->order_by("c.id","DESC");
		$query = $this->db->get();
		$result = $query->result_array();
		// prd( $this->db->last_query());
		return $result;
	}
				
	public function user_list($where){
		 // dynamic where condition // fixed columns for execution 
		$this->db->select('ci.id  as user_id , ci.mobile_no as mb, ci.gender as gender , ci.first_name as fn , ci.last_name as ln , ci.dob as dob ,ci.first_call_done, p.plan_name , p.purchase_date  ');
		$this->db->where($where);
		$this->db->from('customers_info as ci');
		$this->db->join('Plan as p', 'p.user_id = ci.id', 'left');
		$this->db->order_by("p.purchase_date","DESC");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		// return $this->db->last_query();
	}

	public function get_dietprogress($uid,$chartid){

		$date = date('Y-m-d');
		$query = "SELECT (SELECT count(*) FROM customers_chart_final where cust_id = $uid && chart_id = $chartid ) as total , (SELECT count(*) FROM customers_chart_final where cust_id = $uid && chart_id = $chartid && meal_date<=  '$date'  ) as completed ";
		// pr($query);
		$query = $this->db->query($query);
  
    if(is_bool($query)){
      return $query;
    }else{
      $result = $query->result_array();
      return $result[0];
    }

 
	}

	public function userfinalchartid($id){
		// get chart id 
		$this->db->select('c.meal_chart_id ,  c.renew_meal_chart_id');
		$this->db->from('customers_info as c');
		$this->db->where("c.id",$id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0];
	}

	public function getflags_for_cust(){
		$this->db->select('*');
		$this->db->where('id', '1');
		$this->db->from('customers_flags');
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0];
	}


	

}