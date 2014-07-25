<?php
/**
 * Created by PhpStorm.
 * User: Karim
 * Date: 7/15/14
 * Time: 8:31 AM
 */

class Logout extends My_Authentication_Controller{

    function index()
    {
        $this->session->sess_destroy();
        redirect("login");

    }


} 