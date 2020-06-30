<?php

class HelperAutenticacion {

    static public function checkLoggedAdmin() {
        if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
        }

        if (!isset($_SESSION['logged'])) {
            header('Location: ' . BASE_URL . 'loginUser');
            die();
        }
    }

    static public function getUserName(){
        
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        $userName = $_SESSION['username'];

        return $userName;
    }

    static public function getUserSurname() {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        $userSurname = $_SESSION['usersurname'];
        
        return $userSurname;
    }
}
