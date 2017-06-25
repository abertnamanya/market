<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author abert
 */
class LoginController extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->LoginModel->checkLogin($username, $password);
        $dashboard = $this->session->userdata('url');
        if ($result == true) {
            redirect($dashboard);
        } else {
            $array = array('message' => 'wrong username or password try again please');
            $this->load->view('login', $array);
        }
    }

    function logout() {
        $this->LoginModel->logoutUser();
        redirect('LoginController');
    }

}
