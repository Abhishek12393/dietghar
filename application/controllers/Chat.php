<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Chat extends BaseController {

	function __construct() {
        parent::__construct();
    }
	public function index(){
       $this->load->view('Chat/index.php');
	}
     public function chat(){
     	$this->load->view('Chat/chat.php');
    }
    public function Userchat(){
        $this->load->view('Chat/userchat.php');

    }
    public function WhatsAppchat(){
        $this->load->view('Chat/WhatsAppchat.php');

    }
}
	