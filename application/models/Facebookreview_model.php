<?php

/**
 * @author lolkittens
 * @copyright 2015
 */
class Facebookreview_model extends CI_Model {

    public $tableName = 'fb_review';
    public $alias = 'FB';
    public $sortBy = 'FB.id';
    public $sortOrder = 'ASC';
    public $fieldAlias = array('id' => 'FB', 'name' => 'FB', 'fb_id' => 'FB', 'rating' => 'FB', 'review_on' => 'FB', 'image' => 'FB', 'review' => 'FB','status' => 'FB');

    function select() {
        /* for search list */

        $this->arrLikeInputs = array('name','fb_id');
		$this->arrLike = array();
		
        $this->arrWhereInputs = array('status','rating');
        $this->arrWhere = array();
		
				
        /* if(isset($this->langName) && $this->langName != '')
          {
          $this->custLikeStr = "( L.langName LIKE '%".trim($this->input->post('langName'))."%' )";
          } */

        if ($this->input->post('record_per_page') != '') {
            $records_per_page = $this->input->post('record_per_page');
        } else {
            $records_per_page = ROWS_PER_PAGE;
        }
        if (!(isset($this->record_per_page) && $this->record_per_page != '')) {
            $this->record_per_page = ROWS_PER_PAGE;
        }
        $this->arrLike = $this->get_like();
        $this->arrWhere = $this->get_where();

        $this->arrWhere['FB.status'] = 1;

        /* for search list */
        if ($this->countQuery == 1) {
            $this->db->from($this->tableName . ' ' . $this->alias);
            $this->countSelectFields = 'COUNT(FB.id) as cnt';
            $result['count'] = $this->get_count();
        }

        $result['resultarr'] = $this->get_result();
        $result['record_per_page'] = $records_per_page;

        return $result;
    }

    function getSingleReview($id = '') {

         $this->db->select('*');
    $this->db->from('fb_review'); 
        // $this->arrJoins[] = array('customer C', 'C.customerid = FB.customerid','');
          $this->db->where('id',$id);
        $this->countQuery = 0;

       $query = $this->db->get();
    $result = $query->row();
		return $result;
    }

    function get_list() {

        $this->selectFields = "FB.*";
        // $this->arrJoins[] = array('customer C', 'C.customerid = FB.customerid','');
        
        $this->countQuery = 1;
        $result = $this->select();

        return $result;
    }

   public function insert_update($data, $id = '') {
        
        if ($id != '') {
            $this->db->where('id', $id);
            $this->db->update('fb_review', $data);
        } else {
            $this->db->insert('fb_review', $data);
            // echo $this->db->last_query();die;
        }
        return;
    }

    function delete($id) {
        $sel_arr = $this->input->post('sel_arr');
        if (!empty($sel_arr)) {
            foreach ($sel_arr as $row) {
                $this->db->where('id', $row);
                $this->db->update('fb_review', array('isDeleted' => 1));
            }
        } else {
            $this->db->where('id', $id);
            $this->db->update('fb_review', array('isDeleted' => 1));
        }
        return 1;
    }


    function updateReviewInDb($review_data,$review_autoId){

       // echo "<pre>";print_r($review_data);die;
        $this->db->where('id', $review_autoId);
        $this->db->update('fb_review', $review_data);
       // echo $this->db->last_query();die;
        return $review_autoId;
    }

    //-------for Check Customer Allready exist?-----------
    function check_custid($id) {
        
        $this->db->where('fb_id',$id);
		$query = $this->db->get('fb_review');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
    }
	
	/* function getAllData(){
		$this->db->select('*');
        $this->db->from('fb_review');
		$this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    } */
	
	function getAllData() {
	$this->db->select('*');
	$this->db->from('fb_review'); 
	//$this->db->where('status', 1);
	
	$query = $this->db->get();
	$result = $query->result_array();

    //echo "<pre>";print_r($result);die;
	return $result;
	}
	
	function record_count() {
		return $this->db->where('status',1)->from("fb_review")->count_all_results();
	}
}

        

?>
