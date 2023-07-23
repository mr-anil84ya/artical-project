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
                // $this->load->view('admin/dashboard');
                return redirect('admin/welcome');
                
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
    public function welcome()
    {
        $this->load->model('loginmodel');
        $articles=$this->loginmodel->articalList();
        $this->load->view('admin/dashboard',['articles'=>$articles]);
    }
    public function register()
    {
        $this->load->view('admin/register');
    }
    public function sendemail()
    {
        $this->form_validation->set_rules('uname','Username','required|alpha');
        $this->form_validation->set_rules('pass','Password','required|max_length[12]');
        $this->form_validation->set_rules('fname','First Name','required|alpha');
        $this->form_validation->set_rules('lname','Last Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if($this->form_validation->run())
        {
            $this->load->library('email');
            $this->email->from(set_value('email'),set_value('fname'));
            $this->email->to("anilmery21@gmail.com");
            $this->email->subject("Registration Greetings...");
            $this->email->message("Thank You For Registration!");
            $this->email->set_newline("/r/n");
            $this->email->send();
            if(!$this->email->send())
            {
                show_error($this->email->print_debugger());
            }
            else
            {
                echo "your email has been send!";
            }
        }
        else
        {
            $this->load->view('admin/register');
        }
        
        

    }
}
?>