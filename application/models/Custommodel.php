<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Custommodel extends CI_Model{

	
public function check() {          
		$query = $this->db->query('SELECT * FROM admn_users') ;
		$result = $query->result_array();
		print_r($result);
}  
public function insert_common($table,$data){
	$this->db->insert($table,$data);
	#pr( $this->db->last_query());
	return $this->db->insert_id();
}
				
public function insert_common_batch($table,$data){
	$insert = $this->db->insert_batch($table, $data);
	#pr( $this->db->last_query());
		if($insert > 0){
			return  count($data);
	}else{
			return  0;
	}
}
// updated by at
// update table data 
public function update_common($data,$table,$col_where,$col_val_where){
	
	$this->db->where($col_where,$col_val_where);
	if($this->db->update($table,$data)){
		return true;
	}else{
	
		return false;
	}
}

// alter and add column

public function add_col_common($tablename,$colname , $comment='new column' , $after = ''){
	
	if($after != '' ){
		$after = 'AFTER `'.$after.'`;';
	} 

	$sqladdcol = "ALTER TABLE `$tablename` ADD `$colname` INT(1) NOT NULL COMMENT '$comment' $after";
 if($this->db->query($sqladdcol)){
	return true;
 }else{
	 return false;
 }
	 
}
// check if a column exist or not
public function checkcol($tablename ,$colname){
	$query =   $this->db->query("	SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='dietsoft_admin' AND `TABLE_NAME`='$tablename' And `COLUMN_NAME` = '$colname' ");
	//$query =   $this->db->query("	SELECT * From `final_chart_1_verified` LIMIT 1 ");
	 
	return empty($query->result_array()) ? 'false' : 'true';
}
// delete queries func
public function delete_common($where,$id,$table){
	$this->db->where($where,$id);
	$this->db->delete($table);
}
public function delete_common_r($where,$id,$table){
	$this->db->where($where,$id);
	$this->db->delete($table);
	return $this->db->affected_rows();
}
// delete by id single or multiple id
public function delete_commonbyid($col,$id,$tablename){
 
	if(is_array($id)){
			$this->db->where_in($col, $id);
	}else{
			$this->db->where($col, $id);
	}
	$delete = $this->db->delete($tablename);
	return $delete?'true':'false';
}


# select queries function
// to count rows on the basis of condition ::
public function count_common($table,$where){
	$this->db->select('id');
	$this->db->where($where);
	$this->db->from($table);		
	$query = $this->db->get();
	$result = $query->num_rows();
	return $result;
} 
#select by group by  col 
public function Select_groupby($table,$disctinctcol){
	$sql="Select  * FROM $table Group By $disctinctcol Order By id ASC";

  $query = $this->db->query($sql);
	$result = $query->result_array();
	return $result;
}
 
public function Select_common_col_orderby($table,$col='*',$obcol){
	$this->db->select($col);
	$this->db->from($table);
	$this->db->order_by($obcol, "asc");				
	$query = $this->db->get();
	$result = $query->result_array();
	return $result;
}
 
public function Select_common($table){
	$this->db->select('*');
	$this->db->from($table);		
	$query = $this->db->get();
	$result = $query->result_object();
	return $result;
}
public function Select_common_where($table,$col,$colvalue){
	$this->db->select('*');
	$this->db->where($col,$colvalue);
	$this->db->from($table);		
	$query = $this->db->get();
	// return $this->db->last_query();
	$result = $query->result_array();
	return $result;
}

public function Select_col_where($table,$col,$where,$wherevalue){
	$this->db->select($col);
	$this->db->where($where,$wherevalue);
	$this->db->from($table);		
	$query = $this->db->get();
	// return $this->db->last_query();
	$result = $query->result_array();
	return $result;
}
 	
public function Select_common_where_array($table,$param){
	#$parm should be array
	$this->db->select('*');
	foreach($param as $key => $value ){
		$this->db->where($key,$value);
	}
	$this->db->from($table);		
	$query = $this->db->get();
		// pr($this->db->last_query());
	$result = $query->result_array();
	if(!empty($result)){
		return $result;
	}else{
		return 'false';
	}
	
}

public function select_common_wherein_array($table,$col,$param){
	$this->db->select('*');
	$this->db->from($table);		
	$this->db->where_in($col,$param);
	$query = $this->db->get();
		//pr($this->db->last_query());
	$result = $query->result_array();
	if(!empty($result)){
		return $result;
	}else{
		return 'false';
	}
}

public function Select_common_where_object($table,$where,$id){
$this->db->select('*');
$this->db->where($where,$id);
$this->db->from($table);		
$query = $this->db->get();
$result = $query->row();
return $result;
}

public function Select_common_orderby($table,$col){
	$this->db->select('*');
	$this->db->from($table);
	$this->db->order_by($col, "desc");		
	$query = $this->db->get();
	$result = $query->result_array();
	// return  $this->db->last_query();
	return  $result;
}

public function Select_common_orderby_limit($table,$orderby,$limit){
	$this->db->select('*');
	$this->db->from($table);
	$this->db->order_by($orderby, "desc");		
	$this->db->limit($limit);
	$query = $this->db->get();
	$result = $query->result_array();
	return  $result;
}

public function Select_common_limit_offset($table,$oderbyCol,$limit ,$offset,$where = '1=1'){
	$this->db->select('*');
	$this->db->from($table);
	$this->db->where($where);
	$this->db->order_by($oderbyCol, "asc");		
	$this->db->limit($limit,$offset);
	$query = $this->db->get();
 
	$result = $query->result_array();
 
	return  $result;
}
// select functions ends ::


public function Login($post){
	$this->db->select('*');
	$this->db->where('username' , $post->username);
	$this->db->where('password' , md5($post->password));
	$this->db->from('admn_users');		
	$query = $this->db->get();
	$result = $query->row();
	return $result;
}

public function getDay($table,$where,$id){
$this->db->select('id,customer_id as customerId');
$this->db->where($where,$id);
$this->db->from($table);		
$query = $this->db->get();
$result = $query->result_array();
return $result;
}

public function last_measurement($id){
	$this->db->select('*');
	$this->db->where('cust_id',$id);
	$this->db->from('measurement_history');
	$this->db->order_by('id', "desc");
	$this->db->limit('1');		
	$query = $this->db->get();
	$result = $query->result_array();
	return $result;
}

	public function get_receipe_data(){
		$this->db->select('*');
		$this->db->from('food_master');
		$this->db->order_by('rand()');
		$this->db->limit('20');		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

}