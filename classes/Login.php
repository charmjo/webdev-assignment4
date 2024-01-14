<?php

class Login {

    public function loginUser ($_username,$_password) {
        $result = $this->findUsername($_username,$_password);
        if($result){
            session_start();
            $_SESSION['username'] = $result['email'];
            $_SESSION['fname'] = $result['fname'];
            $_SESSION['lname'] = $result['lname'];
            $_SESSION['access_level'] = $result['access_level'];
            $_SESSION['logged_in'] = true;

            return true;
        } else {
            return false;
        }
    }

    public function logoutUser () {
        session_start();
        session_destroy();
    }

    protected function findUsername ($username,$password) {
        $conn = new Database ();
        $conn->connectDb();
        $sqlQuery = "SELECT * FROM `user` WHERE `email` = '$username'";
        $sqlResult = $conn->dbConn->query($sqlQuery);

        if($sqlResult->num_rows == 1){
            $result = $sqlResult->fetch_assoc();

            //hashes are different even if the password is the same
            if (password_verify($password, $result['password'])) {
                return $result;
            } else {
                return false; 
            }
        } else {
            return false;
        }
    }
}