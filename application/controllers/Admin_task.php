<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
class Admin_task extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custommodel');
		$this->load->model('Dietmodel');
		$this->load->model('Facebookreview_model');
	}
	// task correction
	public function task_data_correction($id)	{
		$Auth = $_SESSION['Token'];

		$url = 'Api/Userdatadetails';
		$param = array('user_id' => $id);
		$res = api_call($url, $Auth, $param);

		$url2 = 'Api/UserAllPlanDetails';
		$param2 = array('user_id' => $id);
		$res2 = api_call($url2, $Auth, $param2);
		// prd($res2);
		if (isset($_SESSION['Token'])) {
			$data['user_data'] = $res->data;
			$data['user_plans'] = $res2->data;
	 
			// $data['message'] = $this->Dietmodel->check_seven_day_call(); // empty call 
			// adminloadview('tasks/task-data-correction.php', $data);
			$this->load->view('Admin/tasks/task_data_correction.php', $data);
		} else {
			redirect('Admin/index');
		}


	}
	 public function renewshift_data_correction(){
			pr($_POST);
			if(isset($_POST['renewshiftmanually']) && $_POST['renewshiftmanually'] == 'Shift Renew Manually' ){
	 
				$cid = $_POST['cid'];
				$rplanid =$_POST['rplanid'];
				if($rplanid != 0 || $rplanid != NULL){

					$data = array(
												'meal_start_date' => $_POST['rstartdate'],
												'meal_end_date' => $_POST['renddate'],
												'meal_chart_id' => $_POST['rchartid'],
												'plan_id'=>$_POST['rplanid']
												);
					$resp = $this->Custommodel->update_common($data,'customers_info','id', $cid);
					if($resp == 1){
						$data = array(
							'renew_start_date' => NULL,
							'renew_end_date' => NULL,
							'renew_meal_chart_id' => 0	,
							'renew_plan_id'=>0
							);
						$resp2 = $this->Custommodel->update_common($data,'customers_info','id', $cid);
						if($resp2 == 1){	redirect('Admin/task_data_correction/'.$cid);}else{echo " Error in Renew update";}
					}else{
						echo "Error Please check";
					}
				}


			}





	 }



	//--- task page controllers 

	public function task_first_call()	{
		// at
		// get user list on condition - first call 
		$url = 'Api/user_list';
		$Auth = $_SESSION['Token'];
		$param = array('type' => 'first_call');
		$res = api_call($url, $Auth, $param);
		// prd($res);
		if (isset($_SESSION['Token']) && $res->response_code == 0) {
			$data['user_data'] = $res->user_data;
			// pr($data);
			// $data['message'] = $this->Dietmodel->check_seven_day_call(); // empty call 
			adminloadview('tasks/task-first-call.php', $data);
		} else {
			redirect('Admin/index');
		}
	}


	public function task_plans_today(){

		// at
		// get user list on condition - plan_to_sent
		$url = 'Api/user_list';
		$Auth = $_SESSION['Token'];
		$param = array('type' => 'plan_to_sent');
		$res = api_call($url, $Auth, $param);
		// prd($res);
		if ($_SESSION['Token'] && $res->response_code == 0) {
			$data['user_data'] = $res->user_data;
			// $data['message'] = $this->Dietmodel->check_seven_day_call();
			$this->load->view('Admin/task-plans-today.php', $data);
		} else {
			redirect('Admin/index');
		}
	}


	public function task_call_schedule()	{
 
		if ($_SESSION['Token']) {
			$data['message'] = $this->Dietmodel->check_seven_day_call();
			$this->load->view('Admin/task-call-schdule.php', $data);
		} else {
			redirect('Admin/index');
		}
	}


	public function task_support()	{
		if ($_SESSION['Token']) {
			$data['message'] = $this->Dietmodel->check_seven_day_call();
			$this->load->view('Admin/task-support-questions.php', $data);
		} else {
			redirect('Admin/index');
		}
	}

	public function task_weight_update()	{
		if ($_SESSION['Token']) {
			$this->load->view('Admin/task-support-questions.php', $data);
		} else {
			redirect('Admin/index');
		}
	}

	public function task_inch_update()	{
		if ($_SESSION['Token']) {
			$this->load->view('Admin/task-support-questions.php', $data);
		} else {
			redirect('Admin/index');
		}
	}

	public function task_weight_to_update()	{
		if ($_SESSION['Token']) {
			$this->load->view('Admin/task-support-questions.php', $data);
		} else {
			redirect('Admin/index');
		}
	}

	public function task_inch_to_update()	{
		if ($_SESSION['Token']) {
			$this->load->view('Admin/task-support-questions.php', $data);
		} else {
			redirect('Admin/index');
		}
	}
}
