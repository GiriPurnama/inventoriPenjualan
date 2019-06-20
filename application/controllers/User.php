<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "My Real Title";
        $data['heading'] = "My Real Heading";
        $this->load->view('user/home', $data);
    }
}
