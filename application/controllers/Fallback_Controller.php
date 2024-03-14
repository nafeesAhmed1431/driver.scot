<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fallback_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function not_found_fzf()
	{

		$this->load->view('errors/fzf.php');
	}
}
