<?php

class HelperAutenticacion {

    static public function checkLoggedAdmin() {
        if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
        }

        if (!isset($_SESSION['logged']) || ($_SESSION['admin']!=1)) {
            header('Location: ' . BASE_URL);
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

    static public function getIdUser() {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        if (isset($_SESSION['logged'])){
        return $_SESSION['id_user'];
        }
    }
}
