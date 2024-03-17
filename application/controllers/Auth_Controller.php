<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load_model('driver', 'sma_drivers');
        $this->load->model('Auth_model', 'auth');
    }

    protected function load_model($alias, $table)
    {
        $this->load->model("MY_Model", $alias);
        $this->$alias->set_table($table);
    }


    function load_view($view, $data = null, $meta = null)
    {
        $this->load->view('auth/auth_header');
        $this->load->view("auth/$view", $data);
        $this->load->view('auth/auth_footer');
    }


    public function login()
    {
        if (isAuthenticated()) {
            redirect('dashboard');
        }
        $this->load_view('login');
    }

    public function app_login($token)
    {
        $this->load_view('app_login', ['token' => $token]);
    }

    public function login_auth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->form_validation->run('auth/login')) {
            $res = $this->auth->authenticate($email, $password);
            if ($res['status']) {
                $login = login($res['user']);
                if ($login) {
                    $this->auth->update(['is_expired' => 1],[],[]);
                }
                echo json_encode(['status' => $login, 'redirect_url' => base_url('dashboard')]);
            } else {
                echo json_encode($res);
            }
        } else {
            echo json_encode(['status' => false, 'error' => $this->form_validation->error_array()]);
        }
    }

    public function app_auth()
    {
        $token = $this->input->post('token');
        $res = $this->auth->authenticate_by_token($token);
        sleep(10);
        if ($res['status']) {
            echo json_encode(['status' => login($res['user']), 'redirect_url' => base_url('dashboard')]);
        } else {
            echo json_encode($res);
        }
    }



    public function register()
    {
        $this->load->view('auth/auth_header');
        $this->load->view("misc/under_development");
        $this->load->view('auth/auth_footer');
    }

    public function logout()
    {
        logout();
        redirect('');
    }
}
