<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invitation_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invitation_model', 'invitation');
    }

    function index()
    {
        $data['total'] = $this->invitation->count();
        $data['pending'] = $this->invitation->count(['status' => 0]);
        $data['approved'] = $this->invitation->count(['status' => 1]);
        $data['rejected'] = $this->invitation->count(['status' => 2]);
        $data['invitations'] = $this->invitation->all_invitations();
        $this->load_view('Invitation/index', [], $data);
    }
}
