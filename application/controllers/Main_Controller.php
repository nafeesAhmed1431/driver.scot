<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        echo "reached index";
    }

    function dashboard()
    {
        $this->load_view('dashboard',[],[]);
    }
}
