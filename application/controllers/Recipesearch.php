<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipesearch extends CI_Controller {
function index()
{
$this->load->view('User/recipe_search');
// $this->load->database();
}
function fetch()
{
	//pr($_GET);die;
	$this->load->model('recipesearch_model');
	$this->load->model('Dietmodel');
	$this->load->library("pagination");
	// get food prefrence 
$user_id = $_SESSION['id'];
$prefrence  = $this->db->select('food_prefrence')->where('user_id',$user_id)->get('customer_lifestyle')->row();
$food_pref = $prefrence->food_prefrence;
if($food_pref ==1){
	$pref_array = array(1);
}elseif($food_pref ==2){
	$pref_array = array(1,2,3);
}else{
	$pref_array = array(1,3);
}

$query = '';

if($this->input->get('query'))
{
 $query = $this->input->get('query'); 
}
// echo $query;die;
$config = array();
        $config["base_url"] = base_url() . "recipesearch/fetch";
        $config["total_rows"] = count($this->recipesearch_model->record_count($pref_array,$query));
        // pr($config);die;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["results"] = $this->recipesearch_model->get_receipe($config["per_page"], $page,$pref_array,$query);
        // pr($data["results"]);die;
        $data["links"] = $this->pagination->create_links();






$this->load->view('User/recipe',$data);

 }
}