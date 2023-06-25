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
$burl = base_url();
$output = '';
$query = '';
$this->load->model('recipe_search');
if($this->input->post('query'))
{ $query = $this->input->post('query'); }
$data = $this->recipe_search->fetch_data($query);
$output .= '<div class="row mt-2" id="">';
if($data->num_rows() > 0)
{ foreach($data->result() as $row)
{ $output .= '
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12  mt-3">
<div class="card shadow-sm" id="recipe_cards">
<img class="card-img-top" src="'.$burl.'user/new_assets/img/recipes/pic-1.png" alt="Card image cap">
<div class="card-body">
<a href="'.$burl.'User/recipe_details/'.$row->id.'" class="ngh"><h6 class="card-title">'.$row->food_name.'</h5></a>
<!--<p class="card-text">'.$row->food_name.'</p>-->
<span class="text-right d-flex justify-content-end"><img src="'.$burl.'user/new_assets/img/recipes/online-sign.png" alt="" style="width: 15px;height: 15px;"></span>
</div>
</div>
</div>'; }
}
else
{
$output .= '<div class="col-xl-12 col-lg-6 col-md-6 col-sm-12  mt-3"><h6><center>Recipe not found </center></h6></div>';
}
$output .= '</div>';
echo $output;
 }
 
}