<?php
/**
 * Created by PhpStorm.
 * User: Karim
 * Date: 7/15/14
 * Time: 2:10 AM
 */
class My_Controller extends CI_Controller
{
    protected  $data = array();

    function __construct(){

        parent::__construct();
        $this->load->helper("url");
        $this->data["baseurl"] =site_url();
    }


}
class My_Authentication_Controller extends My_Controller
{
    protected  $instructor = false;
    function __construct(){
        parent::__construct();


        $this->load->library('session');
        if(!$this->session->userdata("logged"))
        {
            redirect("login");
        }
        else
        {
            $this->data["name"] = $this->session->userdata("name");
            $this->instructor = $this->session->userdata("instructor");
            $this->data["inst"] = $this->instructor;
        }
    }
}