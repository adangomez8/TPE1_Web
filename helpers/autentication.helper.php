<?php

class HelperAutenticacion {

    static public function checkLoggedUser() {

        if (!isset($_SESSION['logged'])) {
            header('Location: ' . BASE_URL . 'loginUser');
            die();
        }

    }
}