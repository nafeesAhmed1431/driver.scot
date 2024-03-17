<?php
class Auth_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->set_table("sma_users");
    }

    public function authenticate($email, $password): array
    {
        $user = $this->row(['email' => $email]);

        if (!$user) {
            return ['status' => false, 'error' => ['email' => 'No User Found with this Email']];
        }

        if (!$this->verify_password($user->password, $password)) {
            return ['status' => false, 'error' => ['password' => 'Incorrect Password']];
        }

        if (!$user->active) {
            return ['status' => false, 'error' => ['active' => 'Your Account is Blocked by Admin']];
        }

        return ['status' => true, 'user' => $user];
    }


    public function authenticate_by_token($token): array
    {
        $session = $this->row(['token' => $token], 'sma_driver_app_sessions');

        if (!$session) {
            return ['status' => false, 'error' => ['token' => 'Invalid Token']];
        }

        if ($session->is_expired == 1) {
            return ['status' => false, 'error' => ['token' => 'Token is Expired']];
        }

        $user = $this->row(['id' => $session->user_id]);

        if (!$user || !$user->active) {
            return ['status' => false, 'error' => ['active' => 'Your Account is Blocked by Admin']];
        }

        $this->update(['is_expired' => 1], ['token' => $token], 'sma_driver_app_sessions');

        return ['status' => true, 'user' => $user];
    }



    private function verify_password($db_password, $user_password): bool
    {
        $salt = substr($db_password, 0, 10);
        $calc_password = $salt . substr(sha1($salt . $user_password), 0, -10);
        return $calc_password == $db_password;
    }
}
