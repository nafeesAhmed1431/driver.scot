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
        $this->load_view('invitation/index', ['html' => $this->get_content()]);
    }

    function get_content()
    {
        $data['total'] = $this->invitation->count();
        $data['pending'] = $this->invitation->count(['status' => 0]);
        $data['approved'] = $this->invitation->count(['status' => 1]);
        $data['rejected'] = $this->invitation->count(['status' => 2]);
        $data['invitations'] = $this->invitation->all_invitations();
        $res = $this->load->view('invitation/main_content', $data, TRUE);
        if ($this->input->is_ajax_request()) {
            return $this->response($res, 200, false);
        } else {
            return $res;
        }
    }
}
