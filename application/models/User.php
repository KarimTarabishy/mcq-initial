<?php
/**
 * Created by PhpStorm.
 * User: Karim
 * Date: 7/15/14
 * Time: 5:39 AM
 */

class User extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function get_user($username, $password)
    {
        $qu = "select * from user where user_name=? and password=?";
        $result = $this->db->query($qu, array($username, $password));
        if($result->num_rows() > 0)
        {
            return $result->row();
        }
        else
        {
            return null;
        }
    }

}