<?php
/**
 * Created by PhpStorm.
 * User: Karim
 * Date: 7/15/14
 * Time: 3:22 AM
 */

class Login extends My_Controller{

    private $tmp;
    public function index()
    {
        $this->load->library('session');
        if($this->session->userdata("logged"))
        {
            redirect("courses");
            return;
        }
        $this->data["title"] = "login";
        $this->load->helper(array('form', 'url'));
        $this->data["show"] = "hidden";
        $this->load->library('form_validation');
        $this->load->view("top_head", $this->data);
        $this->load->view("login", $this->data);
    }

    public function validate()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $this->data["show"] = "visible";
            $this->load->view("top_head", $this->data);
            $this->load->view("login", $this->data);
        }
        else
        {
            $this->form_validation->set_rules('username', 'Username', 'callback_user_exist');
            if ($this->form_validation->run() == FALSE)
            {
                $this->data["show"] = "visible";
                $this->load->view("top_head", $this->data);
                $this->load->view("login", $this->data);
            }

            else
            {
                $this->load->library('session');
                $user_info = array(
                    "name" => $this->tmp->name,
                    "id"    => $this->tmp->id,
                    "instructor" => ($this->tmp->is_instructor ? true : false),
                    "logged" => true
                );
                $this->session->set_userdata($user_info);
                redirect("courses");
            }

        }
    }

    public function user_exist()
    {
        $this->load->model("User");
        $this->tmp = $this->User->get_user($this->input->post("username"), $this->input->post("password"));
        if(!$this->tmp)
        {
            $this->form_validation->set_message("user_exist","Username or Password combination is wrong.");
            return false;
        }

        return true;

    }



}