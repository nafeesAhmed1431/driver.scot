<?php
class Auth_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->set_table("sma_users");
    }

    public function authenticate($email, $password)
    {
        if ($user = $this->row(['email' => $email])) {
            if ($this->verify_password($user->password, $password)) {
                return ($user->active) ? ['status' => true, 'user' => $user] : ['status' => false, 'error' => ['active' => 'Your Account is Blocked by Admin....']];
            } else {
                return ['status' => false, 'error' => ['password' => 'Incorrect Password...']];
            }
        } else {
            return ['status' => false, 'error' => ['email' => 'No User Found with this Email...']];
        }
    }

    private function verify_password($db_password, $user_password)
    {
        $salt = substr($db_password, 0, 10);
        $calc_password = $salt . substr(sha1($salt . $user_password), 0, -10);
        return $calc_password == $db_password;
    }
}
