<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Controller {
 
    // constructor class
    function __construct()
    {
        parent::Controller();
        $this->load->library('session');
    }
 
    function index()
    {
        $this->load->view('admin');
    }
 
    function login()
    {
        // if user already logged in, redirect to user index
        if ($this->my_usession->logged_in)
        {
            redirect('admin');
        }
        else
        {
            $this->load->view('user/login');
        }
    }
}

?>
