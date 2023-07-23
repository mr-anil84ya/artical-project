<?php
class Users extends MY_controller
{
    public function index()
    {
        $this->load->helper('html');
       $this->load->view('Users/articalList');
    }

}
?>