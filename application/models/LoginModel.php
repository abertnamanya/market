<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginModel
 *
 * @author abert
 */
class LoginModel extends CI_Model {

    //put your code here

    public function checkLogin($username, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        $result = $query->row();
        if ($query->num_rows() > 0) {
            $url = 'admin_main';
            $data = array(
                'user_name' => $result->firstName . " " . $result->lastName,
                'user_id' => $result->user_id,
                'loggedin' => true,
                'url' => $url
            );
            $this->session->set_userdata($data);
            return TRUE;
        }
    }

    public function logoutUser() {
        $this->session->sess_destroy();
    }

    public function loggedin() {
        return (bool) $this->session->userdata('loggedin');
    }

}
