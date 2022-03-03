<?php
    include './vendors/randomString.php';
    class Auth{
        private $DBemail = 'jishanhoshenjibon@gmail.com';
        private $DBpass = '12345';
        private $DBuserId = '1';
        public $data = [];
        public function signin($email,$password)
        {
            if($this->DBemail == $email)
            {
                if($this->DBpass == $password){
                    $this->authSessionSet($this->DBuserId);
                    $data['successMessage'] = true;
                    $data['errorMessage'] = 0;
                }else{
                    $data['errorMessage'] = 'Password not match!';
                }
            }else{
                $data['errorMessage'] = 'User is not Exist!';
            }
            return $data;
        }
        public function signup()
        {
            
        }
        public function authSession()
        {
            if(isset($_SESSION['userId']) && isset($_SESSION['browserToken'])){
                return true;
            }
        }
        public function authSessionSet($userId)
        {
            $RandomString = new RandomString();
            $_SESSION['userId'] = $userId;
            $_SESSION['browserToken'] = $RandomString->generate(30);
        }
        public function authSessionDel()
        {
            $_SESSION['userId'];
            $_SESSION['browserToken'];
            session_unset();
        }
    }
?>