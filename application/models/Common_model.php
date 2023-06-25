<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model{
 # USING IN CRON CONTROLLER
 
 // for slect
  public function custquery($query) {          
    $query = $this->db->query($query);
  
    if(is_bool($query)){
      return $query;
    }else{
      $result = $query->result_array();
      return $result;
    }
  } 

  
// for select on index 0
public function custquery0($query) {          
  $query = $this->db->query($query);
  $result = $query->result_array();
  // print_r($result);
  return $result[0];
} 
  //for insert update delete
  public function custqueryiud($query) {          
    $query = $this->db->query($query);
    // $result = $query->result_array();
    // print_r($result);
    return $query;
  }  

}