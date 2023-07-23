<?php
class admin extends MY_controller
{
    public function login()
    {
        // echo "Testing:Admin.."; 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname','User Name','required|alpha');
        $this->form_validation->set_rules('pass','Password','required|max_length[12]');
        if($this->form_validation->run())
        {
            // echo "validation success";
            $uname=$this->input->post('uname');
            $pass=$this->input->post('pass');
            $this->load->model("loginmodel");
            $login_id=$this->loginmodel->isvalidate($uname,$pass);
            if($login_id)
            {
                //logic correct
                // echo "Details Match!";
                // $this->load->view('Users/articallist');
                $this->load->library('session');
                $this->session->set_userdata('id',$login_id);
                $this->load->view('admin/dashboard');
            }
            else 
            {
                // logic failed
                // echo "Details not match!";
                $this->load->view('admin/login');
            }
        }
        else
        {
            $this->load->view('Admin/login');
        }
    }
}
?>